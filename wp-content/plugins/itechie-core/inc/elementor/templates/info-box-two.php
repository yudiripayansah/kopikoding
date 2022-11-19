<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="team-area info-box-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div class="section-title text-center">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title double-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php if (is_array($settings['layout_two_infobox'])) : ?>
                    <?php foreach ($settings['layout_two_infobox'] as $item) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-contact-inner text-center">
                                 <div class="icon-box">
                                    <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                </div>
                                <div class="details-wrap">
                                    <div class="details-inner">
                                        <h3><?php echo esc_html($item['title']); ?></h3>
                                        <p><?php echo wp_kses($item['content'], 'itechie_core_allowed_tags');  ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>