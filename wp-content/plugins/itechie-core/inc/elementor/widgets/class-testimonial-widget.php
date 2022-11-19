<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Testimonial_Widget extends Widget_Base
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
		return 'itechie-testimonial-widget';
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
		return esc_html__('Testimonial', 'itechie-core');
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
					'layout_five' => __('Layout Five', 'itechie-core'),
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
				'condition' => [
					'layout_type' => ['layout_three', 'layout_four']
				]
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Sub Title', 'itechie-core'),
				'condition' => [
					'layout_type' => ['layout_three', 'layout_four']
				]
			]
		);

		$this->add_control(
			'summary',
			[
				'label' => __('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Summary', 'itechie-core'),
				'condition' => [
					'layout_type' => ['layout_three', 'layout_four']
				]
			]
		);

		$testimonial_list = new \Elementor\Repeater();

		$testimonial_list->add_control(
			'name',
			[
				'label' => esc_html__('Name', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Name', 'itechie-core'),
			]
		);

		$testimonial_list->add_control(
			'designation',
			[
				'label' => esc_html__('Designation', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Designation', 'itechie-core'),
			]
		);

		$testimonial_list->add_control(
			'testimonial',
			[
				'label' => esc_html__('Testimonial', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Testimonial Content', 'itechie-core'),
			]
		);

		$testimonial_list->add_control(
			'large_image',
			[
				'label' => esc_html__('Large Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$testimonial_list->add_control(
			'small_image',
			[
				'label' => esc_html__('Small Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$testimonial_list->add_control(
			'icon',
			[
				'label' => esc_html__('Testimonial icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$this->add_control(
			'testimonial_list',
			[
				'label' => esc_html__('Testimonial Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $testimonial_list->get_controls(),
				'condition' => [
					'layout_type' => 'layout_one'
				],
				'prevent_empty' => false,
				'title_field' => '{{{ name }}}',
			]
		);

		$testimonial_list_two = new \Elementor\Repeater();

		$testimonial_list_two->add_control(
			'name',
			[
				'label' => esc_html__('Name', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Name', 'itechie-core'),
			]
		);

		$testimonial_list_two->add_control(
			'designation',
			[
				'label' => esc_html__('Designation', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Designation', 'itechie-core'),
			]
		);

		$testimonial_list_two->add_control(
			'testimonial',
			[
				'label' => esc_html__('Testimonial', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Testimonial Content', 'itechie-core'),
			]
		);

		$testimonial_list_two->add_control(
			'image',
			[
				'label' => esc_html__('Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$testimonial_list_two->add_control(
			'shape_one',
			[
				'label' => esc_html__('Shape One', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$testimonial_list_two->add_control(
			'shape_two',
			[
				'label' => esc_html__('Shape Two', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$this->add_control(
			'testimonial_list_two',
			[
				'label' => esc_html__('Testimonial Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $testimonial_list_two->get_controls(),
				'condition' => [
					'layout_type' => 'layout_two'
				],
				'prevent_empty' => false,
				'title_field' => '{{{ name }}}',
			]
		);

		$this->add_control(
			'layout_two_bg_image',
			[
				'label' => esc_html__('Background Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'layout_type' => 'layout_two'
				],
				'default' => [],
			]
		);

		$testimonial_three = new \Elementor\Repeater();

		$testimonial_three->add_control(
			'name',
			[
				'label' => esc_html__('Name', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Name', 'itechie-core'),
			]
		);

		$testimonial_three->add_control(
			'designation',
			[
				'label' => esc_html__('Designation', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Designation', 'itechie-core'),
			]
		);

		$testimonial_three->add_control(
			'testimonial',
			[
				'label' => esc_html__('Testimonial', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Testimonial Content', 'itechie-core'),
			]
		);

		$testimonial_three->add_control(
			'image',
			[
				'label' => esc_html__('Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);


		$testimonial_three->add_control(
			'icon',
			[
				'label' => esc_html__('Testimonial icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$this->add_control(
			'testimonial_three',
			[
				'label' => esc_html__('Testimonial Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $testimonial_three->get_controls(),
				'condition' => [
					'layout_type' => 'layout_three'
				],
				'prevent_empty' => false,
				'title_field' => '{{{ name }}}',
			]
		);

		$testimonial_four = new \Elementor\Repeater();

		$testimonial_four->add_control(
			'name',
			[
				'label' => esc_html__('Name', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Name', 'itechie-core'),
			]
		);

		$testimonial_four->add_control(
			'designation',
			[
				'label' => esc_html__('Designation', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Designation', 'itechie-core'),
			]
		);

		$testimonial_four->add_control(
			'testimonial',
			[
				'label' => esc_html__('Testimonial', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Testimonial Content', 'itechie-core'),
			]
		);

		$testimonial_four->add_control(
			'image',
			[
				'label' => esc_html__('Testimonial Icon Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$this->add_control(
			'testimonial_four',
			[
				'label' => esc_html__('Testimonial Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $testimonial_four->get_controls(),
				'condition' => [
					'layout_type' => 'layout_four'
				],
				'prevent_empty' => false,
				'title_field' => '{{{ name }}}',
			]
		);


		$testimonial_five = new \Elementor\Repeater();

		$testimonial_five->add_control(
			'name',
			[
				'label' => esc_html__('Name', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Name', 'itechie-core'),
			]
		);

		$testimonial_five->add_control(
			'designation',
			[
				'label' => esc_html__('Designation', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Designation', 'itechie-core'),
			]
		);

		$testimonial_five->add_control(
			'testimonial',
			[
				'label' => esc_html__('Testimonial', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Testimonial Content', 'itechie-core'),
			]
		);

		$testimonial_five->add_control(
			'large_image',
			[
				'label' => esc_html__('Large Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$testimonial_five->add_control(
			'small_image',
			[
				'label' => esc_html__('Small Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);


		$testimonial_five->add_control(
			'icon',
			[
				'label' => esc_html__('Testimonial icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$this->add_control(
			'testimonial_five',
			[
				'label' => esc_html__('Testimonial Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $testimonial_five->get_controls(),
				'condition' => [
					'layout_type' =>  'layout_five'
				],
				'prevent_empty' => false,
				'title_field' => '{{{ name }}}',
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

		itechie_core_typo_and_color_options($this, 'Section Title', '{{WRAPPER}} .section-title.style-white .title,{{WRAPPER}} .section-title .title', ['layout_three', 'layout_four']);
		itechie_core_typo_and_color_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title.style-white .sub-title,{{WRAPPER}}  .section-title .sub-title', ['layout_three', 'layout_four']);
		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title.style-white .content, {{WRAPPER}} .section-title .content', ['layout_three', 'layout_four']);

		itechie_core_typo_and_color_options($this, 'Name', '{{WRAPPER}} .single-testimonial-inner .details span', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five']);
		itechie_core_typo_and_color_options($this, 'Designation', '{{WRAPPER}} .single-testimonial-inner .details h2,
		.single-testimonial-inner.style-3 .details span,{{WRAPPER}} .single-testimonial-inner.style-4 .details span', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five']);
		itechie_core_typo_and_color_options($this, 'Testimonial', '{{WRAPPER}} .single-testimonial-inner .details p', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five']);

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
		include itechie_get_template('testimonial-one.php');
		include itechie_get_template('testimonial-two.php');
		include itechie_get_template('testimonial-three.php');
		include itechie_get_template('testimonial-four.php');
		include itechie_get_template('testimonial-five.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Testimonial_Widget());
