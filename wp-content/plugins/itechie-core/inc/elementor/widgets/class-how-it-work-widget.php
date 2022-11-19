<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_How_It_Work_Widget extends Widget_Base
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
		return 'itechie-how-it-work-widget';
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
		return esc_html__('How It Work', 'itechie-core');
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

		$items = new \Elementor\Repeater();

		$items->add_control(
			'number',
			[
				'label' => esc_html__('Number', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '01',
			]
		);

		$items->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
				'default' => esc_html__('Select a project', 'itechie-core')
			]
		);

		$items->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Text', 'itechie-core'),
				'default' => esc_html__('Vestibulum ante ipsumusn eratultrices posu world', 'itechie-core')
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__('Items', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $items->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_three']
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$layout_two_items = new \Elementor\Repeater();

		$layout_two_items->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$layout_two_items->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
				'default' => esc_html__('Select a project', 'itechie-core')
			]
		);

		$layout_two_items->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Text', 'itechie-core'),
				'default' => esc_html__('Vestibulum ante ipsumusn eratultrices posu world', 'itechie-core')
			]
		);

		$this->add_control(
			'layout_two_items',
			[
				'label' => esc_html__('Items', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_two_items->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => 'layout_two'
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__('Shape Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
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
		itechie_core_typo_and_color_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two',  'layout_three']);
		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title .content', ['layout_one', 'layout_two', 'layout_three']);

		itechie_core_typo_and_color_options($this, 'Item Title', '{{WRAPPER}} .single-work-inner .details-wrap h4', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Item Text', '{{WRAPPER}} .single-work-inner .details-wrap p', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Item Number', '{{WRAPPER}} .single-work-inner .count-inner h2', ['layout_one', 'layout_two', 'layout_three']);

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
		include itechie_get_template('how-it-work-one.php');
		include itechie_get_template('how-it-work-two.php');
		include itechie_get_template('how-it-work-three.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_How_It_Work_Widget());
