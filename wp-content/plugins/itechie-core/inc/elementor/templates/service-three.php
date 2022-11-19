<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- service area start -->
    <div class="service-area bg-relative">
        <?php if (!empty($settings['top_shape_one']['url'])) : ?>
            <img class="shape-left-top top_image_bounce" src="<?php echo esc_url($settings['top_shape_one']['url']); ?>" alt="<?php echo esc_attr($settings['top_shape_one']['id']); ?>">
        <?php endif; ?>
        <?php if (!empty($settings['top_shape_two']['url'])) : ?>
            <img class="shape-right-top top_image_bounce" src="<?php echo esc_url($settings['top_shape_two']['url']); ?>" alt="<?php echo esc_attr($settings['top_shape_two']['id']); ?>">
        <?php endif; ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
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
                <?php
                if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $service_meta = get_post_meta(get_the_ID(), 'itechie_service_meta', true);
                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service-inner style-2 text-center" style="background-image: url(<?php echo esc_url($settings['service_shape']['url']); ?>);">
                                <div class="icon-box">
                                    <i class="<?php echo esc_attr($service_meta['icon']); ?>"></i>
                                </div>
                                <div class="details">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php echo wp_kses(itechie_excerpt($settings['word_limit']['size']), 'itechie_allowed_tags'); ?></p>
                                    <a class="read-more-btn" href="<?php the_permalink(); ?>"><i class="fa fa-arrow-right"></i></a>
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