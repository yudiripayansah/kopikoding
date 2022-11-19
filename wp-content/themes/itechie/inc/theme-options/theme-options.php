<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {
	$itechie_allowed_html = 'itechie_core_allowed_tags';

	//
	// Set a unique slug-like ID
	$itechie_prefix = 'itechie';

	//
	// Create options
	CSF::createOptions($itechie_prefix . '_theme_options', array(
		'menu_title'      => 'Theme Option',
		'menu_slug'       => 'itechie-theme-option',
		'menu_type'       => 'submenu',
		'enqueue_webfont' => true,
		'show_footer'     => false,
		'show_in_customizer'      => false,
		'footer_text'             => '',
		'footer_after'            => '',
		'footer_credit'           => '',
		'framework_title' => ITECHIE_NAME . ' <small>V- ' . esc_html(ITECHIE_VERSION) . esc_html__(' By ', 'itechie') . '<a href="' . esc_url(ITECHIE_AUTHOR_URI) . '" target="_blank">' . ITECHIE_AUTHOR . '</a> </small>',
	));

	//
	// Create a section
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => 'General',
		'icon'   => 'fa fa-wrench',
		'fields' => array(

			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Preloader Options', 'itechie') . '</h3>'
			),
			array(
				'id'      => 'preloader_enable',
				'title'   => esc_html__('Preloader', 'itechie'),
				'type'    => 'switcher',
				'desc'    => esc_html__('you can set Yes / No to enable/disable preloader', 'itechie'),
				'default' => true,
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Back Top Options', 'itechie') . '</h3>'
			),
			array(
				'id'      => 'back_top_enable',
				'title'   => esc_html__('Back Top', 'itechie'),
				'type'    => 'switcher',
				'desc'    => esc_html__('you can set Yes / No to show/hide back to top', 'itechie'),
				'default' => true,
			),

		)
	));

	/*-------------------------------------------------------
	   ** Entire Site Header  Options
	 --------------------------------------------------------*/
	CSF::createSection(
		$itechie_prefix . '_theme_options',
		array(
			'title' => esc_html__('Header Option', 'itechie'),
			'id'    => 'entire_site_header_options',
			'icon'  => 'fa fa-header'
		)
	);
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => esc_html__('Theme Logos', 'itechie'),
		'id'     => 'logo_options',
		'icon'   => 'fa fa-ellipsis-h',
		'parent' => 'entire_site_header_options',
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
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => esc_html__('Banner', 'itechie'),
		'id'     => 'breadcrumb_options',
		'icon'   => 'fa fa-ellipsis-h',
		'parent' => 'entire_site_header_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Banner Options', 'itechie') . '</h3>'
			),
			array(
				'id'      => 'breadcrumb_enable',
				'title'   => esc_html__('Banner', 'itechie'),
				'type'    => 'switcher',
				'desc'    => esc_html__('you can set Yes / No to show/hide banner', 'itechie'),
				'default' => true,
			),
			array(
				'id'    => 'banner_shape',
				'type'  => 'upload',
				'title' => esc_html__('Upload Breadcrumb Banner Shape', 'itechie'),
			),
			array(
				'id'          => 'banner_bg_color',
				'type'        => 'color',
				'title'       => esc_html__('Banner Background Color', 'itechie'),
				'default'     => '#141d38',
				'output_mode' => 'background-color',
				'output'      => array('.breadcrumb-area.bg-black'),
			),

		)
	));

	/*-------------------------------------------------------
	   ** Pages and Template
	 --------------------------------------------------------*/
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'id'    => 'pages_and_template',
		'title' => esc_html__('Pages & Template', 'itechie'),
		'icon'  => 'fa fa-files-o'
	));

	// blog option
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => esc_html__('Blog Page', 'itechie'),
		'id'     => 'blog_page',
		'icon'   => 'fa fa-ellipsis-h',
		'parent' => 'pages_and_template',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Blog Page Option', 'itechie') . '</h3>'
			),
			array(
				'id'      => $itechie_prefix . '_blog_layout',
				'type'    => 'image_select',
				'title'   => esc_html__('Select Page Layout', 'itechie'),
				'options' => array(
					'full-width'    => ITECHIE_THEME_OPTIONS_IMG . '/page/D.png',
					'left-sidebar'  => ITECHIE_THEME_OPTIONS_IMG . '/page/L.png',
					'right-sidebar' => ITECHIE_THEME_OPTIONS_IMG . '/page/R.png',
				),
				'default' => 'right-sidebar'
			),
			array(
				'type'    => 'switcher',
				'id'      => 'blog_spacing_enable',
				'title'   => esc_html__('Blog Page Spacing', 'itechie'),
				'desc'    => esc_html__('you can set yes to enable blog page spacing', 'itechie'),
				'default' => false
			),
			array(
				'id'         => 'blog_top_padding',
				'title'      => esc_html__('Blog Page Spacing Top', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set Padding Top for Blog Page container.', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 20,
				'dependency' => array('blog_spacing_enable', '==', 'true')
			),
			array(
				'id'         => 'blog_bottom_padding',
				'title'      => esc_html__('Blog Page Spacing Bottom', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set Padding Bottom for Blog page container.', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 20,
				'dependency' => array('blog_spacing_enable', '==', 'true')
			),
		)
	));

	// blog single option
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => esc_html__('Blog Single Page', 'itechie'),
		'id'     => 'single_page',
		'icon'   => 'fa fa-ellipsis-h',
		'parent' => 'pages_and_template',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Blog Single Page Option', 'itechie') . '</h3>'
			),
			array(
				'id'      => $itechie_prefix . '_single_page_layout',
				'type'    => 'image_select',
				'title'   => esc_html__('Select Page Layout', 'itechie'),
				'options' => array(
					'full-width'    => ITECHIE_THEME_OPTIONS_IMG . '/page/D.png',
					'left-sidebar'  => ITECHIE_THEME_OPTIONS_IMG . '/page/L.png',
					'right-sidebar' => ITECHIE_THEME_OPTIONS_IMG . '/page/R.png',
				),
				'default' => 'right-sidebar'
			),
			array(
				'type'    => 'switcher',
				'id'      => 'social_share',
				'title'   => esc_html__('Display Social Share', 'itechie'),
				'default' => false
			),
			array(
				'type'    => 'switcher',
				'id'      => 'blog_details_spacing_enable',
				'title'   => esc_html__('Blog Details Page Spacing', 'itechie'),
				'desc'    => esc_html__('you can set yes to enable blog details page spacing', 'itechie'),
				'default' => false
			),
			array(
				'id'         => 'single_top_padding',
				'title'      => esc_html__('Blog Single Page Spacing Top', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set padding Top for Blog Single Page container.	', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 20,
				'dependency' => array('blog_details_spacing_enable', '==', 'true')
			),
			array(
				'id'         => 'single_bottom_padding',
				'title'      => esc_html__('Blog Single Page Spacing Bottom', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set padding Bottom for Blog Single page container.', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 20,
				'dependency' => array('blog_details_spacing_enable', '==', 'true')
			),
		)
	));

	// archive page option
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => esc_html__('Archive  Page', 'itechie'),
		'id'     => 'archive_page',
		'icon'   => 'fa fa-ellipsis-h',
		'parent' => 'pages_and_template',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Archive Page Option', 'itechie') . '</h3>'
			),
			array(
				'id'      => $itechie_prefix . '_archive_layout',
				'type'    => 'image_select',
				'title'   => esc_html__('Select Page Layout', 'itechie'),
				'options' => array(
					'full-width'    => ITECHIE_THEME_OPTIONS_IMG . '/page/D.png',
					'left-sidebar'  => ITECHIE_THEME_OPTIONS_IMG . '/page/L.png',
					'right-sidebar' => ITECHIE_THEME_OPTIONS_IMG . '/page/R.png',
				),
				'default' => 'right-sidebar'
			),
			array(
				'type'    => 'switcher',
				'id'      => 'archive_page_spacing_enable',
				'title'   => esc_html__('Archive Page Spacing', 'itechie'),
				'desc'    => esc_html__('you can set yes to enable archive page spacing', 'itechie'),
				'default' => false
			),
			array(
				'id'         => 'archive_top_padding',
				'title'      => esc_html__('Archive  Page Spacing Top', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set padding top for archive page container.', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 220,
				'dependency' => array('archive_page_spacing_enable', '==', 'true')
			),
			array(
				'id'         => 'archive_bottom_padding',
				'title'      => esc_html__('Archive Page Spacing Bottom', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set padding bottom for archive page container.', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 220,
				'dependency' => array('archive_page_spacing_enable', '==', 'true')
			),
		)
	));

	// search page option
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => esc_html__('Search  Page', 'itechie'),
		'id'     => 'search_page',
		'icon'   => 'fa fa-ellipsis-h',
		'parent' => 'pages_and_template',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Search Page Option', 'itechie') . '</h3>'
			),
			array(
				'id'      => $itechie_prefix . '_search_layout',
				'type'    => 'image_select',
				'title'   => esc_html__('Select Page Layout', 'itechie'),
				'options' => array(
					'full-width'    => ITECHIE_THEME_OPTIONS_IMG . '/page/D.png',
					'left-sidebar'  => ITECHIE_THEME_OPTIONS_IMG . '/page/L.png',
					'right-sidebar' => ITECHIE_THEME_OPTIONS_IMG . '/page/R.png',
				),
				'default' => 'right-sidebar'
			),
			array(
				'type'    => 'switcher',
				'id'      => 'search_page_spacing_enable',
				'title'   => esc_html__('Search Page Spacing', 'itechie'),
				'desc'    => esc_html__('you can set yes to enable search page spacing', 'itechie'),
				'default' => false
			),
			array(
				'id'         => 'search_top_padding',
				'title'      => esc_html__('Search  Page Spacing Top', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set padding top for search page container.', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 20,
				'dependency' => array('search_page_spacing_enable', '==', 'true')
			),
			array(
				'id'         => 'search_bottom_padding',
				'title'      => esc_html__('Search Page Spacing Bottom', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set Padding Bottom for search page container.', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 20,
				'dependency' => array('search_page_spacing_enable', '==', 'true')
			),
		)
	));


	/*  404 page options */
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'id'     => '404_page',
		'title'  => esc_html__('404 Page', 'itechie'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-exclamation-triangle',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('404 Page Options', 'itechie') . '</h3>',
			),
			array(
				'id'         => '404_title',
				'title'      => esc_html__('Title', 'itechie'),
				'type'       => 'text',
				'attributes' => array('placeholder' => esc_html__('404', 'itechie'))
			),
			array(
				'id'         => '404_subtitle',
				'title'      => esc_html__('Sub Title', 'itechie'),
				'type'       => 'text',
				'attributes' => array('placeholder' => esc_html__('Sorry. we couldn\'t find that page', 'itechie'))
			),
			array(
				'id'         => '404_button_text',
				'title'      => esc_html__('Button Text', 'itechie'),
				'type'       => 'text',
				'attributes' => array('placeholder' => esc_html__('Go Back', 'itechie'))
			)
		)
	));

	/*-------------------------------------------------------
	   ** Typography  Options
  --------------------------------------------------------*/
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'id'     => 'typography',
		'title'  => esc_html__('Typography', 'itechie'),
		'icon'   => 'fa fa-text-width',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Body Font Options', 'itechie') . '</h3>',
			),
			array(
				'type'    => 'switcher',
				'id'      => 'body_font_enable',
				'title'   => esc_html__('Body Font', 'itechie'),
				'desc'    => esc_html__('you can set yes to select different body font', 'itechie'),
				'default' => false
			),
			array(
				'type'           => 'typography',
				'title'          => esc_html__('Typography', 'itechie'),
				'id'             => 'itechie_body_font',
				'default'        => array(
					'font-family' => 'Rubik',
					'font-size'   => '16',
					'line-height' => '26',
					'unit'        => 'px',
					'type'        => 'google',
				),
				'color'          => false,
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'desc'           => esc_html__('you can set font for all html tags (if not use different heading font)', 'itechie'),
				'dependency'     => array('body_font_enable', '==', 'true')
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Heading Font Options', 'itechie') . '</h3>',
			),
			array(
				'type'    => 'switcher',
				'id'      => 'heading_font_enable',
				'title'   => esc_html__('Heading Font', 'itechie'),
				'desc'    => esc_html__('you can set yes to select different heading font', 'itechie'),
				'default' => false
			),
			array(
				'type'           => 'typography',
				'title'          => esc_html__('Typography', 'itechie'),
				'id'             => 'heading_font',
				'default'        => array(
					'font-family' => 'Rubik',
					'type'        => 'google',
				),
				'color'          => false,
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'font_size'      => false,
				'line_height'    => false,
				'desc'           => esc_html__('you can set font for for heading tag .eg: h1,h2mh3,h4,h5,h6', 'itechie'),
				'dependency'     => array('heading_font_enable', '==', 'true')
			),
		)
	));

	/*-------------------------------------------------------
		 ** Footer  Options
	--------------------------------------------------------*/
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => esc_html__('Footer', 'itechie'),
		'id'     => 'footer_options',
		'icon'   => 'fa fa-copyright',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Options', 'itechie') . '</h3>'
			),
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
			array(
				'id'         => 'copyright_text',
				'title'      => esc_html__('Copyright Area Text', 'itechie'),
				'type'       => 'text',
				'desc'       => esc_html__('enter copyright text', 'itechie'),
				'dependency' => array('enable_footer_builder', '==', false)
			),
			array(
				'id'         => 'copyright_area_spacing',
				'title'      => esc_html__('Copyright Area Spacing', 'itechie'),
				'type'       => 'switcher',
				'desc'       => esc_html__('you can set Yes / No to set copyright area spacing', 'itechie'),
				'default'    => false,
				'dependency' => array('enable_footer_builder', '==', false)
			),
			array(
				'id'         => 'copyright_area_top_spacing',
				'title'      => esc_html__('Copyright Area Top Spacing', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set padding for copyright area top', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'dependency' => array(
					array('enable_footer_builder', '==', false),
					array('copyright_area_spacing', '==', true)
				)
			),
			array(
				'id'         => 'copyright_area_bottom_spacing',
				'title'      => esc_html__('Copyright Area Bottom Spacing', 'itechie'),
				'type'       => 'slider',
				'desc'       => esc_html__('you can set padding for copyright area bottom', 'itechie'),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'dependency' => array(
					array('enable_footer_builder', '==', false),
					array('copyright_area_spacing', '==', true)
				)
			),
		)
	));

	// Backup section
	CSF::createSection($itechie_prefix . '_theme_options', array(
		'title'  => esc_html__('Backup', 'itechie'),
		'id'     => 'backup_options',
		'icon'   => 'fa fa-window-restore',
		'fields' => array(
			array(
				'type' => 'backup',
			),
		)
	));
}
