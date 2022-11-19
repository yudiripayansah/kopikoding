<?php if ('layout_five' == $settings['layout_type']) : ?>

    <!-- testimonial-slider start -->
    <div class="testimonial-slider bg-sky bg-relative">
        <div class="bg-relative">
            <div class="slider testimonial-thumb testimonial-thumb-2">
                <?php if (is_array($settings['testimonial_five'])) : ?>
                    <?php foreach ($settings['testimonial_five'] as $item) : ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="thumb mb-4 mb-md-0" style="background-image: url(<?php echo esc_url($item['large_image']['url']); ?>);">
                                        <div class="quote-wrap">
                                            <div class="quote">
                                                <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['icon']['id'])); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6 align-self-center">
                                    <div class="single-testimonial-inner text-md-center px-lg-5 px-md-4">
                                        <div class="details">
                                            <div class="thumb">
                                                <img src="<?php echo esc_url($item['small_image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['small_image']['id'])); ?>">
                                            </div>
                                            <h2><?php echo esc_html($item['designation']); ?></h2>
                                            <span><?php echo esc_html($item['name']); ?></span>
                                            <p><?php echo esc_html($item['testimonial']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif; ?>

            </div>
            <div class="slider testimonial-nav-slider testimonial-nav-slider-2">
                <?php if (is_array($settings['testimonial_five'])) : ?>
                    <?php foreach ($settings['testimonial_five'] as $item) : ?>
                        <div class="item">
                            <div class="thumb">
                                <img src="<?php echo esc_url($item['small_image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['small_image']['id'])); ?>">
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- testimonial-slider end -->
<?php endif; ?>