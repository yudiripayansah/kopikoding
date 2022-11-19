<?php

/**
 * @package ITECHIE
 * @sicne 1.0.0
 * */

if (!class_exists('Itechie_Core_Init')) {

	class Itechie_Core_Init
	{

		//instance
		protected static $instance;

		public function __construct()
		{
			//plugin_assets
			add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));

			//load plugin dependency files
			$this->load_plugin_dependency_files();
		}

		/**
		 * getInstance()
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
		 * plugin_assets()
		 * @since 1.0.0
		 * */
		public function plugin_assets()
		{
			$this->load_plugin_css();
			$this->load_plugin_js();
		}


		/**
		 * load plugin css
		 * @since 1.0.0
		 * */
		public function load_plugin_css()
		{

			wp_enqueue_style('fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all');
			wp_enqueue_style('fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all');

			wp_enqueue_style('bootstrap', ITECHIE_CORE_CSS . '/bootstrap.min.css', array(), ITECHIE_CORE_VERSION, 'all');
			wp_enqueue_style('animate', ITECHIE_CORE_CSS . '/animate.min.css', array(), ITECHIE_CORE_VERSION, 'all');
			wp_enqueue_style('nice-select', ITECHIE_CORE_CSS . '/nice-select.min.css', array(), ITECHIE_CORE_VERSION, 'all');
			wp_enqueue_style('magnific', ITECHIE_CORE_CSS . '/magnific.min.css', array(), ITECHIE_CORE_VERSION, 'all');
			wp_enqueue_style('owl', ITECHIE_CORE_CSS . '/owl.min.css', array(), ITECHIE_CORE_VERSION, 'all');
			wp_enqueue_style('slick', ITECHIE_CORE_CSS . '/slick.min.css', array(), ITECHIE_CORE_VERSION, 'all');
			wp_enqueue_style('itechie-main-style', ITECHIE_CORE_CSS . '/style.css', array(), ITECHIE_CORE_VERSION, 'all');
		}
		/**
		 * load plugin js
		 * @since 1.0.0
		 * */
		public function load_plugin_js()
		{
			wp_enqueue_script('bootstrap',  ITECHIE_CORE_JS . '/bootstrap.min.js', array('jquery'), ITECHIE_CORE_VERSION, true);
			wp_enqueue_script('nice-select',  ITECHIE_CORE_JS . '/nice-select.min.js', array('jquery'), ITECHIE_CORE_VERSION, true);
			wp_enqueue_script('magnific',  ITECHIE_CORE_JS . '/magnific.min.js', array('jquery'), ITECHIE_CORE_VERSION, true);
			wp_enqueue_script('owl',  ITECHIE_CORE_JS . '/owl.min.js', array('jquery'), ITECHIE_CORE_VERSION, true);
			wp_enqueue_script('slick',  ITECHIE_CORE_JS . '/slick.min.js', array('jquery'), ITECHIE_CORE_VERSION, true);
			wp_enqueue_script('tweenmax',  ITECHIE_CORE_JS . '/tweenmax.min.js', array('jquery'), ITECHIE_CORE_VERSION, true);
			wp_enqueue_script('isotope',  ITECHIE_CORE_JS . '/isotope.min.js', array('jquery'), ITECHIE_CORE_VERSION, true);
			wp_enqueue_script('imageload',  ITECHIE_CORE_JS . '/imageload.min.js', array('jquery'), ITECHIE_CORE_VERSION, true);
			wp_enqueue_script('itechie-elementor-js',  ITECHIE_CORE_JS . '/elementor-script.js', array('jquery'), ITECHIE_CORE_VERSION, true);
		}


		/**
		 * load_plugin_dependency_files()
		 * @since 1.0.0
		 * */
		public function load_plugin_dependency_files()
		{

			$includes_files = array(
				array(
					'file-name' => 'codestar-framework/codestar-framework',
					'file-path' => ITECHIE_CORE_LIB
				),
				array(
					'file-name' => 'functions',
					'file-path' => ITECHIE_CORE_INC
				),
				array(
					'file-name' => 'utility',
					'file-path' => ITECHIE_CORE_INC
				),
				array(
					'file-name' => 'class-itechie-shortcodes',
					'file-path' => ITECHIE_CORE_SHORTCODES
				),
				array(
					'file-name' => 'class-elementor-widgets-init',
					'file-path' => ITECHIE_CORE_ELEMENTOR
				),
				array(
					'file-name' => 'class-admin-menu-page',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'class-header-footer-post-type',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'post-type/service',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'post-type/project',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'post-type/pricing',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'post-type/team',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'metabox/team',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'metabox/pricing',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'metabox/service',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'metabox/project',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				array(
					'file-name' => 'metabox/page-metabox',
					'file-path' => ITECHIE_CORE_ADMIN
				),
				//sidebar widget
				array(
					'file-name' => 'recent-post-widget',
					'file-path' => ITECHIE_CORE_WIDGETS
				),
				array(
					'file-name' => 'recent-service-widget',
					'file-path' => ITECHIE_CORE_WIDGETS
				),
				array(
					'file-name' => 'download-widget',
					'file-path' => ITECHIE_CORE_WIDGETS
				),
				array(
					'file-name' => 'achievement',
					'file-path' => ITECHIE_CORE_WIDGETS
				),
				array(
					'file-name' => 'hotline',
					'file-path' => ITECHIE_CORE_WIDGETS
				),
				array(
					'file-name' => 'demo-import',
					'file-path' => ITECHIE_CORE_INC
				),
			);
			if (is_array($includes_files) && !empty($includes_files)) {
				foreach ($includes_files as  $file) {
					if (file_exists($file['file-path'] . '/' . $file['file-name'] . '.php')) {
						require_once $file['file-path'] . '/' . $file['file-name'] . '.php';
					}
				}
			}
		}
	} //end class

	Itechie_Core_Init::getInstance();
}
