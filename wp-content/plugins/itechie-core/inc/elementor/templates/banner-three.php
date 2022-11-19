<?php if ('layout_three' == $settings['layout_type']) : ?>

    <div class="banner-area banner-area-3">
        <div class="banner-slider slider-control-round owl-carousel">
            <?php if (is_array($settings['slider'])) : ?>
                <?php foreach ($settings['slider'] as $slider) : ?>
                    <div class="item bg-overlay" style="background-image: url(<?php echo esc_url($slider['slider_image']['url']); ?>);">
                        <div class="banner3-shape shape-1"></div>
                        <div class="banner3-shape shape-2"></div>
                        <div class="banner3-shape shape-3"></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div class="banner-inner style-white text-center">
                                        <?php if (!empty($slider['sub_title'])) : ?>
                                            <h4 class="sub-title s-animate-1"><?php echo wp_kses($slider['sub_title'], 'itechie_core_allowed_tags');  ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($slider['title'])) : ?>
                                            <h2 class="title s-animate-2"><?php echo wp_kses($slider['title'], 'itechie_core_allowed_tags');  ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($slider['summary'])) : ?>
                                            <p class="content s-animate-3"><?php echo wp_kses($slider['summary'], 'itechie_core_allowed_tags');  ?></p>
                                        <?php endif; ?>
                                        <div class="btn-wrap s-animate-4">
                                            <?php if (!empty($slider['button_label'])) : ?>
                                                <a class="btn btn-base me-2" href="<?php echo esc_url($slider['button_url']['url']); ?>"><?php echo esc_html($slider['button_label']); ?></a>
                                            <?php endif; ?>
                                            <?php if (!empty($slider['button_label_two'])) : ?>
                                                <a class="btn btn-black" href="<?php echo esc_url($slider['button_url_two']['url']); ?>"><?php echo esc_html($slider['button_label_two']); ?></a>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>