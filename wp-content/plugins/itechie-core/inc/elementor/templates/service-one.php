<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- service area start -->
    <div class="service-area ">
        <div class="container">
            <div class="row">
                <?php if ('yes'  != $settings['hide_left_content']) : ?>
                    <div class="col-lg-4">
                        <div class="section-title border-radius-5 p-35 bg-base style-white mb-lg-0">

                            <h2 class="title mt-4"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>

                            <?php echo wp_kses($settings['content'], 'itechie_core_allowed_tags');  ?>

                            <div class="btn-wrap mt-4 pt-1 mb-4">
                                <?php if (!empty($settings['button_label'])) : ?>
                                    <a class="btn btn-small btn-border-white me-2" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                                <?php endif; ?>
                                <?php if (!empty($settings['second_button_label'])) : ?>
                                    <a class="btn btn-small btn-black" href="<?php echo esc_url($settings['second_button_url']['url']); ?>"><?php echo esc_html($settings['second_button_label']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="<?php echo esc_attr(($settings['hide_left_content'] == 'yes') ? 'col-lg-12 ' : 'col-lg-8 '); ?>">
                    <div class="row">
                        <?php
                        if ($post_query->have_posts()) :
                            while ($post_query->have_posts()) : $post_query->the_post();
                                $service_meta = get_post_meta(get_the_ID(), 'itechie_service_meta', true);
                        ?>
                                <div class="<?php echo esc_attr(($settings['hide_left_content'] == 'yes') ? 'col-lg-4 ' : 'col-lg-6 '); ?>">
                                    <div class="single-service-inner style-white text-center">
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
        </div>
    </div>
    <!-- service area end -->
<?php endif; ?>