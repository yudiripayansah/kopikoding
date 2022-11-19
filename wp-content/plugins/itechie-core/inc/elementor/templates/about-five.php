<?php if ('layout_five' == $settings['layout_type']) : ?>

    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php if (!empty($settings['image']['url'])) : ?>
                        <div class="mask-bg-wrap mask-bg-img-3">
                            <!-- <img class="shape-image" src="assets/img/about/2.png" alt="img"> -->
                            <div class="thumb">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($settings['image']['id'])); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="section-title px-lg-5 mb-0">
                        <?php if (!empty($settings['sub_title'])) : ?>
                            <h5 class="sub-title left-border"><?php echo esc_html($settings['sub_title']); ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="content-strong mt-3"><?php echo esc_html($settings['summary']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['highlight_text'])) : ?>
                            <p class="content"><?php echo esc_html($settings['highlight_text']); ?></p>
                        <?php endif; ?>
                        <?php if (is_array($settings['checklist'])) : ?>
                            <ul class="single-list-inner style-check mt-3">
                                <?php foreach ($settings['checklist'] as $list) : ?>
                                    <li><i class="fa fa-check"></i><?php echo esc_html($list['text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($settings['button_label'])) : ?>
                            <div class="btn-wrap mt-4">
                                <a class="btn btn-base" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>