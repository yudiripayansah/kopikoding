<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Funfact_Widget extends Widget_Base
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
		return 'itechie-Funfact-widget';
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
		return esc_html__('Fun Fact', 'itechie-core');
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

		$funfact_list = new \Elementor\Repeater();

		$funfact_list->add_control(
			'number',
			[
				'label' => esc_html__('Number', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Number', 'itechie-core'),
				'default' => 20
			]
		);

		$funfact_list->add_control(
			'sign',
			[
				'label' => esc_html__('Sign', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Y', 'itechie-core')
			]
		);

		$funfact_list->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Experiences', 'itechie-core')
			]
		);

		$this->add_control(
			'funfact_list',
			[
				'label' => esc_html__('Feature Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $funfact_list->get_controls(),
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

		itechie_core_typo_and_color_options($this, 'Fun Fact Title', '{{WRAPPER}} .single-exp-inner.style-white h5', ['layout_one']);
		itechie_core_typo_and_color_options($this, 'Fun Fact Count', '{{WRAPPER}} .counter', ['layout_one']);
		itechie_core_typo_and_color_options($this, 'Fun Sign', '{{WRAPPER}} .single-exp-inner.style-white h2 sub', ['layout_one']);

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
		include itechie_get_template('fun-fact-one.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Funfact_Widget());
