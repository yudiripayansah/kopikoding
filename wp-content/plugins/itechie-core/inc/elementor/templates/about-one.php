<?php if ('layout_one' == $settings['layout_type']) : ?>

    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <?php if (!empty($settings['image']['url'])) : ?>
                        <div class="about-mask-bg-wrap about-mask-bg-wrap-1 mb-4 mb-lg-0">
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
                <div class="col-lg-6 align-self-center">
                    <div class="section-title px-lg-5 mb-0">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title right-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags'); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['highlight_text'])) : ?>
                            <p class="content mt-3"><?php echo wp_kses($settings['highlight_text'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                        <?php if (is_array($settings['funfacts'])) : ?>
                            <div class="exp-wrap mt-4">
                                <div class="row">
                                    <?php foreach ($settings['funfacts'] as $item) : ?>
                                        <div class="col-sm-4">
                                            <div class="single-exp-inner">
                                                <h2><span class="counter"><?php echo esc_html($item['number']); ?></span> <sub><?php echo esc_html($item['sign']); ?></sub></h2>
                                                <h5><?php echo esc_html($item['title']); ?></h5>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>