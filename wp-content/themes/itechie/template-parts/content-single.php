<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itechie
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="single-blog-inner ">

		<?php itechie_post_thumbnail(); ?>

		<div class="details">
			<?php if ('post' === get_post_type()) : ?>
				<ul class="blog-meta">
					<li><?php itechie_posted_by(); ?></li>
					<li><?php itechie_posted_on(); ?></li>
					<?php if (has_category()) : ?>
						<li><i aria-hidden="true" class=" icomoon-folder-2"></i><?php the_category(', '); ?></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						esc_html__('Continue reading', 'itechie') . '<span class="screen-reader-text"> "%s"</span>',
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="link-page">' . esc_html__('Pages:', 'itechie'),
					'after'  => '</div>',
				)
			);
			?>

			<footer class="entry-footer">
				<?php itechie_entry_footer();  ?>
			</footer><!-- .entry-footer -->


		</div>
	</div>

</article>