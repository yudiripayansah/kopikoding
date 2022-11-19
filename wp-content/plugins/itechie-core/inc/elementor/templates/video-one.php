<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- video area start -->
    <div class="video-area text-center pd-top-115 pd-bottom-120" style="background-image: url(<?php echo esc_url($settings['bg_image']['url']);  ?>);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="section-title mb-4 style-white">
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['video_url'])) : ?>
                        <a class="video-play-btn video-play-btn-base" href="<?php echo esc_url($settings['video_url']); ?>" data-effect="mfp-zoom-in"><i class="fa fa-play"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- video area end -->
<?php endif; ?>