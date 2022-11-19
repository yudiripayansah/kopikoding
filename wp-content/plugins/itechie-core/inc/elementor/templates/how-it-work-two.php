<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- how it work area start -->
    <div class="how-it-work-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title double-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo esc_html($settings['summary']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (is_array($settings['layout_two_items'])) : ?>
                <div class="how-it-work-inner">
                    <?php if (!empty($settings['shape_image']['url'])) : ?>
                        <img class="hills-line" src="<?php echo esc_url($settings['shape_image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['shape_image']['id'])); ?>">
                    <?php endif; ?>
                    <div class="row">
                        <?php foreach ($settings['layout_two_items'] as $item) : ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-work-inner style-three text-center">
                                    <div class="count-inner">
                                        <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                    </div>
                                    <div class="details-wrap">
                                        <div class="details-inner">
                                            <h4><?php echo esc_html($item['title']); ?></h4>
                                            <p><?php echo esc_html($item['text']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>