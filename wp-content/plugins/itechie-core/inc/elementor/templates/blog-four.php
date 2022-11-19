<?php if ('layout_four' == $settings['layout_type']) : ?>

    <div class="widget widget-recent-post pe-lg-5">
        <ul>
            <?php while ($posts_query->have_posts()) :
                $posts_query->the_post();
            ?>
                <li>
                    <div class="media">
                        <div class="media-left">
                            <?php the_post_thumbnail('itechie_blog__80X80'); ?>
                        </div>
                        <div class="media-body align-self-center">
                            <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                            <div class="post-info"><span class="me-2 d-inline-block"><?php echo esc_html__('Post by ', 'itechie-core'); ?><?php the_author(); ?></span><span><?php the_time(' d M Y'); ?></span></div>
                        </div>
                    </div>
                </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>

<?php endif; ?>