<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- pricing area start -->
    <div class="pricing-area half-bg-top pd-top-115 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title style-white text-center">
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
                <?php
                if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $pricing_meta = get_post_meta(get_the_ID(), 'itechie_pricing_meta', true);
                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-pricing-inner style-3 text-center">
                                <div class="icon-wrap text-center">
                                    <i class="<?php echo esc_attr($pricing_meta['price_icon']); ?>"></i>
                                </div>
                                <div class="header">
                                    <h3 class="text-center"><?php the_title(); ?></h3>
                                    <div class="price">
                                        <sup><?php echo esc_html($pricing_meta['currency']); ?></sup>
                                        <h2 class="d-inline-block"><?php echo esc_html($pricing_meta['renewal_fee']); ?></h2>
                                        <?php if (!empty($pricing_meta['price_plan'])) : ?>
                                            <sub> <?php echo esc_html($pricing_meta['price_plan']); ?></sub>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="details">
                                    <?php if (is_array($pricing_meta['features'])) : ?>
                                        <ul class="single-list-inner">
                                            <?php foreach ($pricing_meta['features'] as $item) : ?>
                                                <li class="<?php echo esc_attr(($item['activity'] == 1 ? 'open' : 'close')); ?>"><?php echo esc_html($item['features']); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if (!empty($pricing_meta['button_label'])) : ?>
                                        <a class="btn btn-black" href="<?php echo esc_url($pricing_meta['button_url']); ?>"><?php echo esc_html($pricing_meta['button_label']); ?></a>
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