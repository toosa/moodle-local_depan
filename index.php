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

global $CFG, $PAGE, $OUTPUT;

// Set up the page
$PAGE->set_url('/local/depan/index.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('frontpage');

// Get custom settings for page title
$welcome_title = get_config('local_depan', 'welcome_title') ?: get_string('welcome_title', 'local_depan');
$PAGE->set_title($welcome_title);
$PAGE->set_heading($welcome_title);

// Add custom CSS
$PAGE->requires->css('/local/depan/styles.css');

// Create renderer and landing page
$renderer = $PAGE->get_renderer('local_depan');
$landingpage = new \local_depan\output\landing_page();

echo $OUTPUT->header();
echo $renderer->render_landing_page($landingpage);
echo $OUTPUT->footer();