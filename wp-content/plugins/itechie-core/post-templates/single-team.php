<?php
//team details
get_header();
$team_meta = get_post_meta(get_the_ID(), 'itechie_team_meta', true);
$project_footer_meta = get_post_meta(get_the_ID(), 'itechie_footer_meta', true);
?>

<!-- team details page start -->
<div class="team-details-page pd-top-120 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="thumb image-hover-animate me-lg-5">
                    <?php the_post_thumbnail('itechie_team_524X462'); ?>
                </div>
            </div>
            <div class="col-lg-6 col-12 align-self-center">
                <div class="team-details-info">
                    <h3><?php the_title(); ?></h3>
                    <p class="designation"><?php echo esc_html($team_meta['designation']); ?></p>
                    <p class="content"><?php echo esc_html($team_meta['about']); ?></p>
                    <?php if (is_array($team_meta['more_info'])) : ?>
                        <ul class="details-info">
                            <?php foreach ($team_meta['more_info'] as $item) : ?>
                                <li><strong><?php echo esc_html($item['title']); ?> </strong> <?php echo esc_html($item['content']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (is_array($team_meta['social_profile'])) : ?>
                        <ul class="social-media">
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
        <div class="row mt-5 pd-bottom-90">
            <div class="col-lg-6">
                <div class="single-skill-inner bg-sky mb-4 mb-lg-0">
                    <h3><?php echo esc_html($team_meta['experience_header']); ?></h3>
                    <?php if (is_array($team_meta['experience_content'])) : ?>
                        <?php
                        $experience_content = $team_meta['experience_content'];
                        foreach ($experience_content as $item) : ?>
                            <div class="skill-list <?php echo esc_attr(($item == end($experience_content) ? ' mb-0' : '')); ?>">
                                <h6><?php echo esc_html($item['title']); ?></h6>
                                <span><?php echo esc_html($item['year']); ?></span>
                                <p><?php echo wp_kses($item['content'], 'itechie_core_allowed_tags');  ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-lg-6">
                <?php if (is_array($team_meta['skill_item'])) : ?>
                    <div class="single-skill-inner bg-sky">
                        <h3><?php echo esc_html($team_meta['skill_title']); ?></h3>
                        <div class="skill-progress-area mt-4">
                            <?php $i = 1;
                            foreach ($team_meta['skill_item'] as $item) : ?>
                                <div class="single-progressbar">
                                    <h6><?php echo esc_html($item['title']); ?></h6>
                                    <div class="progress-item" id="progress-running">
                                        <div class="progress-bg">
                                            <div id="progress<?php echo esc_attr($i); ?>" class="progress-rate" data-value="<?php echo esc_attr($item['percentage']); ?>">
                                            </div>
                                            <div class="progress-count-wrap">
                                                <span class="progress-count counting" data-count="<?php echo esc_attr($item['percentage']); ?>">0</span>
                                                <span class="counting-icons">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;
                            endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- team details page end -->
<?php
if (isset($project_footer_meta['enable_footer_builder'])) :
    require_once ITECHIE_CORE_ROOT_PATH . '/post-templates/custom-footer.php';
else :
    get_footer();
endif;


?>