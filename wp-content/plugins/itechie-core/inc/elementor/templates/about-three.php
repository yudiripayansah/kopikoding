<?php if ('layout_three' == $settings['layout_type']) : ?>
    <div class="about-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php if (!empty($settings['image']['url'])) : ?>
                        <div class="mask-bg-wrap mask-bg-img-3">
                            <div class="thumb">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image']['id'])); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="section-title px-lg-5 mb-0">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title right-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo wp_kses($settings['title'], 'itechie_core_allowed_tags');  ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content-strong mt-2"><?php echo wp_kses($settings['summary'], 'itechie_core_allowed_tags');  ?></p>
                        <?php endif; ?>
                        <?php if (is_array($settings['tab'])) : ?>
                            <ul class="nav nav-tabs tab-button-style mt-4" id="myTab" role="tablist">
                                <?php $i = 1;
                                foreach ($settings['tab'] as $tab) : ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo esc_attr($i == 1 ? 'active' : ''); ?>" id="home-tab<?php echo esc_attr($i); ?>" data-bs-toggle="tab" data-bs-target="#home<?php echo esc_attr($i); ?>" type="button" role="tab" aria-controls="home<?php echo esc_attr($i); ?>" aria-selected="true"><?php echo esc_html($tab['title']); ?></button>
                                    </li>
                                <?php $i++;
                                endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (is_array($settings['tab'])) : ?>
                            <div class="tab-content" id="myTabContent">
                                <?php $i = 1;
                                foreach ($settings['tab'] as $tab) : ?>
                                    <div class="tab-pane fade <?php echo esc_attr($i == 1  ? 'show active' : ''); ?>" id="home<?php echo esc_attr($i); ?>" role="tabpanel" aria-labelledby="home-tab<?php echo esc_attr($i); ?>">
                                        <p class="content mt-4"><?php echo wp_kses($tab['summary'], 'itechie_core_allowed_tags');  ?></p>
                                        <div class="list-wrap">
                                            <div class="row">
                                                <?php echo wp_kses_post($tab['content']);  ?>
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
    </div>

<?php endif; ?>