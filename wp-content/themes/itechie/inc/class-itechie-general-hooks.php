<?php

/**
 * theme Hook class
 * */
if (!defined('ABSPATH')) {
	exit(); //exit if access directly
}

if (!class_exists('Itechie_General_Hook')) {

	class Itechie_General_Hook
	{

		private static $instance;

		public function __construct()
		{
			//add serach in  nav bar

			add_action('itechie_before_site_content', array($this, 'preloader')); //preloader

			add_action('wp_footer', array($this, 'search')); //search

			add_action('itechie_before_site_content', array($this, 'breadcrumb')); //breadcrumb

			add_action('itechie_before_footer', array($this, 'back_to_top')); //back to top button

		}


		/**
		 * getInstance();
		 * @since 1.0.0
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}


		/**
		 * search popup;
		 * @since 1.0.0
		 *
		 */
		public function breadcrumb()
		{
			itechie_breadcrumb();
		}

		/**
		 * back to top
		 * @since 1.0.0
		 * */
		public function back_to_top()
		{
			if (itechie_switcher_option('back_top_enable') == 1) :

?>
				<!-- back to top area start -->
				<div class="back-to-top">
					<span class="back-top"><i class="fa fa-angle-up"></i></span>
				</div>
				<!-- back to top area end -->

			<?php
			endif;
		}

		/**
		 * pre loadaer
		 * @since 1.0.0
		 * */
		public function preloader()
		{
			if (itechie_switcher_option('preloader_enable') == 1) :

			?>
				<!-- preloader area start -->
				<div class="preloader" id="preloader">
					<div class="preloader-inner">
						<div class="spinner">
							<div class="dot1"></div>
							<div class="dot2"></div>
						</div>
					</div>
				</div>
				<!-- preloader area end -->
			<?php
			endif;
		}

		/**
		 *  search
		 * @since 1.0.0
		 * */
		public function search()
		{

			?>
			<div class="td-search-popup" id="td-search-popup">
				<form action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
					<div class="form-group">
						<input type="text" name="s" class="form-control" placeholder="<?php echo esc_attr__('Search.....', 'itechie'); ?>" value="<?php get_search_query() ?>">
					</div>
					<button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
				</form>
			</div>
			<div class="body-overlay" id="body-overlay"></div>
<?php
		}


		/**
		 * Single page content buttom
		 * @since 1.0.0
		 *
		 */
	} //end class

	Itechie_General_Hook::getInstance();
} //endif