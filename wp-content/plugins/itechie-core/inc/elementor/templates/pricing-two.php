<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- pricing area start -->
    <div class="pricing-area pd-top-115 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9">
                    <div class="section-title text-center">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title double-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content mt-2"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $pricing_meta = get_post_meta(get_the_ID(), 'itechie_pricing_meta', true);
                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-pricing-inner style-2">
                                <div class="header text-center">
                                    <h3><?php the_title(); ?></h3>
                                    <div class="price">
                                        <sup><?php echo esc_html($pricing_meta['currency']); ?></sup>
                                        <h2 class="d-inline-block"><?php echo esc_html($pricing_meta['renewal_fee']); ?></h2>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4><?php echo esc_html($pricing_meta['tag_line']); ?></h4>
                                    <?php if (is_array($pricing_meta['features'])) : ?>
                                        <ul class="single-list-inner style-check">
                                            <?php foreach ($pricing_meta['features'] as $item) : ?>
                                                <li class="<?php echo esc_attr(($item['activity'] == 1 ? 'open' : 'close')); ?>"><i class="<?php echo esc_attr(($item['activity'] == 1 ? 'icomoon-check-mark' : 'icomoon-close')); ?>"></i><?php echo esc_html($item['features']); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if (!empty($pricing_meta['button_label'])) : ?>
                                        <div class="btn-wrap text-center">
                                            <a class="btn btn-black" href="<?php echo esc_url($pricing_meta['button_url']); ?>"><?php echo esc_html($pricing_meta['button_label']); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <!-- pricing area end -->
<?php endif; ?>