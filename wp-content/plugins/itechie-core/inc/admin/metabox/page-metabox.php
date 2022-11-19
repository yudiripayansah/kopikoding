<?php
/*
 * Theme Metabox Options
 * @package itechie
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
	exit(); // exit if access directly
}

if (class_exists('CSF')) {


	$itechie_prefix = 'itechie';


	/*-------------------------------------
	   Page Options
   -------------------------------------*/
	$itechie_group_meta = 'itechie_page_meta';

	CSF::createMetabox($itechie_group_meta, array(
		'title'     => esc_html__('Page Options', 'itechie'),
		'post_type' => 'page',
	));


	//
	// Create a section
	CSF::createSection($itechie_group_meta, array(
		'title'  => esc_html__('Header Option', 'itechie'),
		'fields' => array(
			array(
				'id'         => 'enable_header_builder',
				'title'      => esc_html__('Enable Header Builder', 'itechie'),
				'type'       => 'switcher',
				'desc'       => esc_html__('You can set Yes / No to use header builder', 'itechie'),
				'default'    => false,
			),
			array(
				'id'          => 'header-builder-id',
				'type'        => 'select',
				'title'       => esc_html__('Select Header', 'itechie'),
				'placeholder' => esc_html__('Select a Header', 'itechie'),
				'options'     => itechie_get_header_builder_library(),
				'dependency'  => array('enable_header_builder', '==', true),
				'desc'        => esc_html__("You need to create first header from header builder", 'itechie')
			),
		)
	));

	//
	// breadcrumb
	CSF::createSection($itechie_group_meta, array(
		'title'  => esc_html__('Breadcrumb', 'itechie'),
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Breadcrumb', 'itechie'),
			),
			array(
				'id'      => $itechie_prefix . '_breadcrumb',
				'title'   => esc_html__('Breadcrumb', 'itechie'),
				'type'    => 'select',
				'options' => array(
					'show' => esc_html__('Show', 'itechie'),
					'hide' => esc_html__('Hide', 'itechie'),
				),
				'default' => 'show'
			),
		)

	));

	// Create a section
	CSF::createSection($itechie_group_meta, array(
		'title'  => esc_html__('Footer Option', 'itechie'),
		'fields' => array(
			array(
				'id'         => 'enable_footer_builder',
				'title'      => esc_html__('Enable Footer Builder', 'itechie'),
				'type'       => 'switcher',
				'desc'       => esc_html__('You can set Yes / No to use footer builder', 'itechie'),
				'default'    => false,
			),
			array(
				'id'          => 'footer-builder-id',
				'type'        => 'select',
				'title'       => esc_html__('Select Footer', 'itechie'),
				'placeholder' => esc_html__('Select a Footer', 'itechie'),
				'options'     => itechie_get_footer_builder_library(),
				'desc'        => esc_html__("You need to create first footer from footer builder", 'itechie'),
				'dependency'  => array('enable_footer_builder', '==', true)
			),
		)
	));

	$itechie_footer_meta = 'itechie_footer_meta';

	/*-------------------------------------
	   Footer Options
   -------------------------------------*/
	CSF::createMetabox($itechie_footer_meta, array(
		'title'     => esc_html__('Footer Options', 'itechie'),
		'post_type' => array('project', 'service', 'team')
	));


	// Create a section
	CSF::createSection($itechie_footer_meta, array(
		'title'  => esc_html__('Footer Option', 'itechie'),
		'fields' => array(
			array(
				'id'         => 'enable_footer_builder',
				'title'      => esc_html__('Enable Footer Builder', 'itechie'),
				'type'       => 'switcher',
				'desc'       => esc_html__('You can set Yes / No to use footer builder', 'itechie'),
				'default'    => false,
			),
			array(
				'id'          => 'footer-builder-id',
				'type'        => 'select',
				'title'       => esc_html__('Select Footer', 'itechie'),
				'placeholder' => esc_html__('Select a Footer', 'itechie'),
				'options'     => itechie_get_footer_builder_library(),
				'desc'        => esc_html__("You need to create first footer from footer builder", 'itechie'),
				'dependency'  => array('enable_footer_builder', '==', true)
			),
		)
	));
}//endif