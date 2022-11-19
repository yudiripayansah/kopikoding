<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- skill area start -->
    <div class="skill-area bg-relative bg-sky pd-top-120 pd-bottom-100">
        <?php if (!empty($settings['bg_shape']['url'])) : ?>
            <img class="half-bg-right" src="<?php echo esc_url($settings['bg_shape']['url']);  ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['bg_shape']['id'])); ?>">
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pe-lg-5 mb-5 mb-lg-0">
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
                                    <div class="progress-item">
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
                <div class="col-lg-6 px-lg-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="thumb border-radius-5 mb-4 mb-md-0 image-hover-animate">
                                <img src="<?php echo esc_url($settings['img_one']['url']);  ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['img_one']['id'])); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumb border-radius-5 mb-4 image-hover-animate">
                                <img src="<?php echo esc_url($settings['img_two']['url']);  ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['img_two']['id'])); ?>">
                            </div>
                            <div class="thumb border-radius-5 image-hover-animate">
                                <img src="<?php echo esc_url($settings['img_three']['url']);  ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['img_three']['id'])); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- skill area end -->
<?php endif; ?>