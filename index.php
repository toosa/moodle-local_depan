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
 * Landing page for the site
 *
 * @package    local_depan
 * @copyright  2025 Prihantoosa <pht854@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');

global $CFG, $PAGE, $OUTPUT, $USER;

// Set up the page
$PAGE->set_url('/local/depan/index.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('frontpage');
$PAGE->set_title(get_string('welcome_title', 'local_depan'));
$PAGE->set_heading(get_string('welcome_title', 'local_depan'));

// Add custom CSS
$PAGE->requires->css('/local/depan/styles.css');

// Check if user is logged in
$is_logged_in = isloggedin() && !isguestuser();

// Get custom settings
$welcome_title = get_config('local_depan', 'welcome_title') ?: get_string('welcome_title', 'local_depan');
$welcome_subtitle = get_config('local_depan', 'welcome_subtitle') ?: get_string('welcome_subtitle', 'local_depan');
$hero_description = get_config('local_depan', 'hero_description') ?: get_string('hero_description', 'local_depan');

echo $OUTPUT->header();

?>

<div class="landing-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo format_string($welcome_title); ?></h1>
                <h2 class="hero-subtitle"><?php echo format_string($welcome_subtitle); ?></h2>
                <p class="hero-description"><?php echo format_text($hero_description, FORMAT_PLAIN); ?></p>
                
                <div class="hero-buttons">
                    <?php if (!$is_logged_in): ?>
                        <a href="<?php echo $CFG->wwwroot; ?>/login/index.php" class="btn btn-primary btn-lg">
                            <?php echo get_string('login', 'local_depan'); ?>
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/login/signup.php" class="btn btn-secondary btn-lg">
                            <?php echo get_string('register', 'local_depan'); ?>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo $CFG->wwwroot; ?>/my/" class="btn btn-primary btn-lg">
                            <?php echo get_string('get_started', 'local_depan'); ?>
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/" class="btn btn-secondary btn-lg">
                            <?php echo get_string('explore_courses', 'local_depan'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <div class="container">
            <h2 class="section-title"><?php echo get_string('features_title', 'local_depan'); ?></h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa fa-play-circle"></i>
                    </div>
                    <h3><?php echo get_string('feature_interactive', 'local_depan'); ?></h3>
                    <p><?php echo get_string('feature_interactive_desc', 'local_depan'); ?></p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <h3><?php echo get_string('feature_expert', 'local_depan'); ?></h3>
                    <p><?php echo get_string('feature_expert_desc', 'local_depan'); ?></p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <h3><?php echo get_string('feature_flexible', 'local_depan'); ?></h3>
                    <p><?php echo get_string('feature_flexible_desc', 'local_depan'); ?></p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa fa-certificate"></i>
                    </div>
                    <h3><?php echo get_string('feature_certificate', 'local_depan'); ?></h3>
                    <p><?php echo get_string('feature_certificate_desc', 'local_depan'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section (if user is logged in) -->
    <?php if ($is_logged_in): ?>
    <div class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <?php
                // Get some basic statistics
                $course_count = $DB->count_records('course') - 1; // Exclude site course
                $user_count = $DB->count_records('user', array('deleted' => 0)) - 1; // Exclude guest user
                ?>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $course_count; ?></div>
                    <div class="stat-label">Courses Available</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $user_count; ?></div>
                    <div class="stat-label">Active Learners</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support Available</div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Recent Courses Section -->
    <?php
    $courses = get_courses('all', 'c.sortorder ASC', 'c.id,c.shortname,c.fullname,c.summary');
    if (count($courses) > 1): // More than just the site course
    ?>
    <div class="courses-section">
        <div class="container">
            <h2 class="section-title"><?php echo get_string('explore_courses', 'local_depan'); ?></h2>
            <div class="courses-grid">
                <?php
                $count = 0;
                foreach ($courses as $course) {
                    if ($course->id == 1 || $count >= 6) continue; // Skip site course and limit to 6
                    $count++;
                    $course_url = new moodle_url('/course/view.php', array('id' => $course->id));
                    ?>
                    <div class="course-card">
                        <h4><a href="<?php echo $course_url; ?>"><?php echo format_string($course->fullname); ?></a></h4>
                        <p><?php echo format_text($course->summary, FORMAT_PLAIN); ?></p>
                        <a href="<?php echo $course_url; ?>" class="btn btn-outline-primary">
                            <?php echo get_string('learn_more', 'local_depan'); ?>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="text-center mt-4">
                <a href="<?php echo $CFG->wwwroot; ?>/course/" class="btn btn-primary">
                    View All Courses
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php
echo $OUTPUT->footer();
?>