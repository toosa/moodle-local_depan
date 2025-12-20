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
 * @copyright  2025 YOUR NAME <your@email.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Hook to redirect frontpage to our landing page
 */
function local_depan_before_standard_html_head() {
    global $PAGE, $CFG;
    
    // Check if landing page is enabled
    $enabled = get_config('local_depan', 'enabled');
    if (empty($enabled)) {
        return;
    }
    
    // Only redirect if we're on the site frontpage and not logged in
    if ($PAGE->pagetype === 'site-index' && !isloggedin()) {
        redirect($CFG->wwwroot . '/local/depan/index.php');
    }
}