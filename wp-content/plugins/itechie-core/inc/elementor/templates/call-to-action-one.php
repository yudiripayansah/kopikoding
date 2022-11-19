<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="call-to-action-area pd-top-115 pd-bottom-120 text-center bg-overlay-base" style="background-image: url('<?php echo esc_url($settings['bg_image']['url']); ?>');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="single-call-to-action-inner style-white">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5><?php echo wp_kses($settings['sub_title'], 'itechie_core_allowed_tags');  ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['button_label'])) : ?>
                            <a class="btn btn-black mt-3" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>