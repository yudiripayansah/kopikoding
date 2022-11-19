<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Footer_About_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'itechie-footer-about-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Footer About', 'itechie-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-product-info';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['itechie_widgets'];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls()
	{

		$this->start_controls_section(
			'layout_section',
			[
				'label' => __('Layout', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => __('Select Layout', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'layout_one',
				'options' => [
					'layout_one' => __('Layout One', 'itechie-core'),
				]
			]
		);

		$this->end_controls_section();

		/*
		* content
		*/
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Title', 'itechie-core'),
				'default' => esc_html__('About company', 'itechie-core')
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Content', 'itechie-core'),
			]
		);

		$social_icon = new \Elementor\Repeater();

		$social_icon->add_control(
			'icon',
			[
				'label' => esc_html__('Choose Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook',
					'library' => 'brands',
				],

			]
		);

		$social_icon->add_control(
			'icon_color',
			[
				'label' => esc_html__('Icon Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$social_icon->add_control(
			'url',
			[
				'label' => esc_html__('Social Url', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('#', 'itechie-core'),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'social_icon',
			[
				'label' => esc_html__('Social Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social_icon->get_controls(),
				'prevent_empty' => false,
			]
		);

		$this->end_controls_section();

		//General style
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__('Style Options', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .widget-title', ['layout_one']);
		itechie_core_typo_and_color_options($this, 'About Text', '{{WRAPPER}} .widget_about .details p', ['layout_one']);

		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include itechie_get_template('footer-about-one.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Footer_About_Widget());
