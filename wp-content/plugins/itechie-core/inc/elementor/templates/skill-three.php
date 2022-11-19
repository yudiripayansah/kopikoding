<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- skill area start -->
    <div class="skill-area bg-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pe-lg-5">
                    <div class="section-title mb-0">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title right-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>

                    </div>
                    <div class="skill-progress-area mt-4">
                        <?php if (is_array($settings['skill'])) : ?>
                            <?php $i = 0;
                            foreach ($settings['skill'] as $item) : ?>
                                <div class="single-progressbar">
                                    <h6><?php echo esc_html($item['name']); ?></h6>
                                    <div class="progress-item" id="progress-running-<?php echo esc_attr($i); ?>">
                                        <div class="progress-bg">
                                            <div id="progress-<?php echo esc_attr($i); ?>" class="progress-rate" data-value="<?php echo esc_attr($item['percentage']); ?>">
                                            </div>
                                            <div class="progress-count-wrap">
                                                <span class="progress-count counting" data-count="<?php echo esc_attr($item['percentage']); ?>">0</span>
                                                <span class="counting-icons">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;
                            endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 px-lg-5 col-md-9 mt-5 mt-lg-0">
                    <?php if (!empty($settings['img_one']['url'])) : ?>
                        <div class="about-mask-bg-wrap about-mask-bg-wrap-1 mb-4 mb-lg-0">
                            <img class="shape-image-sm top_image_bounce" src="<?php echo esc_url($settings['layout_three_shape_one']['url']); ?>" alt="img">
                            <img class="shape-image" src="<?php echo esc_url($settings['layout_three_shape_two']['url']); ?>" alt="img">
                            <div class="thumb">
                                <img src="<?php echo esc_url($settings['img_one']['url']); ?>" alt="img">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- skill area end -->
<?php endif; ?>