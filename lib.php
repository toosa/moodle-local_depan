<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Library functions for local_depan
 *
 * @package    local_depan
 * @copyright  2025 Prihantoosa <pht854@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * File serving callback
 *
 * @param stdClass $course course object
 * @param stdClass $cm course module object
 * @param stdClass $context context object
 * @param string $filearea file area
 * @param array $args extra arguments
 * @param bool $forcedownload whether or not force download
 * @param array $options additional options affecting the file serving
 * @return bool false if the file not found, just send the file otherwise and do not return anything
 */
function local_depan_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel != CONTEXT_SYSTEM) {
        return false;
    }

    if ($filearea !== 'hero_bg_image') {
        return false;
    }

    $fs = get_file_storage();
    $filename = array_pop($args);
    $itemid = array_pop($args);
    $filepath = '/';

    $file = $fs->get_file($context->id, 'local_depan', $filearea, $itemid, $filepath, $filename);
    if (!$file) {
        return false;
    }

    send_stored_file($file, null, 0, $forcedownload, $options);
}

/**
 * Get file areas for this plugin
 *
 * @return array
 */
function local_depan_get_file_areas() {
    return array(
        'hero_bg_image' => get_string('hero_bg_image_file', 'local_depan')
    );
}

/**
 * Extend navigation to add landing page redirect
 *
 * @param global_navigation $navigation
 */
function local_depan_extend_navigation(global_navigation $navigation) {
    global $PAGE, $CFG;
    
    // Check if landing page is enabled
    $enabled = get_config('local_depan', 'enabled');
    if (empty($enabled)) {
        return;
    }
    
    // Only redirect if we're on the site frontpage and not logged in
    if ($PAGE->pagetype === 'site-index' && (!isloggedin() || isguestuser())) {
        redirect($CFG->wwwroot . '/local/depan/index.php');
    }
}

/**
 * Hook called before HTTP headers are sent
 */
function local_depan_before_http_headers() {
    // This is an implementation of a legacy callback that will only be called in older Moodle versions.
    // It will not be called in Moodle versions that contain the hook core\hook\output\before_http_headers,
    // instead, the callback local_depan\local\hooks\output\before_http_headers::callback will be executed.

    global $PAGE, $CFG, $ME;
    
    // Check if landing page is enabled
    $enabled = get_config('local_depan', 'enabled');
    if (empty($enabled)) {
        return;
    }
    
    // Check if we're on the main index page
    if (strpos($ME, '/index.php') !== false && $PAGE->context->contextlevel == CONTEXT_SYSTEM) {
        // Only redirect if user is not logged in (guest)
        if (!isloggedin() || isguestuser()) {
            redirect($CFG->wwwroot . '/local/depan/index.php');
        }
    }
}