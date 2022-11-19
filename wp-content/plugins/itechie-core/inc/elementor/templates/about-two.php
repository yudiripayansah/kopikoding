<?php if ('layout_two' == $settings['layout_type']) : ?>

    <!-- why choose area start -->
    <div class="why-choose ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 order-lg-last">
                    <?php if (!empty($settings['image']['url'])) : ?>
                        <div class="about-mask-bg-wrap about-mask-bg-wrap-2 mb-4 mb-lg-0">
                            <?php if (!empty($settings['image_shape']['url'])) : ?>
                                <img class="shape-image-sm top_image_bounce" src="<?php echo esc_url($settings['image_shape']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image_shape']['id'])); ?>">
                            <?php endif; ?>
                            <?php if (!empty($settings['image_shape_two']['url'])) : ?>
                                <img class="shape-image" src="<?php echo esc_url($settings['image_shape_two']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image_shape_two']['id'])); ?>">
                            <?php endif; ?>
                            <div class="thumb">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image']['id'])); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 order-lg-first align-self-center">
                    <div class="section-title px-lg-5 mb-0">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title right-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                        <?php if (is_array($settings['feature_box'])) : ?>
                            <div class="choose-wrap mt-4">
                                <?php foreach ($settings['feature_box'] as $item) : ?>
                                    <div class="media single-choose-inner">
                                        <div class="media-left">
                                            <div class="icon">
                                                <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h4><?php echo esc_html($item['title']); ?></h4>
                                            <p><?php echo esc_html($item['content']); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- why choose area end -->
<?php endif; ?>