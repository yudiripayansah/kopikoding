<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Skill_Widget extends Widget_Base
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
		return 'itechie-Skill-widget';
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
		return esc_html__('Skill', 'itechie-core');
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
				'placeholder' => esc_html__('Summary', 'itechie-core'),
			]
		);

		$skill = new \Elementor\Repeater();


		$skill->add_control(
			'name',
			[
				'label' => esc_html__('Skill Name', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Skill Name', 'itechie-core'),
				'default' => esc_html__('Web development', 'itechie-core')
			]
		);

		$skill->add_control(
			'percentage',
			[
				'label' => esc_html__('Percentage', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Percentage', 'itechie-core'),
				'default' => 75
			]
		);

		$this->add_control(
			'skill',
			[
				'label' => esc_html__('Skill', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $skill->get_controls(),
				'title_field' => '{{{ name }}}',
			]
		);


		$this->end_controls_section();

		//images
		$this->start_controls_section(
			'layout_one_images',
			[
				'label' => __('Image', 'itechie-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'bg_shape',
			[
				'label' => __('Background Shape', 'itechie-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
				'condition' => [
					'layout_type' => 'layout_one'
				]
			]
		);


		$this->add_control(
			'img_one',
			[
				'label' => __('Image One', 'itechie-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'img_two',
			[
				'label' => __('Image Two', 'itechie-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two']
				]
			]
		);


		$this->add_control(
			'img_three',
			[
				'label' => __('Image Three', 'itechie-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two']
				]
			]
		);

		$this->add_control(
			'layout_three_shape_one',
			[
				'label' => __('Shape One', 'itechie-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
				'condition' => [
					'layout_type' => 'layout_three'
				]
			]
		);

		$this->add_control(
			'layout_three_shape_two',
			[
				'label' => __('Shape Two', 'itechie-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
				'condition' => [
					'layout_type' => 'layout_three'
				]
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

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .section-title .title', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title .content', ['layout_one', 'layout_two', 'layout_three']);

		itechie_core_typo_and_color_options($this, 'Skill Name', '{{WRAPPER}} .single-progressbar h6', ['layout_one', 'layout_two', 'layout_three']);

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
		include itechie_get_template('skill-one.php');
		include itechie_get_template('skill-two.php');
		include itechie_get_template('skill-three.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Skill_Widget());
