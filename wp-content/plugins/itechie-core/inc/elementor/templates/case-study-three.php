<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- project area start -->
    <section class="project-area pd-top-115 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9">

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
                <div class="col-lg-8">
                    <div class="isotope-filters project-isotope-btn style-white text-center mb-5">
                        <button class="button active ml-0" data-filter="*"> <?php echo esc_html__('All Items', 'itechie-core'); ?></button>
                        <?php
                        if (is_array($settings['select_cat'])) :
                            foreach ($settings['select_cat'] as $term) :
                        ?>
                                <button class="button" data-filter=".<?php echo strtolower(preg_replace('/[^a-zA-Z]+/', '-', $term)); ?>"><?php echo esc_html(itechie_core_get_project_cat_name($term)); ?></button>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php
                            $taxonomy = 'prjoect_cat';
                            $terms = get_terms($taxonomy); // Get all terms of a taxonomy
                            if ($terms && !is_wp_error($terms)) :
                                foreach ($terms as $term) : ?>
                                    <button class="button" data-filter=".<?php echo strtolower(preg_replace('/[^a-zA-Z]+/', '-', $term->slug)); ?>"><?php echo esc_html($term->name); ?></button>
                                <?php endforeach; ?>
                        <?php endif;
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="all-item-section">
                <div class="project-isotope row">
                    <div class="item-sizer col-1"></div>
                    <?php

                    $i = 1;
                    $args = array(
                        'post_type'      => 'project',
                        'post_status'    => 'publish',
                        'posts_per_page' => $settings['post_count']['size'],
                    );

                    $args['orderby'] = $settings['orderby'];
                    $args['order']   = $settings['order'];

                    if (!empty($settings['select_cat'])) {
                        $args['tax_query'][] = array(
                            'taxonomy' => 'project_cat',
                            'field'    => 'slug',
                            'terms'    => array_values($settings['select_cat'])
                        );
                    }

                    $query = new \WP_Query($args);
                    if ($query->have_posts()) :

                        while ($query->have_posts()) :

                            $query->the_post();
                            $terms = get_the_terms(get_the_ID(), 'project_cat');
                    ?>
                            <!-- gallery item start here -->
                            <div class="all-isotope-item col-lg-4 col-sm-6 <?php foreach ($terms as $term) {
                                                                                echo strtolower(preg_replace('/[^a-zA-Z]+/', '-', $term->slug)) . ' ';
                                                                            } ?>">
                                <div class="single-project-inner style-two">
                                    <div class="thumb">
                                        <?php if ($i == 2 || $i == 4) : ?>
                                            <?php the_post_thumbnail('itechie_project__362X262'); ?>
                                        <?php else : ?>
                                            <?php the_post_thumbnail('itechie_project__360X554'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="details-wrap">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <?php if (!empty($terms[0]->name)) : ?>
                                            <a href="<?php echo esc_url(get_category_link($terms[0]->term_id)); ?>"><?php echo esc_html($terms[0]->name); ?><i class="fas fa-arrow-right"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                    <?php if ($i == 5) {
                                $i = 1;
                            }
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- project area end -->
<?php endif; ?>