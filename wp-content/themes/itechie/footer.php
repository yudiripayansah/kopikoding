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


?>

</div><!-- #content -->

<?php itechie_get_footer(); //footer  
?>

<?php do_action('itechie_before_footer'); ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>