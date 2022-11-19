<?php if ('layout_three' == $settings['layout_type']) : ?>
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
            <div class="how-it-work-inner arrow-line">
                <div class="row">
                    <?php if (is_array($settings['items'])) : ?>
                        <?php foreach ($settings['items'] as $item) : ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-work-inner style-four text-center">
                                    <div class="count-wrap pb-2">
                                        <div class="count-inner">
                                            <h2><?php echo esc_attr($item['number']); ?></h2>
                                        </div>
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
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>