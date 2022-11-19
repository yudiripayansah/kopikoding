<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itechie
 */
get_header();
$itechie_layout = itechie_page_layout_options('single_page');
?>
<div id="primary" class="content-area itechie-blog-details">
	<main id="main" class="site-main">
		<div class="blog-area pd-top-120 pd-bottom-120">
			<div class="container">
				<div class="row">
					<div class="<?php echo esc_attr($itechie_layout['main_content_class']); ?>">
						<div class="blog-details-page-content">
							<?php
							while (have_posts()) :
								the_post();

								get_template_part('template-parts/content', 'single');

								// If comments are open or we have at least one comment, load up the comment template.
								if (comments_open() || get_comments_number()) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
						</div>
					</div>
					<?php if ($itechie_layout['sidebar_enable']) : ?>
						<div class="<?php echo esc_attr($itechie_layout['sidebar_class']); ?>">
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
