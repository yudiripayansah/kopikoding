<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Blog_Widget extends Widget_Base
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
		return 'itechie-blog-widget';
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
		return esc_html__('Blog', 'itechie-core');
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

		//post options
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
			'select_cat',
			[
				'label'    => esc_html__('Select Category', 'itechie-core'),
				'type'     => Controls_Manager::SELECT2,
				'multiple' => true,
				'options'  => itechie_core_taxonomy_list(),

			]
		);


		$this->add_control(
			'exclude_cat',
			[
				'label'    => esc_html__('Exclude Category', 'itechie-core'),
				'type'     => Controls_Manager::SELECT2,
				'multiple' => true,
				'options'  => itechie_core_taxonomy_list(),
			]
		);

		$this->add_control(
			'select_tag',
			[
				'label'    => esc_html__('Select tag', 'itechie-core'),
				'type'     => Controls_Manager::SELECT2,
				'multiple' => true,
				'options'  => itechie_core_post_tag(),
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

		$this->end_controls_section();

		$this->end_controls_section();

		//General style
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__('Section Header Style', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two']
				]
			]
		);

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .section-title .title', ['layout_one', 'layout_two']);
		itechie_core_typo_and_color_options($this, 'Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two']);
		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title .content', ['layout_one', 'layout_two']);

		$this->end_controls_section();

		//post style
		$this->start_controls_section(
			'post_style',
			[
				'label' => esc_html__('Post Style', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		itechie_core_typo_and_color_options($this, 'Post Title', '{{WRAPPER}} .single-blog-inner .details h4 a,{{WRAPPER}}  ul li .media .media-body .title a', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		itechie_core_typo_and_color_options($this, 'Post Meta', '{{WRAPPER}} .blog-meta li a,{{WRAPPER}} ul li .media .media-body .post-info span', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		itechie_core_typo_and_color_options($this, 'Post Summary', '{{WRAPPER}} .single-blog-inner .details p', ['layout_one', 'layout_two', 'layout_three']);

		itechie_core_typo_and_color_options($this, 'Read More', '{{WRAPPER}} .read-more-text', ['layout_two']);

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

		$args  = array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $settings['post_count']['size'],
		);

		$args['orderby'] = $settings['orderby'];
		$args['order']   = $settings['order'];
		if (!empty($settings['exclude_cat'])) {
			$args['category__not_in'] = $settings['exclude_cat'];
		}


		if (!empty($settings['select_cat'])) {
			$args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => array_values($settings['select_cat'])
			);
		}

		if (!empty($settings['select_tag'])) {
			$args['tax_query'][] = array(
				'taxonomy' => 'post_tag',
				'field'    => 'id',
				'terms'    => array_values($settings['select_tag'])
			);
		}

		$posts_query = new \WP_Query($args);
		include itechie_get_template('blog-one.php');
		include itechie_get_template('blog-two.php');
		include itechie_get_template('blog-three.php');
		include itechie_get_template('blog-four.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Blog_Widget());
