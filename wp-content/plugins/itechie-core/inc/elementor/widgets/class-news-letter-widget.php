<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_News_Letter_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'itechie-news-letter-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('News Letter', 'itechie-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-product-info';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['itechie_widgets'];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls()
	{

		$this->start_controls_section(
			'layout_section',
			[
				'label' => __('Layout', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => __('Select Layout', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'layout_one',
				'options' => [
					'layout_one' => __('Layout One', 'itechie-core'),
					'layout_two' => __('Layout Two', 'itechie-core'),
				]
			]
		);

		$this->end_controls_section();

		/*
		* why subscribe us
		*/
		$this->start_controls_section(
			'why_subscribe_us',
			[
				'label' => esc_html__('Why Subscribe Us', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'layout_type' => 'layout_two'
			]
		);

		$this->add_control(
			'why_subscribe_us_title',
			[
				'label' => __('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'why_subscribe_us_summary',
			[
				'label' => __('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Summary', 'itechie-core'),
			]
		);

		$check_list = new \Elementor\Repeater();

		$check_list->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
			]
		);

		$this->add_control(
			'check_list',
			[
				'label' => esc_html__('Check Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $check_list->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition'  => [
					'layout_type' =>  'layout_two'
				]
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__('Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);


		$this->end_controls_section();

		/*
	* newsletter
	*/
		$this->start_controls_section(
			'newsletter',
			[
				'label' => esc_html__('Newsletter', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'layout_type' => 'layout_two'
			]
		);

		$this->add_control(
			'newsletter_title',
			[
				'label' => __('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'newsletter_summary',
			[
				'label' => __('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Summary', 'itechie-core'),
			]
		);

		$this->add_control(
			'contact_shortcode',
			[
				'label'       => esc_html__('Choose From Contact Form', 'itechie-core'),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options'     => itechie_core_post_query('wpcf7_contact_form'),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
?>

		<?php if ('layout_one' == $settings['layout_type']) : ?>
			<div class="footer-area bg-gray">
				<div class="footer-subscribe">
					<div class="container">
						<?php if (!empty($settings['contact_shortcode'])) : ?>
							<?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_shortcode'] . '" ]'); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ('layout_two' == $settings['layout_type']) : ?>
			<!-- speciality area start -->
			<div class="spaciality-area ">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 mb-5 mb-lg-0">
							<div class="testimonial-area-inner bg-cover h-100" style="background-image: url(<?php echo esc_url(ITECHIE_CORE_IMG); ?>/testimonial-bg.png);">
								<?php if (!empty($settings['image']['url'])) : ?>
									<img class="testimonial-right-img" src="<?php echo esc_url($settings['image']['url']); ?>" alt="img">
								<?php endif; ?>
								<div class="single-testimonial-inner style-white">
									<?php if (!empty($settings['why_subscribe_us_title'])) : ?>
										<h4 class="text-white"><?php echo esc_html($settings['why_subscribe_us_title']); ?></h4>
									<?php endif; ?>
									<?php if (!empty($settings['why_subscribe_us_summary'])) : ?>
										<p class="mb-4"><?php echo esc_html($settings['why_subscribe_us_summary']); ?></p>
									<?php endif; ?>
									<?php if (is_array($settings['check_list'])) : ?>
										<ul class="single-list-wrap">
											<?php foreach ($settings['check_list'] as $item) : ?>
												<li class="single-list-inner style-check-box">
													<i class="fa fa-check"></i> <?php echo esc_html($item['title']); ?>
												</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="subscribe-inner-area h-100" style="background-color: var(--main-color);">
								<?php if (!empty($settings['newsletter_title'])) : ?>
									<h3><?php echo esc_html($settings['newsletter_title']); ?></h3>
								<?php endif; ?>
								<?php if (!empty($settings['newsletter_summary'])) : ?>
									<p><?php echo esc_html($settings['newsletter_summary']); ?></p>
								<?php endif; ?>
								<div class="single-input-inner">
									<?php if (!empty($settings['contact_shortcode'])) : ?>
										<?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_shortcode'] . '" ]'); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- speciality area end -->

		<?php endif; ?>

<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new Itechie_News_Letter_Widget());
