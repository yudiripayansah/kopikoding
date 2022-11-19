<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itechie
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-page-inner">
        <!--main page body-->
        <div class="itechie-page-body">
            <div class="entry-content">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'itechie' ),
					'after'  => '</div>',
				) );
				?>
            </div><!-- .entry-content -->
        </div>
        <!--blog-post-->
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
