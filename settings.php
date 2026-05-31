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
    // Create a category so sub-pages appear under "Landing Page" in the menu.
    $ADMIN->add('localplugins', new admin_category(
        'local_depan_cat',
        get_string('pluginname', 'local_depan')
    ));

    // General settings sub-page (named 'local_depan' for back-compat with
    // admin notifications that link directly to this section).
    $settings = new admin_settingpage('local_depan', get_string('general_settings', 'local_depan'));
    $ADMIN->add('local_depan_cat', $settings);

    // Enable/Disable landing page redirect
    $settings->add(new admin_setting_configcheckbox(
        'local_depan/enabled',
        get_string('enable_landing_page', 'local_depan'),
        get_string('enable_landing_page_desc', 'local_depan'),
        1
    ));

    // Show/hide features section
    $settings->add(new admin_setting_configcheckbox(
        'local_depan/show_features',
        get_string('show_features', 'local_depan'),
        get_string('show_features_desc', 'local_depan'),
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

    // Max active courses shown under hero.
    $settings->add(new admin_setting_configtext(
        'local_depan/maxactivecourses',
        get_string('maxactivecourses', 'local_depan'),
        get_string('maxactivecourses_desc', 'local_depan'),
        6,
        PARAM_INT
    ));

    // Reusable option arrays for typography selects.
    $fontoptions = [
        ''                                        => get_string('font_inherit', 'local_depan'),
        'Arial, sans-serif'                       => 'Arial',
        'Georgia, serif'                          => 'Georgia',
        '"Times New Roman", serif'                => 'Times New Roman',
        '"Courier New", monospace'                => 'Courier New',
        'Verdana, sans-serif'                     => 'Verdana',
        '"Trebuchet MS", sans-serif'              => 'Trebuchet MS',
        'Tahoma, sans-serif'                      => 'Tahoma',
        '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
    ];
    $weightoptions = [
        ''    => get_string('font_inherit', 'local_depan'),
        '100' => get_string('font_weight_100', 'local_depan'),
        '300' => get_string('font_weight_300', 'local_depan'),
        '400' => get_string('font_weight_400', 'local_depan'),
        '500' => get_string('font_weight_500', 'local_depan'),
        '600' => get_string('font_weight_600', 'local_depan'),
        '700' => get_string('font_weight_700', 'local_depan'),
        '800' => get_string('font_weight_800', 'local_depan'),
        '900' => get_string('font_weight_900', 'local_depan'),
    ];
    $alignoptions = [
        ''        => get_string('font_inherit', 'local_depan'),
        'left'    => get_string('text_align_left', 'local_depan'),
        'center'  => get_string('text_align_center', 'local_depan'),
        'right'   => get_string('text_align_right', 'local_depan'),
        'justify' => get_string('text_align_justify', 'local_depan'),
    ];

    // ── Title typography ──────────────────────────────────────────────────────
    $settings->add(new admin_setting_heading(
        'local_depan/title_styling_hdr',
        get_string('title_styling', 'local_depan'),
        ''
    ));
    $settings->add(new admin_setting_configtext(
        'local_depan/title_font_size',
        get_string('font_size', 'local_depan'),
        get_string('font_size_desc', 'local_depan'),
        '', PARAM_TEXT
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/title_font_family',
        get_string('font_family', 'local_depan'),
        get_string('font_family_desc', 'local_depan'),
        '', $fontoptions
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/title_font_weight',
        get_string('font_weight', 'local_depan'),
        get_string('font_weight_desc', 'local_depan'),
        '', $weightoptions
    ));
    $settings->add(new admin_setting_configcolourpicker(
        'local_depan/title_font_color',
        get_string('font_color', 'local_depan'),
        get_string('font_color_desc', 'local_depan'),
        ''
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/title_text_align',
        get_string('text_align', 'local_depan'),
        get_string('text_align_desc', 'local_depan'),
        '', $alignoptions
    ));
    $settings->add(new admin_setting_configtext(
        'local_depan/title_line_height',
        get_string('line_height', 'local_depan'),
        get_string('line_height_desc', 'local_depan'),
        '', PARAM_TEXT
    ));

    // ── Subtitle typography ───────────────────────────────────────────────────
    $settings->add(new admin_setting_heading(
        'local_depan/subtitle_styling_hdr',
        get_string('subtitle_styling', 'local_depan'),
        ''
    ));
    $settings->add(new admin_setting_configtext(
        'local_depan/subtitle_font_size',
        get_string('font_size', 'local_depan'),
        get_string('font_size_desc', 'local_depan'),
        '', PARAM_TEXT
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/subtitle_font_family',
        get_string('font_family', 'local_depan'),
        get_string('font_family_desc', 'local_depan'),
        '', $fontoptions
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/subtitle_font_weight',
        get_string('font_weight', 'local_depan'),
        get_string('font_weight_desc', 'local_depan'),
        '', $weightoptions
    ));
    $settings->add(new admin_setting_configcolourpicker(
        'local_depan/subtitle_font_color',
        get_string('font_color', 'local_depan'),
        get_string('font_color_desc', 'local_depan'),
        ''
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/subtitle_text_align',
        get_string('text_align', 'local_depan'),
        get_string('text_align_desc', 'local_depan'),
        '', $alignoptions
    ));
    $settings->add(new admin_setting_configtext(
        'local_depan/subtitle_line_height',
        get_string('line_height', 'local_depan'),
        get_string('line_height_desc', 'local_depan'),
        '', PARAM_TEXT
    ));

    // ── Description typography ────────────────────────────────────────────────
    $settings->add(new admin_setting_heading(
        'local_depan/description_styling_hdr',
        get_string('description_styling', 'local_depan'),
        ''
    ));
    $settings->add(new admin_setting_configtext(
        'local_depan/description_font_size',
        get_string('font_size', 'local_depan'),
        get_string('font_size_desc', 'local_depan'),
        '', PARAM_TEXT
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/description_font_family',
        get_string('font_family', 'local_depan'),
        get_string('font_family_desc', 'local_depan'),
        '', $fontoptions
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/description_font_weight',
        get_string('font_weight', 'local_depan'),
        get_string('font_weight_desc', 'local_depan'),
        '', $weightoptions
    ));
    $settings->add(new admin_setting_configcolourpicker(
        'local_depan/description_font_color',
        get_string('font_color', 'local_depan'),
        get_string('font_color_desc', 'local_depan'),
        ''
    ));
    $settings->add(new admin_setting_configselect(
        'local_depan/description_text_align',
        get_string('text_align', 'local_depan'),
        get_string('text_align_desc', 'local_depan'),
        '', $alignoptions
    ));
    $settings->add(new admin_setting_configtext(
        'local_depan/description_line_height',
        get_string('line_height', 'local_depan'),
        get_string('line_height_desc', 'local_depan'),
        '', PARAM_TEXT
    ));

    // ── Features Settings (sub-page under Landing Page category) ──────────────
    $features_settings = new admin_settingpage(
        'local_depan_features',
        get_string('features_settings', 'local_depan')
    );
    $ADMIN->add('local_depan_cat', $features_settings);

    $feature_bg_type_options = [
        'none'  => get_string('feature_bg_none', 'local_depan'),
        'color' => get_string('feature_bg_color', 'local_depan'),
        'image' => get_string('feature_bg_image', 'local_depan'),
    ];
    $feature_icon_type_options = [
        'icon'  => get_string('feature_icon_type_icon', 'local_depan'),
        'image' => get_string('feature_icon_type_image', 'local_depan'),
    ];

    // Default icon and title values for the 4 built-in features.
    $feature_defaults = [
        1 => ['icon' => 'fa-play-circle', 'title' => 'feature_interactive', 'desc' => 'feature_interactive_desc'],
        2 => ['icon' => 'fa-graduation-cap', 'title' => 'feature_expert',     'desc' => 'feature_expert_desc'],
        3 => ['icon' => 'fa-clock-o',       'title' => 'feature_flexible',    'desc' => 'feature_flexible_desc'],
        4 => ['icon' => 'fa-certificate',   'title' => 'feature_certificate', 'desc' => 'feature_certificate_desc'],
    ];

    for ($n = 1; $n <= 8; $n++) {
        $prefix = 'feature_' . $n;
        $default_enabled = ($n <= 4) ? 1 : 0;
        $default_icon    = isset($feature_defaults[$n]) ? $feature_defaults[$n]['icon'] : '';
        $default_title   = isset($feature_defaults[$n]) ? get_string($feature_defaults[$n]['title'], 'local_depan') : '';
        $default_desc    = isset($feature_defaults[$n]) ? get_string($feature_defaults[$n]['desc'],  'local_depan') : '';

        $features_settings->add(new admin_setting_heading(
            'local_depan/' . $prefix . '_hdr',
            get_string('feature_n', 'local_depan', $n),
            ''
        ));

        $features_settings->add(new admin_setting_configcheckbox(
            'local_depan/' . $prefix . '_enabled',
            get_string('feature_enabled', 'local_depan'),
            get_string('feature_enabled_desc', 'local_depan'),
            $default_enabled
        ));

        $features_settings->add(new admin_setting_configtext(
            'local_depan/' . $prefix . '_title',
            get_string('feature_title', 'local_depan'),
            get_string('feature_title_desc', 'local_depan'),
            $default_title,
            PARAM_TEXT
        ));

        $features_settings->add(new admin_setting_configtextarea(
            'local_depan/' . $prefix . '_desc',
            get_string('feature_desc', 'local_depan'),
            get_string('feature_desc_desc', 'local_depan'),
            $default_desc,
            PARAM_TEXT
        ));

        $features_settings->add(new admin_setting_configtext(
            'local_depan/' . $prefix . '_url',
            get_string('feature_url', 'local_depan'),
            get_string('feature_url_desc', 'local_depan'),
            '',
            PARAM_URL
        ));

        $features_settings->add(new admin_setting_configselect(
            'local_depan/' . $prefix . '_icon_type',
            get_string('feature_icon_type', 'local_depan'),
            get_string('feature_icon_type_desc', 'local_depan'),
            'icon',
            $feature_icon_type_options
        ));

        $features_settings->add(new admin_setting_configtext(
            'local_depan/' . $prefix . '_icon',
            get_string('feature_icon_class', 'local_depan'),
            get_string('feature_icon_class_desc', 'local_depan'),
            $default_icon,
            PARAM_TEXT
        ));

        $features_settings->add(new admin_setting_configstoredfile(
            'local_depan/' . $prefix . '_icon_image',
            get_string('feature_icon_image_file', 'local_depan'),
            get_string('feature_icon_image_file_desc', 'local_depan'),
            $prefix . '_icon_image',
            0,
            ['maxfiles' => 1, 'accepted_types' => ['image']]
        ));

        $features_settings->add(new admin_setting_configselect(
            'local_depan/' . $prefix . '_bg_type',
            get_string('feature_bg_type', 'local_depan'),
            get_string('feature_bg_type_desc', 'local_depan'),
            'none',
            $feature_bg_type_options
        ));

        $features_settings->add(new admin_setting_configcolourpicker(
            'local_depan/' . $prefix . '_bg_color',
            get_string('feature_bg_color_picker', 'local_depan'),
            get_string('feature_bg_color_picker_desc', 'local_depan'),
            '#ffffff'
        ));

        $features_settings->add(new admin_setting_configstoredfile(
            'local_depan/' . $prefix . '_bg_image',
            get_string('feature_bg_image_file', 'local_depan'),
            get_string('feature_bg_image_file_desc', 'local_depan'),
            $prefix . '_bg_image',
            0,
            ['maxfiles' => 1, 'accepted_types' => ['image']]
        ));
    }
}