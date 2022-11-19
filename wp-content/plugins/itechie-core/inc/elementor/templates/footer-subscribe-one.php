<?php if (!empty($settings['contact_shortcode'])) : ?>
	<?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_shortcode'] . '" ]');
	?>
<?php endif; ?>