<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- service area start -->
    <div class="service-area ">
        <div class="container">
            <div class="row">
                <?php
                if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $service_meta = get_post_meta(get_the_ID(), 'itechie_service_meta', true);
                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service-inner style-hover-base text-center">
                                <div class="icon-box">
                                    <i class="<?php echo esc_attr($service_meta['icon']); ?>"></i>
                                </div>
                                <div class="details">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php echo wp_kses(itechie_excerpt($settings['word_limit']['size']), 'itechie_allowed_tags'); ?></p>
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