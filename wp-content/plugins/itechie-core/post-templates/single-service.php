<?php
//team details
get_header();
$service_meta = get_post_meta(get_the_ID(), 'itechie_service_meta', true);
$project_footer_meta = get_post_meta(get_the_ID(), 'itechie_footer_meta', true);
?>

<!-- project details page start -->
<div class="project-area pd-top-120 pd-bottom-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-page-content">
                    <div class="single-blog-inner">
                        <div class="thumb me-2 mx-2">
                            <?php the_post_thumbnail('itechie_service_750X390'); ?>
                        </div>
                        <div class="details">
                            <?php the_content(); ?>
                            <?php if (!empty($service_meta['features_section_title'])) : ?>
                                <h4 class="pt-4 mb-4"><?php echo esc_html($service_meta['features_section_title']); ?></h4>
                            <?php endif; ?>
                            <?php if (is_array($service_meta['features'])) : ?>
                                <div class="row">
                                    <?php foreach ($service_meta['features'] as $item) :  ?>
                                        <div class="col-md-6">
                                            <div class="media single-choose-inner">
                                                <div class="media-left">
                                                    <div class="icon">
                                                        <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h4><?php echo esc_html($item['title']); ?></h4>
                                                    <p><?php echo esc_html($item['content']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($service_meta['faq_header'])) : ?>
                                <h4><?php echo esc_html($service_meta['faq_header']); ?></h4>
                            <?php endif; ?>
                            <div class="row">
                                <?php if (is_array($service_meta['faq_item'])) : ?>
                                    <div class="<?php echo esc_attr((!empty($service_meta['image']) ? 'col-md-8' : 'col-md-12')); ?>">
                                        <div class="accordion mt-2" id="accordionExample">
                                            <?php $i = 1;
                                            foreach ($service_meta['faq_item'] as $item) :  ?>
                                                <div class="accordion-item single-accordion-inner">
                                                    <h2 class="accordion-header" id="headingOne<?php echo esc_attr($i); ?>">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo esc_attr($i); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo esc_attr($i); ?>">
                                                            <?php echo esc_html($item['question']); ?>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne<?php echo esc_attr($i); ?>" class="accordion-collapse collapse <?php echo esc_attr(($i == 1 ? 'show' : '')); ?>" aria-labelledby="headingOne<?php echo esc_attr($i); ?>" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <?php echo esc_html($item['answer']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $i++;
                                            endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($service_meta['image'])) : ?>
                                    <div class="col-md-4 align-self-center mt-4 mt-lg-0">
                                        <div class="thumb image-hover-animate border-radius-5">
                                            <img src="<?php echo esc_url($service_meta['image']); ?>" alt="img">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="td-service-sidebar">
                    <?php dynamic_sidebar('service'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- project details page end -->
<?php
if (isset($project_footer_meta['enable_footer_builder'])) :
    require_once ITECHIE_CORE_ROOT_PATH . '/post-templates/custom-footer.php';
else :
    get_footer();
endif;

?>