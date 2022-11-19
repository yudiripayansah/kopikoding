<?php

/**
 * itechie functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package itechie
 */

/**
 * Define Const for theme Dir
 * @since 1.0.0
 * */
define('ITECHIE_ROOT_PATH', get_template_directory());
define('ITECHIE_ROOT_URL', get_template_directory_uri());
define('ITECHIE_CSS', ITECHIE_ROOT_URL . '/assets/css');
define('ITECHIE_JS', ITECHIE_ROOT_URL . '/assets/js');
define('ITECHIE_INC', ITECHIE_ROOT_PATH . '/inc');
define('ITECHIE_THEME_OPTIONS', ITECHIE_INC . '/theme-options');
define('ITECHIE_THEME_STYLESHEETS', ITECHIE_INC . '/theme-stylesheets');
define('ITECHIE_THEME_OPTIONS_IMG', ITECHIE_ROOT_URL . '/inc/theme-options/img');

/**
 * define theme info
 * @since 1.0.0
 * */
if (is_child_theme()) {
	$itechie_theme        = wp_get_theme();
	$itechie_parent_theme = $itechie_theme->Template;
	$itechie_theme_info   = wp_get_theme($itechie_parent_theme);
} else {
	$itechie_theme_info = wp_get_theme();
}
define('ITECHIE_DEV_MODE', false);
$itechie_version = ITECHIE_DEV_MODE ? time() : $itechie_theme_info->get('Version');
define('ITECHIE_NAME', $itechie_theme_info->get('Name'));
define('ITECHIE_VERSION', $itechie_version);
define('ITECHIE_AUTHOR', $itechie_theme_info->get('Author'));
define('ITECHIE_AUTHOR_URI', $itechie_theme_info->get('AuthorURI'));


/*
* Include theme init file
* @since 1.0.0
*/
if (file_exists(ITECHIE_INC . '/class-itechie-init.php')) {
	require_once ITECHIE_INC . '/class-itechie-init.php';
}


/*
* template functions
* @since 1.0.0
*/
if (file_exists(ITECHIE_INC . '/template-functions.php')) {
	require_once ITECHIE_INC . '/template-functions.php';
}

/*
* template tags
* @since 1.0.0
*/
if (file_exists(ITECHIE_INC . '/template-tags.php')) {
	require_once ITECHIE_INC . '/template-tags.php';
}


/*
* Include theme options helper functions
* @since 1.0.0
*/
if (file_exists(ITECHIE_INC . '/get-theme-options.php')) {
	require_once ITECHIE_INC . '/get-theme-options.php';
}