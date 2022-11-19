<?php if ('layout_one' == $settings['layout_type']) : ?>
	<div class="footer-bottom text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12 align-self-center">
					<p><?php echo wp_kses($settings['copyright_txt'], 'itechie_core_allowed_tags'); ?></p>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>