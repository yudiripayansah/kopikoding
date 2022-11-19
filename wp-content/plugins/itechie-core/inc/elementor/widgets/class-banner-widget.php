<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Banner_Widget extends Widget_Base
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
		return 'itechie-banner-widget';
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
		return esc_html__('Banner', 'itechie-core');
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
				'label' => esc_html__('Layout', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => esc_html__('Select Layout', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'layout_one',
				'options' => [
					'layout_one' => esc_html__('Layout One', 'itechie-core'),
					'layout_two' => esc_html__('Layout Two', 'itechie-core'),
					'layout_three' => esc_html__('Layout Three', 'itechie-core'),
				]
			]
		);

		$this->end_controls_section();

		/*
		* content
		*/
		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two']
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'summary',
			[
				'label' => esc_html__('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Summary', 'itechie-core'),
			]
		);

		$this->add_control(
			'button_label',
			[
				'label' => esc_html__('Button Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Discover More', 'itechie-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => esc_html__('Button Url', 'itechie-core'),
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
			'button_label_two',
			[
				'label' => esc_html__('Button Text Two', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Discover More', 'itechie-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_url_two',
			[
				'label' => esc_html__('Button Url Two', 'itechie-core'),
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
			'banner_image',
			[
				'label' => esc_html__('Banner Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$this->add_control(
			'shape_type',
			[
				'label' => esc_html__('Shape Type', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image'  => esc_html__('Image', 'itechie-core'),
					'icon' => esc_html__('Icon', 'itechie-core'),
				],
			]
		);

		$this->add_control(
			'bg_shape',
			[
				'label' => esc_html__('Background Shape', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'shape_type' => 'image'
				],
				'default' => [],
			]
		);

		$this->add_control(
			'shape_icon',
			[
				'label' => __('Shape Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
					'shape_type' => 'icon'
				],
			]
		);

		$this->add_control(
			'image_shape',
			[
				'label' => esc_html__('Image Shape', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
				'condition' => [
					'layout_type' => 'layout_one'
				]

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'layout_three_content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' =>  'layout_three'
				]
			]
		);

		$slider = new \Elementor\Repeater();

		$slider->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Title', 'itechie-core'),
			]
		);

		$slider->add_control(
			'sub_title',
			[
				'label' => esc_html__('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
			]
		);

		$slider->add_control(
			'summary',
			[
				'label' => esc_html__('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Summary', 'itechie-core'),
			]
		);

		$slider->add_control(
			'button_label',
			[
				'label' => esc_html__('Button Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Discover More', 'itechie-core'),
				'label_block' => true,
			]
		);

		$slider->add_control(
			'button_url',
			[
				'label' => esc_html__('Button Url', 'itechie-core'),
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

		$slider->add_control(
			'button_label_two',
			[
				'label' => esc_html__('Button Text Two', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Discover More', 'itechie-core'),
				'label_block' => true,
			]
		);

		$slider->add_control(
			'button_url_two',
			[
				'label' => esc_html__('Button Url Two', 'itechie-core'),
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

		$slider->add_control(
			'slider_image',
			[
				'label' => esc_html__('Slider Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$this->add_control(
			'slider',
			[
				'label' => esc_html__('Slider Items', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $slider->get_controls(),
				'title_field' => '{{{ title }}}',
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

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .banner-inner.style-white .title,{{WRAPPER}} .banner-inner .title', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Title Primary', '{{WRAPPER}} .banner-inner .title span,{{WRAPPER}} .banner-inner .title span', ['layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Sub Title', '{{WRAPPER}} .banner-inner .sub-title', ['layout_one', 'layout_two', 'layout_three']);

		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .banner-inner .content', ['layout_two']);

		itechie_core_typo_and_color_options($this, 'Button One', '{{WRAPPER}} .btn-base', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Button One Background', '{{WRAPPER}} .btn-base', ['layout_one', 'layout_two', 'layout_three'], 'background-color', false);

		itechie_core_typo_and_color_options($this, 'Button Two', '{{WRAPPER}} .btn-border-white, {{WRAPPER}} .btn-black', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Button Two Background', '{{WRAPPER}} .btn-border-white, {{WRAPPER}} .btn-black', ['layout_one', 'layout_two', 'layout_three'], 'background-color', false);

		itechie_core_typo_and_color_options($this, 'Section Background', '{{WRAPPER}} .bg-black', ['layout_one'], 'background-color', false);

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
		include itechie_get_template('banner-one.php');
		include itechie_get_template('banner-two.php');
		include itechie_get_template('banner-three.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Banner_Widget());
