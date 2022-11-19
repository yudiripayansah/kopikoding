<?php
//team details
get_header();
$project_meta = get_post_meta(get_the_ID(), 'itechie_project_meta', true);
$project_footer_meta = get_post_meta(get_the_ID(), 'itechie_footer_meta', true);
?>

<!-- service details page start -->
<div class="blog-area pd-top-120 pd-bottom-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 order-lg-last">
                <div class="project-sitebar mb-4 mb-lg-0">
                    <?php if (isset($project_meta['project_info']) &&  is_array($project_meta['project_info'])) : ?>
                        <div class="widget-project-info">
                            <ul>
                                <?php foreach ($project_meta['project_info'] as $item) : ?>
                                    <li>
                                        <h6><?php echo esc_html($item['title']); ?></h6>
                                        <p><?php echo esc_html($item['content']); ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8 order-lg-first">
                <div class="blog-details-page-content">
                    <div class="single-blog-inner">
                        <div class="thumb">
                            <?php the_post_thumbnail('itechie_project_details__756X305'); ?>
                        </div>
                        <div class="details">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service details page end -->
<?php
if (isset($project_footer_meta['enable_footer_builder'])) :
    require_once ITECHIE_CORE_ROOT_PATH . '/post-templates/custom-footer.php';
else :
    get_footer();
endif;

?>