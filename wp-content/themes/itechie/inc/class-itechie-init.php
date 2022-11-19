<?php

/**
 * theme init class
 * */
if (!defined('ABSPATH')) {
	exit(); //exit if access directly
}

if (!class_exists('Itechie_Init')) {

	class Itechie_Init
	{

		private static $instance;

		public function __construct()
		{
			//theme setup
			add_action('after_setup_theme', array($this, 'theme_setup'));
			//widget init
			add_action('widgets_init', array($this, 'widgets_init'));
			//theme assets
			add_action('wp_enqueue_scripts', array($this, 'theme_assets'));
		}

		/**
		 * getInstance();
		 * @since 1.0.0
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * theme setup
		 * @since 1.0.0
		 * */
		public function theme_setup()
		{
			/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on itechie, use a find and replace
		 * to change 'itechie' to the name of your theme in all the template files.
		 */
			load_theme_textdomain('itechie', get_template_directory() . '/languages');

			// Add default posts and comments RSS feed links to head.
			add_theme_support('automatic-feed-links');

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support('title-tag');

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support('post-thumbnails');


			// This theme uses wp_nav_menu() in one location.
			register_nav_menus(array(
				'main-menu' => esc_html__('Primary Menu', 'itechie'),
			));

			// editor style
			add_editor_style();

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support('html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			));

			// Set up the WordPress core custom background feature.
			add_theme_support('custom-background', apply_filters('itechie_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)));

			// Add theme support for selective refresh for widgets.
			add_theme_support('customize-selective-refresh-widgets');

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support('custom-logo', array(
				'height'      => 150,
				'width'       => 300,
				'flex-width'  => true,
				'flex-height' => true,
			));

			// This variable is intended to be overruled from themes.
			// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
			// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
			$GLOBALS['content_width'] = apply_filters('itechie_content_width', 640);


			//load theme dependency files
			$this->include_files();
		}


		/**
		 * widgets_init
		 * @since 1.0.0
		 * */
		public function widgets_init()
		{

			register_sidebar(array(
				'name'          => esc_html__('Sidebar', 'itechie'),
				'id'            => 'sidebar-1',
				'description'   => esc_html__('Add Sidebar widgets here.', 'itechie'),
				'before_widget' => '<div id="%1$s" class="widget %2$s widget-border">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			));
		}

		/**
		 * include files
		 * @since 1.0.0
		 * */
		public function include_files()
		{

			require_once get_template_directory() . '/inc/breadcrumb.php';

			require_once get_template_directory() . '/inc/class-itechie-general-hooks.php';

			require_once get_template_directory() . '/inc/theme-options/theme-customizer.php';

			require_once get_template_directory() . '/inc/theme-options/theme-options.php';

			require_once get_template_directory() . '/inc/plugins/tgma/activate.php';

			require_once get_template_directory() . '/inc/theme-stylesheets/theme-inline-styles.php';
		}

		/**
		 * theme assets
		 * @since 1.0.0
		 * */
		public function theme_assets()
		{
			$this->theme_css();
			$this->theme_js();
		}

		/*
		*itechie load font
		*/
		public static function itechie_fonts_url()
		{

			$font_url = '';

			/*
			Translators: If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ('off' !== _x('on', 'Google font: on or off', 'roofie')) {
				$font_url = add_query_arg('family', urlencode('Rajdhani:400,400i,500,400ii,600,600i,700,700i|Rubik:400,400i,500,500i,600,600i,700,700i&subset=latin,latin-ext'), "//fonts.googleapis.com/css");
			}

			return esc_url_raw($font_url);
		}

		/**
		 * theme css
		 * @since 1.0.0
		 * */
		public function theme_css()
		{
			wp_enqueue_style('itechie-font', self::itechie_fonts_url(), array(), ITECHIE_VERSION, 'all');
			wp_enqueue_style('itechie-custom-icon', ITECHIE_CSS . '/custom-icon.css', array(), ITECHIE_VERSION, 'all');
			wp_enqueue_style('fontawesome', ITECHIE_CSS . '/fontawesome.min.css', array(), ITECHIE_VERSION, 'all');
			wp_enqueue_style('bootstrap', ITECHIE_CSS . '/bootstrap.min.css', array(), ITECHIE_VERSION, 'all');
			wp_enqueue_style('itechie-main-style', ITECHIE_CSS . '/style.css', array(), ITECHIE_VERSION, 'all');
			wp_enqueue_style('itechie-responsive', ITECHIE_CSS . '/responsive.css', array(), ITECHIE_VERSION, 'all');
			wp_enqueue_style('itechie-rtl-style', ITECHIE_CSS . '/style-rtl.css', array(), ITECHIE_VERSION, 'all');
			wp_enqueue_style('itechie-style', get_stylesheet_uri());
		}

		/**
		 * theme js
		 * @since 1.0.0
		 * */
		public function theme_js()
		{

			wp_enqueue_script('bootstrap',  ITECHIE_JS . '/bootstrap.min.js', array('jquery'), ITECHIE_VERSION, true);
			wp_enqueue_script('fontawesome',  ITECHIE_JS . '/fontawesome.min.js', array('jquery'), ITECHIE_VERSION, true);
			wp_enqueue_script('itechie-main-script',  ITECHIE_JS . '/main.js', array('jquery'), ITECHIE_VERSION, true);

			if (is_singular() && comments_open() && get_option('thread_comments')) {
				wp_enqueue_script('comment-reply');
			}
		}
	} //end class

	Itechie_Init::getInstance();
}
