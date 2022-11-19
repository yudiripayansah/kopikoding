<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Contact_Form_Widget extends Widget_Base
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
		return 'itechie-contact-form-widget';
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
		return esc_html__('Contact Form', 'itechie-core');
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
				'label' => esc_html__('Layout', 'itechie-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => esc_html__('Select Layout', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'layout_one',
				'options' => [
					'layout_one' => esc_html__('Layout One', 'itechie-core'),
					'layout_two' => esc_html__('Layout Two', 'itechie-core'),
				]
			]
		);

		$this->end_controls_section();

		/*
		* content
		*/
		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'summary',
			[
				'label' => esc_html__('Summary', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Background Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'layout_type' => 'layout_one'
				],
				'default' => [],
			]
		);

		$this->add_control(
			'contact_shortcode',
			[
				'label'       => esc_html__('Select your contact form 7', 'itechie-core'),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::SELECT,
				'options'     => itechie_core_post_query('wpcf7_contact_form'),
			]
		);


		$features_list = new \Elementor\Repeater();

		$features_list->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
			]
		);

		$features_list->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Text', 'itechie-core'),
			]
		);

		$features_list->add_control(
			'image',
			[
				'label' => esc_html__('Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);


		$this->add_control(
			'features_list',
			[
				'label' => esc_html__('Feature Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $features_list->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition' => [
					'layout_type' => 'layout_one'
				]
			]
		);

		$social_icons = new \Elementor\Repeater();

		$social_icons->add_control(
			'social_icon',
			[
				'label' => esc_html__('Select Icon', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [],
			]
		);

		$social_icons->add_control(
			'social_url',
			[
				'label' => esc_html__('Add Url', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('#', 'itechie-core'),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'social_icons',
			[
				'label' => esc_html__('Social Icons', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social_icons->get_controls(),
				'condition' => [
					'layout_type' => 'layout_two'
				],
				'default' => [
					[],
				],
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
			<div class="contact-area bg-overlay " style="background-image: url('<?php echo esc_url($settings['bg_image']['url']); ?>');">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<form class="contact-form-inner mt-mn-200 style-shadow">

								<div class="section-title">
									<?php if (!empty($settings['title'])) : ?>
										<h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
									<?php endif; ?>
									<?php if (!empty($settings['sub_title'])) : ?>
										<p><?php echo esc_html($settings['sub_title']); ?></p>
									<?php endif; ?>
								</div>

								<div class="row">

									<?php if (!empty($settings['contact_shortcode'])) : ?>
										<?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_shortcode'] . '" ]'); ?>
									<?php endif; ?>

								</div>
							</form>
						</div>
						<?php if (is_array($settings['features_list'])) : ?>
							<div class="col-lg-4 align-self-end">
								<div class="mt-5 mt-lg-0">
									<ul class="single-list-wrap">
										<?php foreach ($settings['features_list'] as $item) : ?>
											<li class="single-list-inner style-white style-check-box-grid-2">
												<div class="media">
													<div class="media-left">
														<img src="<?php echo esc_url($item['image']['url']); ?>" alt="img">
													</div>
													<div class="media-body align-self-center">
														<h5><?php echo esc_html($item['title']); ?></h5>
														<?php echo wp_kses_post($item['content']); ?>
													</div>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ('layout_two' == $settings['layout_type']) : ?>
			<div class="counter-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="section-title mb-0">
								<?php if (!empty($settings['sub_title'])) : ?>
									<h6 class="sub-title right-line"><?php echo esc_html($settings['title']); ?></h6>
								<?php endif; ?>
								<?php if (!empty($settings['title'])) : ?>
									<h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
								<?php endif; ?>
								<?php if (!empty($settings['summary'])) : ?>
									<p class="content pb-3"><?php echo esc_html($settings['summary']); ?> </p>
								<?php endif; ?>
								<?php if (is_array($settings['social_icons'])) : ?>
									<ul class="social-media style-base pt-3">
										<?php foreach ($settings['social_icons'] as $item) : ?>
											<li>
												<a href="<?php echo esc_url($item['social_url']['url']); ?>"><i class="<?php echo esc_attr($item['social_icon']['value']); ?>" aria-hidden="true"></i></a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-lg-8 mt-5 mt-lg-0">
							<?php if (!empty($settings['contact_shortcode'])) : ?>
								<?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_shortcode'] . '" ]'); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

<?php
	}
}

Plugin::instance()->widgets_manager->register(new Itechie_Contact_Form_Widget());
