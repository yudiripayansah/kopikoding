<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- counter area start -->
    <div class="counter-area bg-overlay-black pd-top-115 pd-bottom-90 video-two" style="background-image: url(<?php echo esc_url($settings['bg_image']['url']);  ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="section-title style-white">
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($settings['video_url'])) : ?>
                    <div class="col-md">
                        <a class="video-play-btn mb-5 mb-md-0 video-play-btn-base" href="<?php echo esc_url($settings['video_url']); ?>" data-effect="mfp-zoom-in"><i class="fa fa-play"></i></a>
                    </div>
                <?php endif; ?>
                <?php if (is_array($settings['funfacts'])) : ?>
                    <?php foreach ($settings['funfacts'] as $item) : ?>
                        <div class="col-md">
                            <div class="single-exp-inner style-white">
                                <h2><span class="counter"><?php echo esc_html($item['number']); ?></span> <sub><?php echo esc_html($item['sign']); ?></sub></h2>
                                <h5><?php echo esc_html($item['title']); ?></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- counter area end -->
<?php endif; ?>