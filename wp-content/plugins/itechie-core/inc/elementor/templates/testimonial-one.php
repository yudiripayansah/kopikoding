<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- testimonial-slider start -->
    <div class="testimonial-slider bg-sky bg-relative testimonial-slider-bg pd-top-120 pd-bottom-120">
        <div class="container bg-relative">
            <div class="slider testimonial-thumb">
                <?php if (is_array($settings['testimonial_list'])) : ?>
                    <?php foreach ($settings['testimonial_list'] as $item) : ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="thumb mb-4 mb-md-0">
                                        <img src="<?php echo esc_url($item['large_image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['large_image']['id'])); ?>">
                                        <div class="quote-wrap">
                                            <div class="quote">
                                                <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['icon']['id'])); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 align-self-center">
                                    <div class="single-testimonial-inner px-lg-5">
                                        <div class="details">
                                            <h2><?php echo esc_html($item['name']); ?></h2>
                                            <span><?php echo esc_html($item['designation']); ?></span>
                                            <p><?php echo esc_html($item['testimonial']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif; ?>
            </div>
            <div class="slider testimonial-nav-slider">
                <?php if (is_array($settings['testimonial_list'])) : ?>
                    <?php foreach ($settings['testimonial_list'] as $item) : ?>
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