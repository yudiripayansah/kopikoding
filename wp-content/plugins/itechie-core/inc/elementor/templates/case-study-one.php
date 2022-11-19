<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- project area start -->
    <div class="project-area bg-black pd-top-115">
        <?php if (!empty($settings['sub_title'] || $settings['title'] || $settings['summary'])) : ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
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
            </div>
        <?php endif; ?>
        <div class="project-slider-2 slider-control-square owl-carousel">
            <?php
            if ($post_query->have_posts()) :
                while ($post_query->have_posts()) : $post_query->the_post();
                    $category =  get_the_terms(get_the_ID(), 'project_cat');
            ?>
                    <div class="item">
                        <div class="single-project-inner style-two">
                            <div class="thumb">
                                <?php the_post_thumbnail('itechie_project__357X472'); ?>
                            </div>
                            <div class="details-wrap">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php if (!empty($category[0]->name)) : ?>
                                    <a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"><?php echo esc_html($category[0]->name); ?><i class="fas fa-arrow-right"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

            <?php endwhile;
            endif; ?>
        </div>
    </div>
    <!-- project area end -->
<?php endif; ?>