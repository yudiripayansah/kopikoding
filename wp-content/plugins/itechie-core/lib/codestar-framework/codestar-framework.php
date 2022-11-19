<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly.
/**
 *
 * @package   Codestar Framework - WordPress Options Framework
 * @author    Codestar <info@codestarthemes.com>
 * @link      http://codestarframework.com
 * @copyright 2015-2022 Codestar
 *
 *
 * Plugin Name: Codestar Framework
 * Plugin URI: http://codestarframework.com/
 * Author: Codestar
 * Author URI: http://codestarthemes.com/
 * Version: 2.2.6
 * Description: A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 * Text Domain: csf
 * Domain Path: /languages
 *
 */
require_once plugin_dir_path(__FILE__) . 'classes/setup.class.php';


function itechie_core_font_custom_icon_css()
{
    wp_enqueue_style('font-et-line',  ITECHIE_CORE_CSS . '/custom-icon.css');
    wp_add_inline_style('csf', '[data-icon]:before {content:none}');
}
add_action('admin_print_styles', 'itechie_core_font_custom_icon_css');
add_action('wp_print_styles', 'itechie_core_font_custom_icon_css');


function itechie__add_icons_font($icon)
{

    $Itechie_Icons = array(
        array(
            'title' => esc_html__('Itechie Icon'),
            'icons' => array(
                "icomoon-analysis",
                "icomoon-application",
                "icomoon-approval",
                "icomoon-back",
                "icomoon-calendar",
                "icomoon-calendar-2",
                "icomoon-chat",
                "icomoon-chat-2",
                "icomoon-check-mark",
                "icomoon-check-mark2",
                "icomoon-client",
                "icomoon-clock",
                "icomoon-close",
                "icomoon-cloud-data",
                "icomoon-computer",
                "icomoon-deep-learning",
                "icomoon-diamond",
                "icomoon-diamond-2",
                "icomoon-email",
                "icomoon-facebook",
                "icomoon-folder",
                "icomoon-folder-2",
                "icomoon-gear",
                "icomoon-help",
                "icomoon-laptop",
                "icomoon-layer",
                "icomoon-link",
                "icomoon-linkedin",
                "icomoon-lock",
                "icomoon-magnifiying-glass",
                "icomoon-mail",
                "icomoon-megaphone",
                "icomoon-minus-sign",
                "icomoon-money",
                "icomoon-next",
                "icomoon-phone-call",
                "icomoon-pin",
                "icomoon-pinterest",
                "icomoon-play-button",
                "icomoon-play-button2",
                "icomoon-plus",
                "icomoon-profile",
                "icomoon-project",
                "icomoon-quote",
                "icomoon-quote-2",
                "icomoon-right-quote",
                "icomoon-save-money",
                "icomoon-search",
                "icomoon-share",
                "icomoon-solution",
                "icomoon-team",
                "icomoon-telephone",
                "icomoon-time",
                "icomoon-twitter",
                "icomoon-user",
                "icomoon-user-2",
                "icomoon-user-3"
            ),
        )
    );

    // combine the two arrays
    $icons = array_merge($Itechie_Icons, $icon);

    return $icons;
}
add_filter('csf_field_icon_add_icons', 'itechie__add_icons_font');
