<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Team_Widget extends Widget_Base
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
		return 'itechie-team-widget';
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
		return esc_html__('Team', 'itechie-core');
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

		/*
		* content
		*/
		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Sub Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'summary',
			[
				'label' => __('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Summary', 'itechie-core'),
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

		//General style
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__('Style Options', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		itechie_core_typo_and_color_options($this, 'Section Title', '{{WRAPPER}} .section-title .title', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title .content', ['layout_one', 'layout_two', 'layout_three']);

		itechie_core_typo_and_color_options($this, 'Name', '{{WRAPPER}} .single-team-inner .details-inner h4 a', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Designation', '{{WRAPPER}} .single-team-inner .details-inner p', ['layout_one', 'layout_two', 'layout_three']);

		itechie_core_typo_and_color_options($this, 'Background', '{{WRAPPER}} .bg-blue, {{WRAPPER}} .btn-black', ['layout_two'], 'background-color', false);


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
		$post_query = new \WP_Query(array('post_type' => 'team', 'order' => $settings['order'], 'orderby', $settings['orderby'], 'posts_per_page' => $settings['post_count']['size'], 'offset' => $settings['post-offset']));
		include itechie_get_template('team-one.php');
		include itechie_get_template('team-two.php');
		include itechie_get_template('team-three.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Team_Widget());
