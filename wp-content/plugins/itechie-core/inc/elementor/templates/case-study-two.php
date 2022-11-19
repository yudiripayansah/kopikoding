<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- project area start -->
    <div class="project-area half-bg-top pd-top-115">
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
            <div class="project-slider slider-control-round owl-carousel">
                <?php
                if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $category =  get_the_terms(get_the_ID(), 'project_cat');
                        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false, '');

                ?>
                        <div class="item">
                            <div class="single-project-inner">
                                <div class="thumb">
                                    <a class="icon swp-readmore-arrow swp-image-popup" href="<?php echo esc_url($img_src[0]); ?>">
                                        <i class="icomoon-link"></i>
                                    </a>
                                    <?php the_post_thumbnail('itechie_project__362X410'); ?>
                                </div>
                                <div class="details-wrap">
                                    <div class="details-inner">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p><?php echo wp_kses(itechie_excerpt($settings['word_limit']['size']), 'itechie_allowed_tags'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <!-- project area end -->
<?php endif; ?>