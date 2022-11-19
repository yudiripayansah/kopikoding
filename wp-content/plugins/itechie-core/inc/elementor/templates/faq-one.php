<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- faq area start -->
    <div class="faq-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 order-lg-last mb-4 mb-lg-0">
                    <?php if (!empty($settings['image']['url'])) : ?>
                        <div class="faq-image-wrap">
                            <div class="thumb">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image']['id'])); ?>">
                                <img class="img-position-1" src="<?php echo esc_url($settings['image_shape']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image_shape']['id'])); ?>">
                                <img class="img-position-2 top_image_bounce" src="<?php echo esc_url($settings['image_shape_two']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image_shape_two']['id'])); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 pe-xl-5 order-lg-first align-self-center">
                    <div class="section-title mb-0">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title right-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (is_array($settings['faq_list'])) : ?>
                        <div class="accordion mt-4" id="accordionExample">
                            <?php $i = 1;
                            foreach ($settings['faq_list'] as $item) : ?>
                                <div class="accordion-item single-accordion-inner">
                                    <h2 class="accordion-header" id="heading<?php echo esc_attr($i); ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($i); ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr($i); ?>">
                                            <?php echo esc_html($item['question']); ?>
                                        </button>
                                    </h2>
                                    <div id="collapse<?php echo esc_attr($i); ?>" class="accordion-collapse collapse <?php echo esc_attr(($i == 1 ? 'show' : '')); ?>" aria-labelledby="heading<?php echo esc_attr($i); ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo esc_html($item['answer']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;
                            endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- faq area end -->
<?php endif; ?>