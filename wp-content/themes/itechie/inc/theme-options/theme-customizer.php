<?php

/*
 * Theme Customize Options
 * @package itechie
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
	exit(); // exit if access directly
}

if (class_exists('CSF')) {
	$itechie_prefix = 'itechie';

	CSF::createCustomizeOptions($itechie_prefix . '_customize_options');

	/*-------------------------------------
		** Theme Main Color
	-------------------------------------*/
	CSF::createSection($itechie_prefix . '_customize_options', array(
		'title'    => esc_html__('Itechie Primary Color', 'itechie'),
		'priority' => 10,
		'fields'   => array(
			array(
				'id'      => 'main_color',
				'type'    => 'color',
				'title'   => esc_html__('Theme Main Color', 'itechie'),
				'default' => '#0060FF',
				'desc'    => esc_html__('This is theme primary color, means it\'ll affect most of elements that have default color of our theme primary color', 'itechie')
			),
		)
	));

	/*-------------------------------------
	  ** Theme Body Options
  -------------------------------------*/
	CSF::createSection($itechie_prefix . '_customize_options', array(
		'title'    => esc_html__('Itechie Main Body', 'itechie'),
		'priority' => 13,
		'fields'   => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Main Body Options', 'itechie') . '</h3>'
			),
			array(
				'id'          => 'header_color',
				'type'        => 'color',
				'title'       => esc_html__('All Header Color', 'itechie'),
				'default'     => '#201654',
				'output_mode' => 'color',
				'output'      => array('h1, h2, h3, h4, h5, h6'),
			),
			array(
				'id'          => 'txt_Color',
				'type'        => 'color',
				'title'       => esc_html__('Body Text Color', 'itechie'),
				'default'     => '#696969',
				'output_mode' => 'color',
				'output'      => array('p', '.single-blog-inner .single-blog-details p'),
			),
		)
	));
}//endif