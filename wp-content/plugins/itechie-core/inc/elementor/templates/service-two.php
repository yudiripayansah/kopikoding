<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- service area start -->
    <div class="service-area ">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 mb-4 mb-lg-0">
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
                        <div class="col-xl-6 col-lg-5 align-self-center">
                            <div class="btn-wrap text-md-end">
                                <a class="btn btn-base" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <?php
                if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $service_meta = get_post_meta(get_the_ID(), 'itechie_service_meta', true);
                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service-inner style-hover-2 text-center">
                                <div class="icon-box-bg">
                                    <i class="<?php echo esc_attr($service_meta['icon']); ?>"></i>
                                </div>
                                <div class="details">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo wp_kses(itechie_excerpt($settings['word_limit']['size']), 'itechie_allowed_tags'); ?></p>
                                </div>
                                <div class="details-hover-wrap">
                                    <div class="details-hover">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php echo wp_kses(itechie_excerpt($settings['word_limit']['size']), 'itechie_allowed_tags'); ?></p>
                                        <a class="btn btn-base btn-small" href="<?php the_permalink(); ?>"><?php esc_html_e('View Details', 'itechie-core'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <!-- service area end -->
<?php endif; ?>