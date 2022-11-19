<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_About_Widget extends Widget_Base
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
		return 'itechie-about-widget';
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
		return esc_html__('About', 'itechie-core');
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
					'layout_four' => esc_html__('Layout Four', 'itechie-core'),
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
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
			]
		);


		$this->add_control(
			'highlight_text',
			[
				'label' => esc_html__('Highlight Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Highlight Text', 'itechie-core'),
				'condition' => [
					'layout_type' => ['layout_one', 'layout_four']
				]
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
					'layout_type' => ['layout_one']
				]
			]
		);


		$feature_box = new \Elementor\Repeater();

		$feature_box->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'placeholder' => esc_html__('Add Icon', 'itechie-core'),
			]
		);

		$feature_box->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
			]
		);

		$feature_box->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Content', 'itechie-core'),
			]
		);


		$this->add_control(
			'feature_box',
			[
				'label' => esc_html__('Feature Box', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $feature_box->get_controls(),
				'prevent_empty' => false,
				'title_field' => '{{{ title }}}',
				'condition'  => [
					'layout_type' =>  'layout_two'
				]
			]
		);

		$checklist = new \Elementor\Repeater();

		$checklist->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Check List Text', 'itechie-core'),
			]
		);

		$this->add_control(
			'checklist',
			[
				'label' => esc_html__('Check List', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $checklist->get_controls(),
				'prevent_empty' => false,
				'title_field' => '{{{ text }}}',
				'condition'  => [
					'layout_type' =>  'layout_four'
				]
			]
		);

		$this->add_control(
			'button_label',
			[
				'label' => esc_html__('Button Text', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Discover More', 'itechie-core'),
				'label_block' => true,
				'condition'  => [
					'layout_type' => 'layout_four'
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
					'layout_type' => 'layout_four'
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

		$tab = new \Elementor\Repeater();

		$tab->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
				'default' => esc_html__('Our Mission', 'itechie-core')
			]
		);

		$tab->add_control(
			'summary',
			[
				'label' => esc_html__('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Summary', 'itechie-core'),
			]
		);

		$tab->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Content', 'itechie-core'),
			]
		);


		$this->add_control(
			'tab',
			[
				'label' => esc_html__('Tab Items', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $tab->get_controls(),
				'prevent_empty' => false,
				'title_field' => '{{{ title }}}',
				'condition'  => [
					'layout_type' =>  'layout_three'
				]
			]
		);

		$this->end_controls_section();


		//images
		$this->start_controls_section(
			'section_image_one',
			[
				'label' => esc_html__('Images', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two', 'layout_four']
				]
			]
		);

		$this->add_control(
			'image_shape_two',
			[
				'label' => esc_html__('Image Shape Two', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two', 'layout_four']
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

		itechie_core_typo_and_color_options($this, 'Title', '{{WRAPPER}} .section-title .title', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		itechie_core_typo_and_color_options($this, 'Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);

		itechie_core_typo_and_color_options($this, 'Highlighted Text', '{{WRAPPER}} .content-strong', ['layout_four']);

		itechie_core_typo_and_color_options($this, 'Summary', '{{WRAPPER}} .section-title .content', ['layout_one', 'layout_two', 'layout_four']);
		itechie_core_typo_and_color_options($this, 'Summary Text', '{{WRAPPER}} .section-title .content-strong', ['layout_three']);

		itechie_core_typo_and_color_options($this, 'Fun Fact Title', '{{WRAPPER}} .single-exp-inner h5', ['layout_one']);
		itechie_core_typo_and_color_options($this, 'Fun Fact Count Number', '{{WRAPPER}} .single-exp-inner h2 span', ['layout_one']);
		itechie_core_typo_and_color_options($this, 'Fun Fact Sign', '{{WRAPPER}} .single-exp-inner h2 sub', ['layout_one']);

		itechie_core_typo_and_color_options($this, 'Feature Title', '{{WRAPPER}} .media-body h4', ['layout_two']);
		itechie_core_typo_and_color_options($this, 'Feature Content', '{{WRAPPER}} .single-choose-inner .media-body p', ['layout_two']);

		itechie_core_typo_and_color_options($this, 'Tab Summary', '{{WRAPPER}} .section-title .content', ['layout_three']);
		itechie_core_typo_and_color_options($this, 'Tab Content', '{{WRAPPER}} .single-list-inner', ['layout_three']);

		itechie_core_typo_and_color_options($this, 'Tab Active Button', '{{WRAPPER}} .tab-button-style li .nav-link.active', ['layout_three']);
		itechie_core_typo_and_color_options($this, 'Tab Active Button Background', '{{WRAPPER}} .tab-button-style li .nav-link.active', ['layout_three'], 'background-color', false);


		itechie_core_typo_and_color_options($this, 'Tab InActive Button', '{{WRAPPER}} .tab-button-style li .nav-link', ['layout_three']);
		itechie_core_typo_and_color_options($this, 'Tab InActive Button Background', '{{WRAPPER}} .tab-button-style li .nav-link', ['layout_three'], 'background-color', false);

		itechie_core_typo_and_color_options($this, 'Button ', '{{WRAPPER}} .btn-base', ['layout_four']);
		itechie_core_typo_and_color_options($this, 'Button Background', '{{WRAPPER}} .btn-base', ['layout_four'], 'background-color', false);

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
		include itechie_get_template('about-one.php');
		include itechie_get_template('about-two.php');
		include itechie_get_template('about-three.php');
		include itechie_get_template('about-four.php');
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_About_Widget());
