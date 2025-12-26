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
 * Settings for local_depan
 *
 * @package    local_depan
 * @copyright  2025 Prihantoosa <pht854@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_depan', get_string('pluginname', 'local_depan'));
    $ADMIN->add('localplugins', $settings);

    // Enable/Disable landing page redirect
    $settings->add(new admin_setting_configcheckbox(
        'local_depan/enabled',
        get_string('enable_landing_page', 'local_depan'),
        get_string('enable_landing_page_desc', 'local_depan'),
        1
    ));

    // Custom welcome title
    $settings->add(new admin_setting_configtext(
        'local_depan/welcome_title',
        get_string('custom_welcome_title', 'local_depan'),
        get_string('custom_welcome_title_desc', 'local_depan'),
        get_string('welcome_title', 'local_depan'),
        PARAM_TEXT
    ));

    // Custom welcome subtitle
    $settings->add(new admin_setting_configtext(
        'local_depan/welcome_subtitle',
        get_string('custom_welcome_subtitle', 'local_depan'),
        get_string('custom_welcome_subtitle_desc', 'local_depan'),
        get_string('welcome_subtitle', 'local_depan'),
        PARAM_TEXT
    ));

    // Custom hero description
    $settings->add(new admin_setting_configtextarea(
        'local_depan/hero_description',
        get_string('custom_hero_description', 'local_depan'),
        get_string('custom_hero_description_desc', 'local_depan'),
        get_string('hero_description', 'local_depan'),
        PARAM_TEXT
    ));

    // Hero background type
    $settings->add(new admin_setting_configselect(
        'local_depan/hero_bg_type',
        get_string('hero_bg_type', 'local_depan'),
        get_string('hero_bg_type_desc', 'local_depan'),
        'gradient',
        [
            'gradient' => get_string('hero_bg_gradient', 'local_depan'),
            'color' => get_string('hero_bg_color', 'local_depan'),
            'image' => get_string('hero_bg_image', 'local_depan')
        ]
    ));

    // Hero background color
    $settings->add(new admin_setting_configcolourpicker(
        'local_depan/hero_bg_color',
        get_string('hero_bg_color_picker', 'local_depan'),
        get_string('hero_bg_color_picker_desc', 'local_depan'),
        '#667eea'
    ));

    // Hero background image
    $settings->add(new admin_setting_configstoredfile(
        'local_depan/hero_bg_image',
        get_string('hero_bg_image_file', 'local_depan'),
        get_string('hero_bg_image_file_desc', 'local_depan'),
        'hero_bg_image',
        0,
        ['maxfiles' => 1, 'accepted_types' => ['image']]
    ));
}