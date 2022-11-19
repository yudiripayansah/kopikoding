<?php

/**
 * @package Itechie Core
 * @version 1.0.1
 */
/*
Plugin Name: Itechie Core
Plugin URI:
Description: This is a helper plugin for Itechie  Theme
Author: SolverWp
Version: 1.0.0
Author URI:https://solverwp.com/
*/
/**  Related Theme Type */

global $related_theme_type;
$related_theme_type = array('ITECHIE', 'ITECHIE Child');
//define current theme name
$current_theme = !empty(wp_get_theme()) ? wp_get_theme()->get('Name') : '';
define('CURRENT_THEME_NAME', $current_theme);


/*
 * Define Plugin Dir Path
 * @since 1.0.0
 * */
define('ITECHIE_CORE_SELF_PATH', 'itechie-core/itechie-core.php');
define('ITECHIE_CORE_ROOT_PATH', plugin_dir_path(__FILE__));
define('ITECHIE_CORE_ROOT_URL', plugin_dir_url(__FILE__));
define('ITECHIE_CORE_LIB', ITECHIE_CORE_ROOT_PATH . '/lib');
define('ITECHIE_CORE_INC', ITECHIE_CORE_ROOT_PATH . '/inc');
define('ITECHIE_CORE_ADMIN', ITECHIE_CORE_INC . '/admin');
define('ITECHIE_CORE_ADMIN_ASSETS', ITECHIE_CORE_ROOT_URL . 'inc/admin/assets');
define('ITECHIE_CORE_CSS', ITECHIE_CORE_ROOT_URL . 'assets/css');
define('ITECHIE_CORE_IMG', ITECHIE_CORE_ROOT_URL . 'assets/img');
define('ITECHIE_CORE_JS', ITECHIE_CORE_ROOT_URL . 'assets/js');
define('ITECHIE_CORE_ELEMENTOR', ITECHIE_CORE_INC . '/elementor');
define('ITECHIE_CORE_SHORTCODES', ITECHIE_CORE_INC . '/shortcodes');
define('ITECHIE_CORE_WIDGETS', ITECHIE_CORE_INC . '/widgets');

/** Plugin version **/
define('ITECHIE_CORE_VERSION', '1.0.0');


//plugin core file include
if (file_exists(ITECHIE_CORE_INC . '/class-itechie-core-init.php')) {
	require_once ITECHIE_CORE_INC . '/class-itechie-core-init.php';
}


/**
 * Load plugin textdomain.
 */
add_action('plugins_loaded', 'itechs_core_language');
if (!function_exists('itechs_core_language')) {

	function itechs_core_language()
	{
		load_plugin_textdomain('itechie-core', false, plugin_basename(dirname(__FILE__)) . '/language');
	}
}
