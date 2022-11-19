<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itechie
 */
$itechie_page_meta = get_post_meta(get_queried_object_id(), 'itechie_page_meta', true);

$itechie_footer_builder_id = (!empty($itechie_page_meta['footer-builder-id']) ? $itechie_page_meta['footer-builder-id'] : itechie_get_option('footer-builder-id'));
?>

<div class="itechie-footer-builder">
    <?php

    $itechie_footer_builder = \Elementor\Plugin::instance();
    $itechie_footer_builder_content = $itechie_footer_builder->frontend->get_builder_content($itechie_footer_builder_id);
    echo sprintf(__('%s', 'itechie'), $itechie_footer_builder_content); // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
    ?>
</div>