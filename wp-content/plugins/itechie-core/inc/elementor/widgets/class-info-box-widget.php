<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Info_Box_Widget extends Widget_Base
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
		return 'itechie-info-box-widget';
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
		return esc_html__('Info Box', 'itechie-core');
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
				'condition'  => [
					'layout_type' => 'layout_two'
				]
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
				'condition'  => [
					'layout_type' => 'layout_two'
				]
			]
		);


		$this->add_control(
			'summary',
			[
				'label' => esc_html__('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Summary', 'itechie-core'),
				'condition'  => [
					'layout_type' => 'layout_two'
				]
			]
		);


		$infobox = new \Elementor\Repeater();

		$infobox->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
				'default' => esc_html__('Flexible Solutions', 'itechie-core')
			]
		);


		$infobox->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Content', 'itechie-core'),
			]
		);

		$infobox->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'infobox',
			[
				'label' => esc_html__('Info Boxes', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $infobox->get_controls(),
				'condition' => [
					'layout_type' => 'layout_one'
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$layout_two_infobox = new \Elementor\Repeater();

		$layout_two_infobox->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
				'default' => esc_html__('Office address	', 'itechie-core')
			]
		);


		$layout_two_infobox->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Content', 'itechie-core'),
			]
		);

		$layout_two_infobox->add_control(
			'icon',
			[
				'label' => __('Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'layout_two_infobox',
			[
				'label' => esc_html__('Info Boxes', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_two_infobox->get_controls(),
				'condition' => [
					'layout_type' => 'layout_two'
				],
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

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .section-title .title', ['layout_two']);
		itechie_core_typo_and_color_options($this, 'Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_two']);
		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title .content', ['layout_two']);

		itechie_core_typo_and_color_options($this, 'Info Title', '{{WRAPPER}} .single-intro-inner .thumb h4,{{WRAPPER}} .single-contact-inner .details-inner h3', ['layout_one', 'layout_two']);
		itechie_core_typo_and_color_options($this, 'Info Content', '{{WRAPPER}} .single-intro-inner .details p,{{WRAPPER}} .single-contact-inner .details-inner p', ['layout_one', 'layout_two']);

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
		include itechie_get_template('info-box-one.php');
		include itechie_get_template('info-box-two.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Info_Box_Widget());
