<?php

/**
 *
 * @package itechie
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */


add_filter('body_class',  'itechie_body_classes');
add_action('wp_head',  'itechie_pingback_header');


/**
 * itechie_body_classes
 * @since 1.0.0
 * */
if (!function_exists('itechie_body_classes')) :
	function itechie_body_classes($classes)
	{
		// Adds a class of hfeed to non-singular pages.
		if (!is_singular()) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if (!is_active_sidebar('sidebar-1')) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
endif;

/**
 * pingback_header
 * @since 1.0.0
 * */
if (!function_exists('itechie_pingback_header')) :
	function itechie_pingback_header()
	{
		if (is_singular() && pings_open()) {
			printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
		}
	}

endif;

/*
* Pages Links
*
* @since 1.0.0
*/
if (!function_exists('itechie_link_pages')) :
	function itechie_link_pages()
	{
		$defaults = array(
			'before'         => '<div class="wp-link-pages"><span>' . esc_html__('Pages:', 'itechie') . '</span>',
			'after'          => '</div>',
			'link_before'    => '',
			'link_after'     => '',
			'next_or_number' => 'number',
			'separator'      => ' ',
			'pagelink'       => '%',
			'echo'           => 1
		);
		wp_link_pages($defaults);
	}

endif;


if (!function_exists('itechie_excerpt')) :
	// Post excerpt
	function itechie_excerpt($get_limit_value = 40, $echo = true)
	{
		$opt = $get_limit_value;
		$excerpt_limit = !empty($opt) ? $opt : 40;
		$excerpt = wp_trim_words(get_the_content(), $excerpt_limit, '');
		if ($echo == true) {
			echo esc_html($excerpt);
		} else {
			return esc_html($excerpt);
		}
	}
endif;

// custom kses allowed html
if (!function_exists('itechie_core_allowed_tags')) :
	function itechie_core_allowed_tags($tags, $context)
	{
		switch ($context) {
			case 'itechie_core_allowed_tags':
				$tags = array(
					'a' => array('href' => array(), 'class' => array()),
					'b' => array(),
					'br' => array(),
					'span' => array('class' => array(), 'data-count' => array()),
					'img' => array('class' => array()),
					'i' => array('class' => array()),
					'p' => array('class' => array()),
					'ul' => array('class' => array()),
					'li' => array('class' => array()),
					'div' => array('class' => array()),
					'strong' => array()
				);
				return $tags;
			default:
				return $tags;
		}
	}

	add_filter('wp_kses_allowed_html', 'itechie_core_allowed_tags', 10, 2);

endif;

/**
 * Itechie layout options
 * @since 1.0.0
 * */
if (!function_exists('itechie_pagination')) :
	function itechie_pagination()
	{
		global $wp_query;
		$links = paginate_links(array(
			'current'   => max(1, get_query_var('paged')),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
		));
		echo wp_kses($links, 'itechie_core_allowed_tags');
	}
endif;

/*
*header
*
* @since 1.0.0
* */

if (!function_exists('itechie_get_header')) :
	function itechie_get_header()
	{

		$itechie_header_style = get_post_meta(get_queried_object_id(), 'itechie_page_meta', true); // only for page

		if (is_page() && isset($itechie_header_style) && !empty($itechie_header_style)) {
			if (isset($itechie_header_style['enable_header_builder']) && true == $itechie_header_style['enable_header_builder']) {
				get_template_part('template-parts/header/header-builder');
			} else {
				get_template_part('template-parts/header/default-header');
			}
		} else {
			if (true == itechie_get_option('enable_header_builder')) {
				get_template_part('template-parts/header/header-builder');
			} else {
				get_template_part('template-parts/header/default-header');
			}
		}
	}

endif;


if (!function_exists('itechie_get_footer')) :
	function itechie_get_footer()
	{

		$itechie_footer_style = get_post_meta(get_queried_object_id(), 'itechie_page_meta', true); // only for page

		if (is_page() && isset($itechie_footer_style) && !empty($itechie_footer_style)) {
			if (isset($itechie_footer_style['enable_footer_builder']) && true == $itechie_footer_style['enable_footer_builder']) {
				get_template_part('template-parts/footer/footer-builder');
			} else {
				get_template_part('template-parts/footer/default-footer');
			}
		} else {
			if (true == itechie_get_option('enable_footer_builder')) {
				get_template_part('template-parts/footer/footer-builder');
			} else {
				get_template_part('template-parts/footer/default-footer');
			}
		}
	}

endif;

/*
*  header builder
*/
if (!function_exists('itechie_get_header_builder_library')) :
	function itechie_get_header_builder_library()
	{

		$pageslist = get_posts(array(
			'post_type'      => 'header-builder',
			'posts_per_page' => -1
		));

		$pagearray = array();
		if (!empty($pageslist)) {
			foreach ($pageslist as $page) {
				$pagearray[$page->ID] = $page->post_title;
			}
		}

		return $pagearray;
	}

endif;


/*
*  header builder
*/
if (!function_exists('itechie_get_footer_builder_library')) :
	function itechie_get_footer_builder_library()
	{

		$pageslist = get_posts(array(
			'post_type'      => 'footer-builder',
			'posts_per_page' => -1
		));

		$pagearray = array();
		if (!empty($pageslist)) {
			foreach ($pageslist as $page) {
				$pagearray[$page->ID] = $page->post_title;
			}
		}

		return $pagearray;
	}
endif;

/*
* meta query
* @since 1.0.0
* */
if (!function_exists('itechie_meta_query')) :
	function itechie_meta_query($prefix, $id)
	{
		global $post;
		$meta = '';
		if (!empty($post->ID)) {
			$meta = get_post_meta($post->ID, $prefix, true);
			$meta = (isset($meta[$id]) && !empty($meta[$id])) ? $meta[$id] : '';
		}

		return $meta;
	}

endif;

if (!function_exists('itechie_entry_footer')) :
	function itechie_entry_footer()
	{
		if (has_tag()) :
?>
			<div class="tag-and-share">
				<div class="row">
					<div class="<?php echo esc_attr((class_exists('Itechie_Core_Init') ? 'col-sm-7' : 'col-sm-12')); ?>">
						<?php
						$tags_list = get_the_tag_list('', ' ');
						if ($tags_list) {
							/* translators: 1: list of tags. */
							printf('<div class="tags d-inline-block"><span>' . esc_html__('Tags: ', 'itechie') . '</span> %1$s </div>', '' . $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>
					</div>
					<?php do_action('itechie_beside_tags'); ?>
				</div>
			</div>
			<?php do_action('itechie_after_tags'); ?>
<?php endif;
	}

endif;

/**
 * Itechie layout options
 * @since 1.0.0
 * */
if (!function_exists('itechie_page_layout_options')) :
	function itechie_page_layout_options($arg)
	{
		$return_var = [];
		$sidebar = is_active_sidebar('sidebar-1') ? true : false;
		$default_sidebar = $sidebar ? 'right-sidebar' : '';
		$return_var['layout'] = itechie_get_option('itechie_' . $arg . '_layout') ? itechie_get_option('itechie_' . $arg . '_layout')  : $default_sidebar;
		$return_var['sidebar_enable'] = ('left-sidebar' == $return_var['layout'] || 'right-sidebar' == $return_var['layout']) ? true : false;
		$return_var['main_content_class'] = ('left-sidebar' == $return_var['layout'] || 'right-sidebar' == $return_var['layout'])  ? 'col-lg-8' : 'col-lg-12';
		$return_var['sidebar_class'] = ('left-sidebar' == $return_var['layout'] || 'right-sidebar' == $return_var['layout'])  ? 'col-lg-4' : 'col-lg-4';
		$return_var['sidebar_class'] = 'left-sidebar' == $return_var['layout'] ? 'col-lg-4 order-first' : $return_var['sidebar_class'];
		$return_var['sidebar_class'] = (isset($_GET['sidebar']) && $_GET['sidebar'] == 'left-align') ? 'col-lg-4 order-first' : $return_var['sidebar_class'];

		return $return_var;
	}

endif;


add_filter('comment_form_fields', 'itechie_move_comment_field_to_bottom', 99, 1);
function itechie_move_comment_field_to_bottom($fields)
{
	$comment_field   = $fields['comment'];
	$comment_cookies = $fields['cookies'];
	unset($fields['comment']);
	unset($fields['cookies']);
	$fields['comment'] = $comment_field;
	$fields['cookies'] = $comment_cookies;

	return $fields;
}
