<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itechie
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="blog-comment">

	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<div class="section-title style-small">
			<h3 class="section-title style-small">
				<?php
				$itechie_comment_count = get_comments_number();
				if ('1' === $itechie_comment_count) {
					printf(
						/* translators: 1: title. */
						esc_html__('1 Comment', 'itechie')

					);
				} else {
					printf( // phpcs:ignore WordPress.Security.EscapeOutput.DeprecatedWhitelistCommentFound
						/* translators: 1: comment count number, 2: title. */
						esc_html(_nx('%1$s Comments &ldquo;%2$s&rdquo;', '%1$s Comments ', $itechie_comment_count, 'comments title', 'itechie')), // phpcs:ignore WordPress.WP.I18n.MismatchedPlaceholders
						number_format_i18n($itechie_comment_count) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					);
				}
				?>
			</h3><!-- .comments-title -->
		</div>

		<div class="blog-comment-navigation">
			<?php the_comments_navigation(); ?>
		</div>
		<div class="clearfix"></div>
		<ul class="comment-list">
			<?php
			wp_list_comments(array(
				'style'      => 'ul',
				'avatar_size' => 90,
				'short_ping' => true,
			));
			?>
		</ul><!-- .comment-list -->
		<div class="blog-comment-navigation">
			<?php the_comments_navigation(); ?>
		</div>
		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'itechie'); ?></p>
	<?php
		endif;

	endif; // Check for have_comments(). 
	?>
	<div class="blog-comment-form">
		<?php
		$fields = array(
			'author' => '<div class="row">
            <div class="col-md-6">
				<div class="single-input-inner style-border">
					<input type="text"  id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="' . esc_attr__('Name', 'itechie') . '">
				</div>
			</div>',
			'email'  => '<div class="col-md-6">
				<div class="single-input-inner style-border">
					<input type="text" name="email" id="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="' . esc_attr__('Email', 'itechie') . '">
				</div>
			</div></div>'
		);
		comment_form(array(
			'fields'               => apply_filters('itechie_comment_form_default_fields', $fields),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'title_reply'          => esc_html__('Leave A Comment', 'itechie'),
			'title_reply_to'       => esc_html__('Leave A Reply To %s', 'itechie'), // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
			'title_reply_before'   => '<div class="mb-2"><h3 class="mb-0">',
			'title_reply_after'    => '</h3></div>',
			'id_form'              => 'commentform',
			'class_form'           => 'contact-form-wrap',
			'id_submit'            => 'submit',
			'cancel_reply_link'    => esc_html__('Cancel', 'itechie'),
			'class_submit'         => 'btn btn-base',
			'label_submit'         => esc_html__('Post Comment', 'itechie'),
			'comment_field'        => '<div class="col-12">
				<div class="single-input-inner style-border">
					<textarea name="comment" id="comment" placeholder="' . esc_attr__('Write Comment', 'itechie') . '"></textarea>
				</div>
			</div>'
		));
		?>
	</div> <!-- comment fomr -->
</div><!-- #comments -->