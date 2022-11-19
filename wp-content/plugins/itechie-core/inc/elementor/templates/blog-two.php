<?php if ('layout_two' == $settings['layout_type']) : ?>

    <div class="blog-area pd-top-115 pd-bottom-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10">
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
                <?php while ($posts_query->have_posts()) :
                    $posts_query->the_post();
                    $category =  get_the_terms(get_the_ID(), 'category');
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-inner style-2">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="thumb">
                                    <?php the_post_thumbnail('itechie_blog__360X308'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="details">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <ul class="blog-meta">
                                    <li><?php itechie_posted_by(); ?></li>
                                    <li><?php itechie_posted_on(); ?></li>
                                </ul>
                                <p><?php echo wp_kses(itechie_excerpt($settings['word_limit']['size']), 'itechie_allowed_tags'); ?></p>
                                <a class="read-more-text" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', 'itechie-core'); ?><i aria-hidden="true" class=" icomoon-next"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            </div>
        </div>
    </div>

<?php endif; ?>