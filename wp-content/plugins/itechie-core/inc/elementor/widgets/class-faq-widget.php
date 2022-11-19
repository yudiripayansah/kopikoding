<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Faq_Widget extends Widget_Base
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
		return 'itechie-faq-widget';
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
		return esc_html__('FAQ', 'itechie-core');
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
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two']
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
					'layout_type' => ['layout_one', 'layout_two']
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
					'layout_type' => ['layout_one', 'layout_two']
				]
			]
		);


		$faq_list = new \Elementor\Repeater();

		$faq_list->add_control(
			'question',
			[
				'label' => esc_html__('Faq Question', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Faq Question', 'itechie-core'),
				'default' => esc_html__(' Why we are?', 'itechie-core'),
				'label_block' => true
			]
		);

		$faq_list->add_control(
			'answer',
			[
				'label' => esc_html__('Faq Answer', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Faq Answer', 'itechie-core'),
				'default' => esc_html__('Maecenas tempus, tellus eget condime honcus sem quam semper libero sit amet adipiscingem neque sed ipsum. amquam nunc
				', 'itechie-core')
			]
		);

		$this->add_control(
			'faq_list',
			[
				'label' => esc_html__('Faq', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $faq_list->get_controls(),
				'title_field' => '{{{ question }}}',
			]
		);

		$this->end_controls_section();

		//images
		$this->start_controls_section(
			'section_image_one',
			[
				'label' => esc_html__('Images', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' => 'layout_one'
				]
			]
		);


		$this->add_control(
			'image',
			[
				'label' => esc_html__('Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image_shape',
			[
				'label' => esc_html__('Image Shape', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'image_shape_two',
			[
				'label' => esc_html__('Image Shape Two', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);


		$this->end_controls_section();

		//layout_two Contact form
		$this->start_controls_section(
			'layout_two_contact_form',
			[
				'label' => esc_html__('Contact Form', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' => 'layout_two'
				]
			]
		);

		$this->add_control(
			'layout_two_title',
			[
				'label' => esc_html__('Contact Form Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'contact_shortcode',
			[
				'label'       => esc_html__('Select your contact form 7', 'itechie-core'),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options'     => itechie_core_post_query('wpcf7_contact_form'),
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

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .section-title .title', ['layout_one', 'layout_two']);
		itechie_core_typo_and_color_options($this, 'Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two']);
		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title .content', ['layout_one', 'layout_two']);

		itechie_core_typo_and_color_options($this, 'Question', '{{WRAPPER}} .single-accordion-inner .accordion-header button', ['layout_one', 'layout_two', 'layout_three']);
		itechie_core_typo_and_color_options($this, 'Answer', '{{WRAPPER}} .accordion-body', ['layout_one', 'layout_two', 'layout_three']);

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
		include itechie_get_template('faq-one.php');
		include itechie_get_template('faq-two.php');
		include itechie_get_template('faq-three.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Faq_Widget());
