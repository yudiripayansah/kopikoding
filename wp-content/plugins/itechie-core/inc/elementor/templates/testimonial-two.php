<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!--  testimonial area start -->
    <div class="testimonial-area pd-top-90 bg-cover bg-cover-70" style="background-image: url(<?php echo esc_url($settings['layout_two_bg_image']['url']); ?>);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9">
                    <div class="testimonial-slider-3 owl-carousel" data-slider-id="1">
                        <?php if (is_array($settings['testimonial_list_two'])) : ?>
                            <?php foreach ($settings['testimonial_list_two'] as $item) :  ?>
                                <div>
                                    <div class="single-testimonial-inner style-two text-center">
                                        <div class="about-mask-bg-wrap about-mask-bg-wrap-1">
                                            <img class="shape-image-sm top_image_bounce" src="<?php echo esc_url($item['shape_one']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['shape_one']['id'])); ?>">
                                            <img class="shape-image" src="<?php echo esc_url($item['shape_two']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['shape_two']['id'])); ?>">
                                            <div class="thumb">
                                                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id'])); ?>">
                                            </div>
                                        </div>
                                        <div class="details">
                                            <h2><?php echo esc_html($item['name']); ?></h2>
                                            <span><?php echo esc_html($item['designation']); ?></span>
                                            <p><?php echo wp_kses($item['testimonial'], 'itechie_core_allowed_tags');  ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="owl-thumbs testimonial-slider-3-thumb" data-slider-id="1">
                <?php if (is_array($settings['testimonial_list_two'])) : ?>
                    <?php $i = 1;
                    foreach ($settings['testimonial_list_two'] as $item) : ?>
                        <div class="owl-thumb-item owl-thumb-item-<?php echo esc_attr($i); ?>">
                            <div class="about-mask-bg-wrap about-mask-bg-wrap-3">
                                <div class="thumb">
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id'])); ?>">
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    endforeach ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--  testimonial area end -->
<?php endif; ?>