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
 * Event observers for local_depan
 *
 * @package    local_depan
 * @copyright  2025 Prihantoosa <pht854@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Event observer for landing page redirect
 */
class local_depan_observer {
    
    /**
     * Handle course viewed event to redirect to landing page
     *
     * @param \core\event\course_viewed $event
     */
    public static function course_viewed(\core\event\course_viewed $event) {
        global $CFG, $PAGE;
        
        // Check if this is the site course (front page)
        if ($event->courseid != SITEID) {
            return;
        }
        
        // Check if landing page is enabled
        $enabled = get_config('local_depan', 'enabled');
        if (empty($enabled)) {
            return;
        }
        
        // Only redirect if user is not logged in (guest)
        if (!isloggedin() || isguestuser()) {
            redirect($CFG->wwwroot . '/local/depan/index.php');
        }
    }
}