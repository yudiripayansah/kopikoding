<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Service_Widget extends Widget_Base
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
		return 'itechie-service-widget';
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
		return esc_html__('Service', 'itechie-core');
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
					'layout_four' => __('Layout Four', 'itechie-core'),
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
				'condition'  => [
					'layout_type' => ['layout_one', 'layout_two', 'layout_three']
				]
			]
		);

		$this->add_control(
			'hide_left_content',
			[
				'label' => esc_html__('Hide Left Section Content ?', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'itechie-core'),
				'label_off' => esc_html__('No', 'itechie-core'),
				'return_value' => 'yes',
				'default' => 'no',
				'condition'  => [
					'layout_type' => 'layout_one'
				]
			]
		);


		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Title', 'itechie-core'),
				'default' => esc_html__('Default Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
				'default' => esc_html__('Default Sub Title', 'itechie-core'),
				'condition'  => [
					'layout_type' => ['layout_two', 'layout_three']
				]
			]
		);

		$this->add_control(
			'summary',
			[
				'label' => esc_html__('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Summary', 'itechie-core'),
				'default' => esc_html__('Default Summary', 'itechie-core'),
				'condition'  => [
					'layout_type' => ['layout_two', 'layout_three']
				]
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Content', 'itechie-core'),
				'default' => wp_kses(__('<p class="content">Default Content </p>', 'itechie-core'), 'itechie_core_allowed_tags'),
				'condition'  => [
					'layout_type' => 'layout_one'
				]
			]
		);

		$this->add_control(
			'button_label',
			[
				'label' => esc_html__('Button Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Contact Us', 'itechie-core'),
				'label_block' => true,
				'condition'  => [
					'layout_type' => ['layout_one', 'layout_two']
				]
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => esc_html__('Button Url', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('#', 'itechie-core'),
				'condition'  => [
					'layout_type' => ['layout_one', 'layout_two']
				],
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
			'second_button_label',
			[
				'label' => esc_html__('Second Button Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('All Service', 'itechie-core'),
				'label_block' => true,
				'condition'  => [
					'layout_type' => 'layout_one'
				]
			]
		);

		$this->add_control(
			'second_button_url',
			[
				'label' => esc_html__('Second Button Url', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('#', 'itechie-core'),
				'condition'  => [
					'layout_type' => 'layout_one'
				],
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

		/*
		* Post Options
		*/
		$this->start_controls_section(
			'post_options',
			[
				'label' => esc_html__('Post Options', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'select_cat',
			[
				'label'    => esc_html__('Select Category', 'itechie-core'),
				'type'     => Controls_Manager::SELECT2,
				'multiple' => true,
				'options'  => itechie_core_taxonomy_list('service_cat'),
				'condition' => [
					'layout_type' => 'layout_one'
				]

			]
		);

		$this->add_control(
			'post_count',
			[
				'label' => __('Number Of Posts', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['count'],
				'range' => [
					'count' => [
						'min' => 0,
						'max' => 15,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'count',
					'size' => 6,
				],
			]
		);

		$this->add_control(
			'word_limit',
			[
				'label' => __('Word Limit', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['count'],
				'range' => [
					'count' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'count',
					'size' => 15,
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'   => esc_html__('Order by', 'itechie-core'),
				'type'    => Controls_Manager::SELECT2,
				'options' => array(
					'author' => esc_html__('Author', 'itechie-core'),
					'title'  => esc_html__('Title', 'itechie-core'),
					'date'   => esc_html__('Date', 'itechie-core'),
					'rand'   => esc_html__('Random', 'itechie-core'),
				),
				'default' => 'date'

			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__('Order', 'itechie-core'),
				'type'    => Controls_Manager::SELECT2,
				'options' => array(
					'desc' => esc_html__('DESC', 'itechie-core'),
					'asc'  => esc_html__('ASC', 'itechie-core'),
				),
				'default' => 'desc'

			]
		);

		$this->add_control(
			'post-offset',
			[
				'label'       => esc_html__('Post Offset', 'itechie-core'),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__('How Many Post You Offset', 'itechie-core'),
				'default'     => esc_html__('0', 'itechie-core')
			]
		);

		$this->end_controls_section();
		//shape
		$this->start_controls_section(
			'shape',
			[
				'label' => esc_html__('Shape', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' =>  'layout_three'
				]
			]
		);

		$this->add_control(
			'top_shape_one',
			[
				'label' => esc_html__('Top Shape One', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'top_shape_two',
			[
				'label' => esc_html__('Top Shape Two', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'service_shape',
			[
				'label' => esc_html__('Service Background Shape', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->end_controls_section();

		//Section Header
		$this->start_controls_section(
			'section_header',
			[
				'label' => esc_html__('Section Options', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_two', 'layout_three']
				]
			]
		);

		itechie_core_typo_and_color_options($this, 'Section Title', '{{WRAPPER}} .section-title .title', ['layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title .content', ['layout_two', 'layout_three']);

		itechie_core_typo_and_color_options($this, 'Button ', '{{WRAPPER}} .btn-base', ['layout_two']);
		itechie_core_typo_and_color_options($this, 'Button', '{{WRAPPER}} .btn-base', ['layout_two'], 'background-color', false);

		$this->end_controls_section();

		//General style
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__('Service Style', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .section-title .title', ['layout_one']);

		itechie_core_typo_and_color_options($this, 'Content', '{{WRAPPER}} .section-title.style-white .content', ['layout_one']);

		itechie_core_typo_and_color_options($this, 'Service Title', '{{WRAPPER}} .single-service-inner.style-white h3 a,
		{{WRAPPER}} .single-service-inner .details h3', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		itechie_core_typo_and_color_options($this, 'Service Title Hover', '{{WRAPPER}} .single-service-inner .details-hover-wrap h3,
		.single-service-inner.style-hover-base:hover h3', ['layout_two', 'layout_four']);

		itechie_core_typo_and_color_options($this, 'Service Summary', '{{WRAPPER}} .single-service-inner.style-white p,
		.single-service-inner .details p', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		itechie_core_typo_and_color_options($this, 'Service Summary Hover', '.single-service-inner .details-hover-wrap p,
		.single-service-inner.style-hover-base:hover p', ['layout_two', 'layout_four']);

		itechie_core_typo_and_color_options($this, 'Service Button', '{{WRAPPER}} .btn-base', ['layout_two']);
		itechie_core_typo_and_color_options($this, 'Service Button Background', '{{WRAPPER}} .btn-base', ['layout_two'], 'background-color', false);

		itechie_core_typo_and_color_options($this, 'Button One', '{{WRAPPER}} .btn-border-white', ['layout_one']);
		itechie_core_typo_and_color_options($this, 'Button One Background', '{{WRAPPER}} .btn-border-white', ['layout_one'], 'background-color', false);

		itechie_core_typo_and_color_options($this, 'Button Two', '{{WRAPPER}} .btn-black', ['layout_one']);
		itechie_core_typo_and_color_options($this, 'Button Two Background', '{{WRAPPER}} .btn-black', ['layout_one'], 'background-color', false);

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
		global $post;
		$post_query = new \WP_Query(array('post_type' => 'service', 'orderby' => $settings['orderby'], 'order' => $settings['order'], 'posts_per_page' => $settings['post_count']['size'], 'offset' => $settings['post-offset']));
		include itechie_get_template('service-one.php');
		include itechie_get_template('service-two.php');
		include itechie_get_template('service-three.php');
		include itechie_get_template('service-four.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Service_Widget());
