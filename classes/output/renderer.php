<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Renderer for local_depan
 *
 * @package    local_depan
 * @copyright  2025 Prihantoosa <pht854@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_depan\output;

defined('MOODLE_INTERNAL') || die();

use plugin_renderer_base;

/**
 * Renderer for local_depan plugin
 */
class renderer extends plugin_renderer_base {

    /**
     * Render landing page
     *
     * @param landing_page $page
     * @return string
     */
    public function render_landing_page(landing_page $page) {
        $data = $page->export_for_template($this);
        return $this->render_from_template('local_depan/landing', $data);
    }
}