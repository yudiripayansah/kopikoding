<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Header_Widget extends Widget_Base
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
		return 'itechie-Header-widget';
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
		return esc_html__('Header', 'itechie-core');
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
					'layout_two' => __('Layout Two', 'itechie-core'),
					'layout_three' => __('Layout Three', 'itechie-core'),
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'navigation',
			[
				'label' => __('Navigation', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'nav_menu',
			[
				'label' => __('Select Nav Menu', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => itechie_core_nav_menu(),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'logo_section',
			[
				'label' => __('Logo', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'logo_type',
			[
				'label' => esc_html__('Logo Type', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image'  => esc_html__('Image', 'itechie-core'),
					'icon' => esc_html__('Icon', 'itechie-core'),
				],
			]
		);

		$this->add_control(
			'logo',
			[
				'label' => __('Logo', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'logo_type' => 'image'
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'icon_logo',
			[
				'label' => __('Icon Logo', 'itechie-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
					'logo_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'mobile_icon_logo',
			[
				'label' => __('Mobile Icon Logo', 'itechie-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
					'logo_type' => 'icon',
					'layout_type' => 'layout_three',
				],
			]
		);

		$this->add_control(
			'mobile_logo',
			[
				'label' => __('Mobile Logo', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'layout_type' => ['layout_two', 'layout_three'],
					'logo_type' => 'image'
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'logo_dimension',
			[
				'label' => __('Logo Dimension', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
				'description' => __('Set Custom Logo Size.', 'itechie-core'),
				'default' => [
					'width' => '100',
					'height' => '54',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'top_bar',
			[
				'label' => __('Top Bar', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$topbar_left_list = new \Elementor\Repeater();

		$topbar_left_list->add_control(
			'icon',
			[
				'label' => __('Select Icon', 'alori-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-clock',
					'library' => 'brands',
				],
				'label_block' => true,
			]
		);

		$topbar_left_list->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Opening Hour 9:00am - 10:00pm', 'itechie-core'),
			]
		);


		$this->add_control(
			'topbar_left_list',
			[
				'label' => esc_html__('Topbar Left Content', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_three']
				],
				'fields' => $topbar_left_list->get_controls(),
				'title_field' => '{{{ text }}}',
			]
		);

		$topbar_items = new \Elementor\Repeater();

		$topbar_items->add_control(
			'icon',
			[
				'label' => __('Select Icon', 'alori-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-clock',
					'library' => 'brands',
				],
				'label_block' => true,
			]
		);

		$topbar_items->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Office time', 'itechie-core'),
			]
		);

		$topbar_items->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Opening Hour 9:00am - 10:00pm', 'itechie-core'),
			]
		);


		$this->add_control(
			'topbar_items',
			[
				'label' => esc_html__('Topbar Items', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'condition' => [
					'layout_type' => 'layout_two'
				],
				'fields' => $topbar_items->get_controls(),
				'title_field' => '{{{ text }}}',
			]
		);

		$this->add_control(
			'topbar_right_text',
			[
				'label' => esc_html__('Right Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Hot Line: (+00)-333-444-555', 'itechie-core'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'social_network',
			[
				'label' => __('Social Network', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'social_network_title',
			[
				'label' => esc_html__('Social Network Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__(' Follow Us On:', 'itechie-core'),
				'condition' => [
					'layout_type' => 'layout_one'
				]
			]
		);

		$social_icons = new \Elementor\Repeater();

		$social_icons->add_control(
			'social_icon',
			[
				'label' => __('Select Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook',
					'library' => 'brands',
				],
				'label_block' => true,
			]
		);

		$social_icons->add_control(
			'social_url',
			[
				'label' => __('Add Url', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('#', 'itechie-core'),
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
			'social_icons',
			[
				'label' => __('Social Icons', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $social_icons->get_controls(),
				'default' => [
					[
						'social_url' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						],
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'other',
			[
				'label' => __('Other', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'search_status',
			[
				'label' => esc_html__('Search Enable ?', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'itechie-core'),
				'label_off' => esc_html__('No', 'itechie-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'button_label',
			[
				'label' => esc_html__('Button Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Get Started', 'itechie-core'),
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

		$this->end_controls_section();

		//General style
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__('Style Options', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		itechie_core_typo_and_color_options($this, 'Top Bar', '{{WRAPPER}} .navbar-top ul li p,{{WRAPPER}} .navbar-top ul li p span', ['layout_one', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Top Bar Title', '{{WRAPPER}} .navbar-top .media .media-body h6', ['layout_two']);
		itechie_core_typo_and_color_options($this, 'Top Bar Text', '{{WRAPPER}} .navbar-top .media .media-body p', ['layout_two']);

		itechie_core_typo_and_color_options($this, 'Top Bar Background', '{{WRAPPER}} .navbar-top', ['layout_one', 'layout_three'], 'background-color', false);
		itechie_core_typo_and_color_options($this, 'Nav Bar Background', '{{WRAPPER}} .navbar-area-2', ['layout_two'], 'background-color', false);

		itechie_core_typo_and_color_options($this, 'Navigation', '{{WRAPPER}} .navbar-area-1 .nav-container .navbar-collapse .navbar-nav > li > a,
		{{WRAPPER}} .navbar-area-2 .nav-container .navbar-collapse .navbar-nav > li a,
		{{WRAPPER}} .navbar-area-3 .nav-container .navbar-collapse .navbar-nav > li a', ['layout_one', 'layout_two', 'layout_three']);

		itechie_core_typo_and_color_options($this, 'Button ', '{{WRAPPER}} .btn-base,{{WRAPPER}} .btn.btn-black', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Button  Background', '{{WRAPPER}} .btn-base,{{WRAPPER}} .btn.btn-black', ['layout_one', 'layout_two', 'layout_three'], 'background-color', false);


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
		include itechie_get_template('header-one.php');
		include itechie_get_template('header-two.php');
		include itechie_get_template('header-three.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Header_Widget());
