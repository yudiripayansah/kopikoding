<?php if ('layout_four' == $settings['layout_type']) : ?>

    <!-- about area start -->
    <div class="about-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-9 mb-5 mb-lg-0">
                    <div class="about-mask-bg-wrap about-mask-bg-wrap-4">
                        <?php if (!empty($settings['image']['url'])) : ?>
                            <?php if (!empty($settings['image_shape']['url'])) : ?>
                                <img class="shape-image-sm top_image_bounce" src="<?php echo esc_url($settings['image_shape']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image_shape']['id'])); ?>">
                            <?php endif; ?>
                            <?php if (!empty($settings['image_shape_two']['url'])) : ?>
                                <img class="shape-image" src="<?php echo esc_url($settings['image_shape_two']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image_shape_two']['id'])); ?>">
                            <?php endif; ?>
                            <div class="thumb">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image']['id'])); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="section-title px-lg-5 mb-0">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title right-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['highlight_text'])) : ?>
                            <p class="content-strong mt-3"><?php echo wp_kses($settings['highlight_text'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                        <?php if (is_array($settings['checklist'])) : ?>
                            <ul class="single-list-inner style-check mt-3">
                                <?php foreach ($settings['checklist'] as $list) : ?>
                                    <li><i class="fa fa-check"></i><?php echo esc_html($list['text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (!empty($settings['button_label'])) : ?>
                            <div class="btn-wrap mt-4">
                                <a class="btn btn-base" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

<?php endif; ?>