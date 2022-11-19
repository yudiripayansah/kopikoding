<?php
/*
* @package itechie
* since 1.0.0
*/

$itechie_copyright = !empty(itechie_get_option('copyright_text')) ?  itechie_get_option('copyright_text') : esc_html__('Copyright &copy;2022 itechie', 'itechie');

?>

<footer class="default-footer footer-bottom text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12 align-self-center">
				<p><?php echo esc_html($itechie_copyright); ?></p>
			</div>
		</div>
	</div>
</footer>