<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- team area start -->
    <div class="team-area ">
        <div class="container">
            <?php if (!empty($settings['sub_title'] || $settings['title'] || $settings['summary'])) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
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
            <?php endif; ?>
            <div class="row">
                <?php
                if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $team_meta = get_post_meta(get_the_ID(), 'itechie_team_meta', true);
                ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-team-inner text-center">
                                <div class="thumb">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="details-wrap">
                                    <div class="details-inner">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p><?php echo esc_html($team_meta['designation']); ?></p>
                                    </div>
                                </div>
                                <div class="hover-details-wrap">
                                    <div class="hover-details-inner">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p><?php echo esc_html($team_meta['designation']); ?></p>
                                        <?php if (is_array($team_meta['social_profile'])) : ?>
                                            <ul class="social-media mt-3">
                                                <?php foreach ($team_meta['social_profile'] as $social) : ?>
                                                    <li>
                                                        <a style="color:<?php echo esc_attr($social['color']); ?>;border-color:<?php echo esc_attr($social['color']); ?>" href="<?php echo esc_url($social['link']); ?>">
                                                            <i class="<?php echo esc_attr($social['icon']); ?>"></i>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <!-- team area end -->
<?php endif; ?>