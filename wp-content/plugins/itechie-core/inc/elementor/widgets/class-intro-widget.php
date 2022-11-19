<?php

/**
 * Elementor Widget
 * @package ITECHIE
 * @since 1.0.0
 */

namespace Elementor;

class Itechie_Intro_Widget extends Widget_Base
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
		return 'itechie-intro-widget';
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
		return esc_html__('Intro', 'itechie-core');
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
					'layout_three' => esc_html__('Layout Three', 'itechie-core'),
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
				'label' => esc_html__('Section Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Title', 'itechie-core'),
				'condition' => [
					'layout_type!' => 'layout_three'
				]
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__('Section Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
				'condition' => [
					'layout_type!' => 'layout_three'
				]
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
					'layout_type' => ['layout_one']
				]
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
			'sub_title',
			[
				'label' => esc_html__('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
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
				'condition'  => [
					'layout_type' =>  'layout_two'
				]
			]
		);

		$Items = new \Elementor\Repeater();

		$Items->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
			]
		);

		$Items->add_control(
			'sub_title',
			[
				'label' => esc_html__('Sub Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add Sub Title', 'itechie-core'),
			]
		);

		$Items->add_control(
			'image',
			[
				'label' => esc_html__('Icon Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__('Info Lists', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $Items->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition'  => [
					'layout_type' => ['layout_one', 'layout_two']
				]
			]
		);

		$intro_items = new \Elementor\Repeater();

		$intro_items->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Add title', 'itechie-core'),
			]
		);

		$intro_items->add_control(
			'url',
			[
				'label' => esc_html__('Url', 'itechie-core'),
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

		$intro_items->add_control(
			'image',
			[
				'label' => esc_html__('Icon Image', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,

				'default' => [],
			]
		);

		$intro_items->add_control(
			'bg_color',
			[
				'label' => __('Background Color', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'intro_items',
			[
				'label' => esc_html__('Items', 'itechie-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $intro_items->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition'  => [
					'layout_type' => 'layout_three'
				]
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
			<div class="intro-area intro-area--top">
				<div class="container">
					<div class="intro-area-inner bg-black">
						<div class="row no-gutters">
							<div class="col-lg-4 text-lg-left text-center">
								<div class="intro-title">
									<?php if (!empty($settings['title'])) : ?>
										<h3><?php echo esc_html($settings['title']); ?></h3>
									<?php endif; ?>
									<?php if (!empty($settings['sub_title'])) : ?>
										<p><?php echo esc_html($settings['sub_title']); ?></p>
									<?php endif; ?>
									<?php if (is_array($settings['check_list'])) : ?>
										<ul>
											<?php foreach ($settings['check_list'] as $list) : ?>
												<li><i class="fa fa-check"></i><?php echo esc_html($list['title']); ?></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-lg-8 align-self-center">
								<ul class="row no-gutters">
									<?php if (is_array($settings['items'])) : ?>
										<?php foreach ($settings['items'] as $item) : ?>
											<li class="col-md-4">
												<div class="single-intro-inner style-white text-center">
													<div class="thumb">
														<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id'])); ?>">
													</div>
													<div class="details">
														<h5><?php echo esc_html($item['title']); ?></h5>
														<p><?php echo esc_html($item['sub_title']); ?></p>
													</div>
												</div>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ('layout_two' == $settings['layout_type']) : ?>
			<div class="intro-area intro-area--top">
				<div class="container">
					<div class="intro-area-inner-2">
						<div class="row justify-content-center">
							<div class="col-lg-6">
								<div class="section-title text-center">
									<?php if (!empty($settings['sub_title'])) : ?>
										<h6 class="sub-title double-line"><?php echo esc_html($settings['sub_title']); ?></h6>
									<?php endif; ?>
									<?php if (!empty($settings['title'])) : ?>
										<h2 class="title"><?php echo wp_kses($settings['title'], array('br' => array())); ?></h2>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<?php if (is_array($settings['features_list'])) : ?>
								<?php foreach ($settings['features_list'] as $list) : ?>
									<div class="col-md-4">
										<div class="single-intro-inner style-thumb text-center">
											<div class="thumb">
												<img src="<?php echo esc_url($list['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($list['image']['id'])); ?>">
											</div>
											<div class="details">
												<h5><?php echo esc_html($list['title']); ?></h5>
												<p><?php echo esc_html($list['sub_title']); ?></p>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>

						</div>
						<?php if (is_array($settings['items'])) : ?>
							<div class="intro-footer bg-base">
								<div class="row">
									<?php foreach ($settings['items'] as $item) : ?>
										<div class="col-md-4">
											<div class="single-list-inner">
												<div class="media">
													<div class="media-left">
														<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id'])); ?>">
													</div>
													<div class="media-body align-self-center">
														<h5><?php echo esc_html($item['title']); ?></h5>
														<p><?php echo esc_html($item['sub_title']); ?></p>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ('layout_three' == $settings['layout_type']) : ?>
			<div class="intro-area intro-area--top">
				<div class="container">
					<div class="intro-slider owl-carousel">
						<?php if (is_array($settings['intro_items'])) : ?>
							<?php foreach ($settings['intro_items'] as $item) : ?>
								<div class="item">
									<div class="single-intro-inner style-white text-center" style="background-color: <?php echo sanitize_hex_color($item['bg_color']); ?>;">
										<div class="thumb">
											<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id'])); ?>">
										</div>
										<div class="details">
											<h5><?php echo esc_html($item['title']); ?></h5>
											<a class="read-more" href="<?php echo esc_url($item['url']['url']); ?>"><i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>


<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new Itechie_Intro_Widget());
