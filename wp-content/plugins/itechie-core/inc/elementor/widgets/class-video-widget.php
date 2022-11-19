<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Video_Widget extends Widget_Base
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
		return 'itechie-video-widget';
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
		return esc_html__('Video', 'itechie-core');
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

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'video_url',
			[
				'label' => esc_html__('Video Url', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Video Url', 'itechie-core'),
				'default' => '#',
				'label_block' => true
			]
		);


		$funfacts = new \Elementor\Repeater();

		$funfacts->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
				'default'	  => esc_html__('Experiences', 'itechie-core')
			]
		);

		$funfacts->add_control(
			'number',
			[
				'label' => esc_html__('Counter Number', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Counter Number', 'itechie-core'),
				'Default'	=> 20,
			]
		);

		$funfacts->add_control(
			'sign',
			[
				'label' => esc_html__('Sign', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Counter Sign', 'itechie-core'),
				'Default'	=> esc_html__('Y', 'itechie-core')
			]
		);

		$this->add_control(
			'funfacts',
			[
				'label' => esc_html__('Fun Fact', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $funfacts->get_controls(),
				'prevent_empty' => false,
				'title_field' => '{{{ title }}}',
				'condition'  => [
					'layout_type' => ['layout_two']
				]
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Background Image', 'itechie-core'),
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

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .section-title.style-white .title', ['layout_one', 'layout_two']);

		itechie_core_typo_and_color_options($this, 'Funfact Title', '{{WRAPPER}} .single-exp-inner.style-white h5 ', ['layout_two']);
		itechie_core_typo_and_color_options($this, 'Funfact Counter Number', '{{WRAPPER}} h2 span.counter', ['layout_two']);
		itechie_core_typo_and_color_options($this, 'Funfact Sign', '{{WRAPPER}} .single-exp-inner.style-white h2 sub', ['layout_two']);

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
		include itechie_get_template('video-one.php');
		include itechie_get_template('video-two.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Video_Widget());
