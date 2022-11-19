<?php if ('layout_two' == $settings['layout_type']) : ?>

    <div class="banner-area banner-area-2 bg-relative" style="background-image: url(<?php echo esc_url($settings['banner_image']['url']); ?>);">
        <div class="bg-overlay-gradient"></div>
        <div class="banner-bg-img" style="background-image: url(<?php echo esc_url($settings['bg_shape']['url']); ?>);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-9">
                    <div class="banner-inner">
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
                                <a class="btn btn-black" href="<?php echo esc_url($settings['button_url_two']['url']); ?>"><?php echo esc_html($settings['button_label_two']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner area end -->

<?php endif; ?>