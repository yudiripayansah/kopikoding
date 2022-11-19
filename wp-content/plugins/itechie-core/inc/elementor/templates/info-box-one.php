<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- intro area start -->
    <div class="intro-area mg-top--100 bg-relative">
        <div class="container">
            <div class="row justify-content-center">
                <?php if (is_array($settings['infobox'])) : ?>
                    <?php foreach ($settings['infobox'] as $item) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-intro-inner">
                                <div class="thumb media">
                                    <div class="media-left">
                                        <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h4><?php echo esc_html($item['title']) ?></h4>
                                    </div>
                                </div>
                                <div class="details">
                                    <p><?php echo wp_kses($item['content'], 'itechie_core_allowed_tags');  ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- intro area end -->
<?php endif; ?>