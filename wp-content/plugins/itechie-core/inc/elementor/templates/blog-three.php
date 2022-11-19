<?php if ('layout_three' == $settings['layout_type']) : ?>

    <div class="container">
        <div class="row">
            <?php while ($posts_query->have_posts()) :
                $posts_query->the_post();
                $category =  get_the_terms(get_the_iD(), 'category');
            ?>
                <div class="col-lg-6 col-md-6">
                    <div class="single-blog-inner style-4">
                        <div class="thumb">
                            <?php the_post_thumbnail('itechie_blog__360X254'); ?>
                            <div class="date">
                                <?php the_time('d'); ?> <br> <span><?php the_time('M'); ?> </span>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p><?php echo wp_kses(itechie_excerpt($settings['word_limit']['size']), 'itechie_allowed_tags'); ?></p>
                        </div>
                        <div class="bottom">
                            <div class="row">
                                <div class="col-9">
                                    <ul class="blog-meta mb-0">
                                        <li><?php itechie_posted_by(); ?></li>
                                        <li><i class="far fa-comment"></i><?php comments_popup_link(); ?></li>
                                    </ul>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="share-area-wrap">
                                        <div class="share-wrap">
                                            <i class="fa fa-share-alt"></i>
                                        </div>
                                        <?php itechie_core__blog_addon_social_icon(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>

<?php endif; ?>