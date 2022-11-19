<?php

/**
 * All Elementor widget init
 * @package ITECHIE
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit(); // exit if access directly
}


if (!class_exists('Itechie_Elementor_Widget_Init')) {

	class Itechie_Elementor_Widget_Init
	{
		/*
			* $instance
			* @since 1.0.0
			* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct()
		{
			add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));
			//elementor widget registered
			add_action('elementor/widgets/widgets_registered', array($this, '_widget_registered'));
			// elementor editor css
			add_filter('elementor/icons_manager/additional_tabs', array($this, 'elementor_custom_icons'));
		}
		/*
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
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager)
		{
			$elements_manager->add_category(
				'itechie_widgets',
				[
					'title' => __('ITECHIE Widgets', 'itechie-core'),
					'icon' => 'fa fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered()
		{
			if (!class_exists('Elementor\Widget_Base')) {
				return;
			}
			$elementor_widgets = array(
				'header',
				'banner',
				'about',
				'service',
				'funfact',
				'iconbox',
				'info-box',
				'how-it-work',
				'testimonial',
				'case-study',
				'skill',
				'video',
				'contact-form',
				'news-letter',
				'pricing',
				'sponsor',
				'event',
				'faq',
				'gallery',
				'blog',
				'team',
				'course',
				'call-to-action',
				'section-header',
				'footer-about',
				'footer-nav',
				'footer-subscribe',
				'copyright',
				'preview'
			);
			$elementor_widgets = apply_filters('itechie_elementor_widget', $elementor_widgets);

			if (is_array($elementor_widgets) && !empty($elementor_widgets)) {
				foreach ($elementor_widgets as $widget) {
					$widget_file = 'plugins/elementor/widget/' . $widget . '.php';
					$template_file = locate_template($widget_file);
					if (!$template_file || !is_readable($template_file)) {
						$template_file = ITECHIE_CORE_ELEMENTOR . '/widgets/class-' . $widget . '-widget.php';
					}
					if ($template_file && is_readable($template_file)) {
						include_once $template_file;
					}
				}
			}
		}

		public function elementor_custom_icons($array)
		{
			return array(
				'itechie-icon' => array(
					'name'          => 'itechie-icon',
					'label'         => 'itechie Icon',
					'url'           => '',
					'enqueue'       => array(
						ITECHIE_CORE_CSS . '/custom-icon.css',
					),
					'prefix'        => '',
					'displayPrefix' => '',
					'labelIcon'     => 'icon-video',
					'ver'           => '1.0',
					'fetchJson'     => ITECHIE_CORE_CSS . '/itechie-icon.json',
					'native'        => 1,
				),
			);
		}
	}

	if (class_exists('Itechie_Elementor_Widget_Init')) {
		Itechie_Elementor_Widget_Init::getInstance();
	}
} //end if
