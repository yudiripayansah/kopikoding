<?php
if (!function_exists('itechie_dynamic_styles')) {

	function itechie_dynamic_styles()
	{

		ob_start();


		/*------------------------------------------------------------------------------------
		 * body font
		------------------------------------------------------------------------------------ */

		if (1 == itechie_get_option('body_font_enable', 0)) :

			$itechie_body_font = itechie_get_option('itechie_body_font');
			$font_weight = isset($itechie_body_font['font-weight']) ? $itechie_body_font['font-weight'] : "normal";
?>

			body{
			font-family:<?php echo esc_attr($itechie_body_font['font-family']); ?>;
			font-weight:<?php echo esc_attr($font_weight); ?>;
			font-size:<?php echo esc_attr($itechie_body_font['font-size']); ?>px;
			}

		<?php

		endif;

		/*------------------------------------------------------------------------------------
		 * body font
		------------------------------------------------------------------------------------ */

		if (1 == itechie_get_option('heading_font_enable', 0)) :

			$itechie_heading_font = itechie_get_option('heading_font');
			$font_weight = isset($itechie_heading_font['font-weight']) ? $itechie_heading_font['font-weight'] : "normal";
		?>

			h1,h2,h3,h4,h5,h6{
			font-family:<?php echo esc_attr($itechie_heading_font['font-family']); ?>;
			font-weight:<?php echo esc_attr($font_weight); ?>;
			}

		<?php

		endif;


		/*------------------------------------------------------------------------------------
		  blog page spacing
		 ------------------------------------------------------------------------------------ */

		if (1 == itechie_get_option('blog_spacing_enable', 0)) :

		?>

			.itechie-blog-page{
			margin-top:<?php echo esc_attr(itechie_get_option('blog_top_padding')); ?>px;
			margin-bottom:<?php echo esc_attr(itechie_get_option('blog_bottom_padding')); ?>px;
			}

		<?php

		endif;

		/*------------------------------------------------------------------------------------
		 blog details page spacing
		------------------------------------------------------------------------------------ */

		if (1 == itechie_get_option('blog_details_spacing_enable', 0)) :

		?>

			.itechie-blog-details{
			margin-top:<?php echo esc_attr(itechie_get_option('single_top_padding')); ?>px;
			margin-bottom:<?php echo esc_attr(itechie_get_option('single_bottom_padding')); ?>px;
			}

		<?php

		endif;


		/*------------------------------------------------------------------------------------
		  archive page spacing
		 ------------------------------------------------------------------------------------ */

		if (1 == itechie_get_option('archive_page_spacing_enable', 0)) :

		?>

			.itechie-archive-page{
			margin-top:<?php echo esc_attr(itechie_get_option('archive_top_padding')); ?>px;
			margin-bottom:<?php echo esc_attr(itechie_get_option('archive_bottom_padding')); ?>px;
			}

		<?php

		endif;

		/*------------------------------------------------------------------------------------
		 search page spacing
		------------------------------------------------------------------------------------ */

		if (1 == itechie_get_option('search_page_spacing_enable', 0)) :

		?>

			.itechie-search-page{
			margin-top:<?php echo esc_attr(itechie_get_option('search_top_padding')); ?>px;
			margin-bottom:<?php echo esc_attr(itechie_get_option('search_bottom_padding')); ?>px;
			}

		<?php

		endif;

		/*------------------------------------------------------------------------------------
		  footer top spacing
		------------------------------------------------------------------------------------ */

		if (1 == itechie_get_option('footer_spacing', 0)) :

		?>

			.itechie-footer-top{
			margin-top:<?php echo esc_attr(itechie_get_option('footer_top_spacing')); ?>px;
			margin-bottom:<?php echo esc_attr(itechie_get_option('footer_bottom_spacing')); ?>px;
			}

		<?php

		endif;

		/*------------------------------------------------------------------------------------
		  footer bottom spacing
		------------------------------------------------------------------------------------ */

		if (1 == itechie_get_option('copyright_area_spacing', 0)) :

		?>

			.footer-bottom{
			padding-top:<?php echo esc_attr(itechie_get_option('copyright_area_top_spacing')); ?>px;
			padding-bottom:<?php echo esc_attr(itechie_get_option('copyright_area_bottom_spacing')); ?>px;
			}

		<?php

		endif;

		?>
		.banner-bg-img{
		background-image:url( <?php echo esc_url(itechie_get_option('banner_shape')); ?> );
		}

		<?php

		/*------------------------------------------------------------------------------------
		  From customizer
	   ------------------------------------------------------------------------------------ */

		//primary color

		if (!empty(itechie_get_customize_option('main_color'))) :
		?>
			:root {
			--main-color: <?php echo esc_attr(itechie_get_customize_option('main_color')); ?>;
			}
<?php endif;

		$output = ob_get_clean();

		return $output;
	} //end  itechie_dynamic_styles

} //endif


function itechie_style_method()
{

	$custom_css = itechie_dynamic_styles();

	wp_add_inline_style('itechie-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'itechie_style_method');
