<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itechie
 */

$itechie_page_meta = get_post_meta(get_queried_object_id(), 'itechie_page_meta', true);

$itechie_header_builder_id = (!empty($itechie_page_meta['header-builder-id']) ? $itechie_page_meta['header-builder-id'] : itechie_get_option('header-builder-id'));

?>
<div class="itechie-header-builder">
    <?php

    $itechie_header_builder = \Elementor\Plugin::instance();
    $itechie_header_builder_content = $itechie_header_builder->frontend->get_builder_content($itechie_header_builder_id);

    echo sprintf(__('%s', 'itechie'), $itechie_header_builder_content); // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
    ?>
</div>