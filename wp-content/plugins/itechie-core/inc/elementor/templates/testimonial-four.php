<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- testimonial area start -->
    <div class="testimonial-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title double-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-2 style-active-bg slider-control-round owl-carousel">
                <?php if (is_array($settings['testimonial_four'])) : ?>
                    <?php foreach ($settings['testimonial_four'] as $item) : ?>
                        <div class="item">
                            <div class="single-testimonial-inner style-4">
                                <img class="shaddow-img" src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id'])); ?>">
                                <div class="details">
                                    <p><?php echo esc_html($item['testimonial']); ?></p>
                                    <h4><?php echo esc_html($item['name']); ?></h4>
                                    <span class="designation"><?php echo esc_html($item['designation']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- testimonial area end -->
<?php endif; ?>