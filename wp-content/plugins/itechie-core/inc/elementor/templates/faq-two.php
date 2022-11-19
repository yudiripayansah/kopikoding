<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- faq area start -->
    <div class="faq-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pe-xl-5 align-self-center">
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
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="consulting-contact-form mx-lg-4">
                        <?php if (!empty($settings['layout_two_title'])) : ?>
                            <h3 class="mb-3"><?php echo esc_html($settings['layout_two_title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['contact_shortcode'])) : ?>
                            <?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_shortcode'] . '" ]'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq area end -->
<?php endif; ?>