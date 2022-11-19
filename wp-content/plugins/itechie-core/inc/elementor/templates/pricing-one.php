<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- pricing area start -->
    <div class="pricing-area">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-xl-6">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title right-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content mt-2"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($settings['button_label'])) : ?>
                        <div class="col-xl-6 align-self-center">
                            <div class="btn-wrap text-lg-end mt-4 mt-lg-0">
                                <a class="btn btn-border-base" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $pricing_meta = get_post_meta(get_the_ID(), 'itechie_pricing_meta', true);
                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-pricing-inner style-1">
                                <div class="header">
                                    <h3 class="text-center"><?php the_title(); ?></h3>
                                    <div class="price">
                                        <sup><?php echo esc_html($pricing_meta['currency']); ?></sup>
                                        <h2 class="d-inline-block"><?php echo esc_html($pricing_meta['renewal_fee']); ?></h2>
                                        <sub><?php echo esc_html($pricing_meta['tag_line']); ?></sub>
                                    </div>
                                </div>
                                <?php if (is_array($pricing_meta['features'])) : ?>
                                    <div class="details">
                                        <ul class="single-list-inner">
                                            <?php foreach ($pricing_meta['features'] as $item) : ?>
                                                <li class="<?php echo esc_attr(($item['activity'] == 1 ? 'open' : 'close')); ?>"><?php echo esc_html($item['features']); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php if (!empty($pricing_meta['button_label'])) : ?>
                                            <a class="btn btn-black w-100" href="<?php echo esc_url($pricing_meta['button_url']); ?>"><?php echo esc_html($pricing_meta['button_label']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <!-- pricing area end -->
<?php endif; ?>