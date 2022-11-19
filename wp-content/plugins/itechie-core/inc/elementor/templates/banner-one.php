<?php if ('layout_one' == $settings['layout_type']) : ?>

    <!-- banner area start -->
    <div class="banner-area banner-area-1 bg-black bg-relative">

        <?php if ('image' == $settings['shape_type']) : ?>
            <div class="banner-bg-img" style="background-image: url(<?php echo esc_url($settings['bg_shape']['url']); ?>);"></div>
        <?php else : ?>
            <div class="banner-bg-img" style="background-image: url(<?php echo esc_url($settings['shape_icon']['value']['url']); ?>);"></div>
        <?php endif; ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7 text-center text-lg-end order-lg-last">
                    <div class="banner-mask-bg-wrap mb-5 mb-lg-0">
                        <?php if (!empty($settings['image_shape']['url'])) : ?>
                            <img class="shape-image" src="<?php echo esc_url($settings['image_shape']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image_shape']['id'])); ?>">
                        <?php endif; ?>
                        <?php if (!empty($settings['banner_image']['url'])) : ?>
                            <div class="thumb">
                                <img src="<?php echo esc_url($settings['banner_image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['banner_image']['id'])); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9 order-lg-first align-self-center">
                    <div class="banner-inner style-white  text-center text-lg-start">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h4 class="sub-title"><?php echo esc_html($settings['sub_title']); ?></h4>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                        <div class="btn-wrap">
                            <?php if (!empty($settings['button_label'])) : ?>
                                <a class="btn btn-base me-2" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                            <?php endif; ?>
                            <?php if (!empty($settings['button_label_two'])) : ?>
                                <a class="btn btn-border-white" href="<?php echo esc_url($settings['button_url_two']['url']); ?>"><?php echo esc_html($settings['button_label_two']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner area end -->

<?php endif; ?>