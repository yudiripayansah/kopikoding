<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itechie
 */

$itechie_footer_builder_id = (!empty($project_footer_meta['footer-builder-id']) ? $project_footer_meta['footer-builder-id'] : itechie_get_option('footer-builder-id'));

?>
<div class="itechie-footer-builder">
    <?php

    $itechie_footer_builder = \Elementor\Plugin::instance();
    $itechie_footer_builder_content = $itechie_footer_builder->frontend->get_builder_content($itechie_footer_builder_id);
    echo sprintf(__('%s', 'itechie'), $itechie_footer_builder_content); // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
    ?>
</div>

</div><!-- #content -->


<?php do_action('itechie_before_footer'); ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>