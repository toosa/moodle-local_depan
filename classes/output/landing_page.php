<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Landing page renderable
 *
 * @package    local_depan
 * @copyright  2025 Prihantoosa <pht854@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_depan\output;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/authlib.php');

use renderable;
use renderer_base;
use templatable;
use stdClass;

/**
 * Landing page renderable class
 */
class landing_page implements renderable, templatable {

    /** @var bool Whether user is logged in */
    private $is_logged_in;

    /** @var array Course data */
    private $courses;

    /** @var array Statistics data */
    private $stats;

    /**
     * Constructor
     */
    public function __construct() {
        global $CFG, $DB;
        
        $this->is_logged_in = isloggedin() && !isguestuser();
        $this->load_courses();
        $this->load_statistics();
    }

    /**
     * Load courses data
     */
    private function load_courses() {
        global $DB;

        $limit = (int) (get_config('local_depan', 'maxactivecourses') ?? 6);
        if ($limit < 1) {
            $limit = 6;
        }

                $sql = "SELECT c.id, c.fullname, c.summary, c.summaryformat
                                    FROM {course} c
                                 WHERE c.id <> :siteid
                                     AND c.visible = 1
                            ORDER BY c.sortorder ASC";
                $params = [
                        'siteid' => SITEID,
                ];

        $courses = $DB->get_records_sql($sql, $params, 0, $limit);
        $this->courses = [];

        foreach ($courses as $course) {
            $courseviewurl = new \moodle_url('/course/view.php', ['id' => $course->id]);
            $context = \context_course::instance($course->id);

            $courseimageurl = null;
            try {
                $courseimageurl = \cache::make('core', 'course_image')->get($course->id);
            } catch (\Throwable $e) {
                $courseimageurl = null;
            }

            $this->courses[] = [
                'id' => $course->id,
                'fullname' => format_string($course->fullname),
                'summary' => format_text($course->summary, $course->summaryformat, ['context' => $context]),
                'url' => $courseviewurl->out(false),
                'courseimageurl' => $courseimageurl ?: null,
                'learn_more' => get_string('learn_more', 'local_depan'),
            ];
        }
    }

    /**
     * Load statistics data
     */
    private function load_statistics() {
        global $DB;
        
        if ($this->is_logged_in) {
            $course_count = $DB->count_records('course') - 1; // Exclude site course
            $user_count = $DB->count_records('user', array('deleted' => 0)) - 1; // Exclude guest user
            
            $this->stats = [
                [
                    'number' => $course_count,
                    'label' => 'Courses Available'
                ],
                [
                    'number' => $user_count,
                    'label' => 'Active Learners'
                ],
                [
                    'number' => '24/7',
                    'label' => 'Support Available'
                ]
            ];
        }
    }

    /**
     * Get hero background style based on settings
     */
    private function get_hero_background() {
        global $CFG;
        
        $bg_type = get_config('local_depan', 'hero_bg_type') ?: 'gradient';
        $background = [];
        
        switch ($bg_type) {
            case 'color':
                $bg_color = get_config('local_depan', 'hero_bg_color') ?: '#667eea';
                $background = [
                    'type' => 'color',
                    'style' => 'background: ' . $bg_color . ';'
                ];
                break;
                
            case 'image':
                $context = \context_system::instance();
                $fs = get_file_storage();
                $files = $fs->get_area_files($context->id, 'local_depan', 'hero_bg_image', 0, 'timemodified', false);
                
                if (!empty($files)) {
                    $file = reset($files);
                    $imageurl = \moodle_url::make_pluginfile_url(
                        $file->get_contextid(),
                        $file->get_component(),
                        $file->get_filearea(),
                        $file->get_itemid(),
                        $file->get_filepath(),
                        $file->get_filename()
                    );
                    
                    $background = [
                        'type' => 'image',
                        'style' => 'background-image: url(' . $imageurl . '); background-size: cover; background-position: center;'
                    ];
                } else {
                    // Fallback to gradient if no image uploaded
                    $background = [
                        'type' => 'gradient',
                        'style' => 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);'
                    ];
                }
                break;
                
            default: // gradient
                $background = [
                    'type' => 'gradient',
                    'style' => 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);'
                ];
                break;
        }
        
        return $background;
    }

    /**
     * Export data for template
     *
     * @param renderer_base $output
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        global $CFG;
        
        $data = new stdClass();
        
        // User status
        $data->is_logged_in = $this->is_logged_in;
        
        // Check if self registration is enabled
        $data->signup_enabled = !empty($CFG->registerauth) && \signup_is_enabled();
        
        // Custom settings
        $data->welcome_title = get_config('local_depan', 'welcome_title') ?: get_string('welcome_title', 'local_depan');
        $data->welcome_subtitle = get_config('local_depan', 'welcome_subtitle') ?: get_string('welcome_subtitle', 'local_depan');
        $data->hero_description = get_config('local_depan', 'hero_description') ?: get_string('hero_description', 'local_depan');
        
        // Hero background
        $data->hero_background = $this->get_hero_background();
        
        // URLs
        $data->wwwroot = $CFG->wwwroot;
        $data->login_url = $CFG->wwwroot . '/login/index.php';
        $data->signup_url = $CFG->wwwroot . '/login/signup.php';
        $data->dashboard_url = $CFG->wwwroot . '/my/';
        $data->course_url = $CFG->wwwroot . '/course/';
        
        // Button strings
        $data->str_login = get_string('login', 'local_depan');
        $data->str_register = get_string('register', 'local_depan');
        $data->str_get_started = get_string('get_started', 'local_depan');
        $data->str_explore_courses = get_string('explore_courses', 'local_depan');
        $data->str_view_all_courses = get_string('view_all_courses', 'local_depan');
        
        // Features
        $data->features_title = get_string('features_title', 'local_depan');
        $data->features = [
            [
                'icon' => 'fa-play-circle',
                'title' => get_string('feature_interactive', 'local_depan'),
                'description' => get_string('feature_interactive_desc', 'local_depan')
            ],
            [
                'icon' => 'fa-graduation-cap',
                'title' => get_string('feature_expert', 'local_depan'),
                'description' => get_string('feature_expert_desc', 'local_depan')
            ],
            [
                'icon' => 'fa-clock-o',
                'title' => get_string('feature_flexible', 'local_depan'),
                'description' => get_string('feature_flexible_desc', 'local_depan')
            ],
            [
                'icon' => 'fa-certificate',
                'title' => get_string('feature_certificate', 'local_depan'),
                'description' => get_string('feature_certificate_desc', 'local_depan')
            ]
        ];
        
        // Statistics (if logged in)
        $data->show_stats = $this->is_logged_in;
        if ($data->show_stats) {
            $data->stats = $this->stats;
        }
        
        // Courses
        $data->has_courses = !empty($this->courses);
        $data->courses = $this->courses;
        $data->no_active_courses_message = get_string('noactivecourses', 'local_depan');
        
        return $data;
    }
}