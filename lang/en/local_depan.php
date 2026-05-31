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
 * English language pack for Depan
 *
 * @package    local_depan
 * @category   string
 * @copyright  2025 Prihantoosa <pht854@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Landing Page';
$string['general_settings'] = 'General Settings';
$string['welcome_title'] = 'Welcome to Our Learning Platform';
$string['welcome_subtitle'] = 'Discover, Learn, and Grow with Us';
$string['get_started'] = 'Get Started';
$string['explore_courses'] = 'Explore Courses';
$string['about_platform'] = 'About Our Platform';
$string['login'] = 'Login';
$string['register'] = 'Register';
$string['features_title'] = 'Our Features';
$string['contact_us'] = 'Contact Us';
$string['learn_more'] = 'Learn More';
$string['hero_description'] = 'Join thousands of learners in our comprehensive online learning platform. Access quality courses, interactive content, and expert instructors.';
$string['feature_interactive'] = 'Interactive Learning';
$string['feature_interactive_desc'] = 'Engage with multimedia content, quizzes, and hands-on activities.';
$string['feature_expert'] = 'Expert Instructors';
$string['feature_expert_desc'] = 'Learn from industry professionals and experienced educators.';
$string['feature_flexible'] = 'Flexible Schedule';
$string['feature_flexible_desc'] = 'Study at your own pace, anytime and anywhere.';
$string['feature_certificate'] = 'Certifications';
$string['feature_certificate_desc'] = 'Earn recognized certificates upon course completion.';

// Settings strings
$string['enable_landing_page'] = 'Enable Landing Page';
$string['enable_landing_page_desc'] = 'Enable the custom landing page for non-logged in users';
$string['show_features'] = 'Show Features Section';
$string['show_features_desc'] = 'Display the Features section on the landing page. Uncheck to hide the entire section.';
$string['custom_welcome_title'] = 'Custom Welcome Title';
$string['custom_welcome_title_desc'] = 'Custom title for the hero section';
$string['custom_welcome_subtitle'] = 'Custom Welcome Subtitle';
$string['custom_welcome_subtitle_desc'] = 'Custom subtitle for the hero section';
$string['custom_hero_description'] = 'Custom Hero Description';
$string['custom_hero_description_desc'] = 'Custom description text in the hero section';

$string['maxactivecourses'] = 'Maximum active courses';
$string['maxactivecourses_desc'] = 'Maximum number of active (visible and within start/end date) courses shown under the hero section.';

$string['noactivecourses'] = 'There are currently no active courses.';

$string['view_all_courses'] = 'View all courses';

// Hero background settings
$string['hero_bg_type'] = 'Hero Background Type';
$string['hero_bg_type_desc'] = 'Choose the type of background for the hero section';
$string['hero_bg_gradient'] = 'Gradient Background';
$string['hero_bg_color'] = 'Solid Color Background';
$string['hero_bg_image'] = 'Image Background';
$string['hero_bg_color_picker'] = 'Background Color';
$string['hero_bg_color_picker_desc'] = 'Choose a solid color for the hero background';
$string['hero_bg_image_file'] = 'Background Image';
$string['hero_bg_image_file_desc'] = 'Upload an image for the hero background';

// Typography settings
$string['title_styling']       = 'Title styling';
$string['subtitle_styling']    = 'Subtitle styling';
$string['description_styling'] = 'Description styling';
$string['font_size']           = 'Font size';
$string['font_size_desc']      = 'CSS font-size value, e.g. <code>3.5rem</code>, <code>48px</code>. Leave empty to use theme default.';
$string['font_family']         = 'Font family';
$string['font_family_desc']    = 'Select a font family. Leave empty to use theme default.';
$string['font_inherit']        = 'Default (inherit from theme)';
$string['font_weight']         = 'Font weight';
$string['font_weight_desc']    = 'Select the thickness of the text. Leave empty to use theme default.';
$string['font_weight_100']     = '100 – Thin';
$string['font_weight_300']     = '300 – Light';
$string['font_weight_400']     = '400 – Normal';
$string['font_weight_500']     = '500 – Medium';
$string['font_weight_600']     = '600 – Semi Bold';
$string['font_weight_700']     = '700 – Bold';
$string['font_weight_800']     = '800 – Extra Bold';
$string['font_weight_900']     = '900 – Black';
$string['font_color']          = 'Font color';
$string['font_color_desc']     = 'Pick a color for this text. Leave empty to use theme default.';
$string['text_align']          = 'Text alignment';
$string['text_align_desc']     = 'Horizontal alignment of the text. Leave empty to use theme default.';
$string['text_align_left']     = 'Left';
$string['text_align_center']   = 'Center';
$string['text_align_right']    = 'Right';
$string['text_align_justify']  = 'Justify';
$string['line_height']         = 'Line height';
$string['line_height_desc']    = 'CSS line-height value, e.g. <code>1.5</code>, <code>2</code>. Leave empty to use theme default.';

// Features settings
$string['features_settings']            = 'Features Settings';
$string['features_settings_desc']       = 'Configure up to 8 feature cards shown in the Features section. Enable each slot and fill in the details.';
$string['feature_n']                    = 'Feature {$a}';
$string['feature_enabled']              = 'Enable this feature';
$string['feature_enabled_desc']         = 'Show this feature card on the landing page';
$string['feature_title']                = 'Title';
$string['feature_title_desc']           = 'Title shown on the feature card';
$string['feature_desc']                 = 'Description';
$string['feature_desc_desc']            = 'Short description shown on the feature card';
$string['feature_url']                  = 'Link URL';
$string['feature_url_desc']             = 'Optional URL. When set, the entire card becomes a clickable link. Leave empty for no link.';
$string['feature_icon_type']            = 'Icon type';
$string['feature_icon_type_desc']       = 'Choose whether to use a Font Awesome icon class or upload a custom image';
$string['feature_icon_type_icon']       = 'Font Awesome icon';
$string['feature_icon_type_image']      = 'Custom image';
$string['feature_icon_class']           = 'Font Awesome class';
$string['feature_icon_class_desc']      = 'Font Awesome icon class, e.g. <code>fa-star</code>. Used when icon type is set to Font Awesome.';
$string['feature_icon_image_file']      = 'Icon image';
$string['feature_icon_image_file_desc'] = 'Upload an image to use as the icon. Used when icon type is set to Custom image.';
$string['feature_bg_type']              = 'Card background type';
$string['feature_bg_type_desc']         = 'Choose the background style for this feature card';
$string['feature_bg_none']              = 'Default (white)';
$string['feature_bg_color']             = 'Solid colour';
$string['feature_bg_image']             = 'Background image';
$string['feature_bg_color_picker']      = 'Background colour';
$string['feature_bg_color_picker_desc'] = 'Pick a solid background colour for this card';
$string['feature_bg_image_file']        = 'Background image';
$string['feature_bg_image_file_desc']   = 'Upload a background image for this card. A dark overlay will be applied automatically to keep the text readable.';
