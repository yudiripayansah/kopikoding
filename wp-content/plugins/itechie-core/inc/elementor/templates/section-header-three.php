<?php if ('layout_three' == $settings['layout_type']) : ?>
    <div class="container">
        <div class="section-title">
            <div class="row">
                <div class="col-lg-7">
                    <?php if (!empty($settings['sub_title'])) : ?>
                        <h5 class="sub-title right-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                    <?php endif; ?>
                    <?php if (!empty($settings['title'])) : ?>
                        <h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['summary'])) : ?>
                        <p class="content mt-2"><?php echo esc_html($settings['summary']); ?></p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['button_label'])) : ?>
                    <div class="col-lg-5 align-self-center">
                        <div class="btn-wrap text-lg-end mt-4 mt-lg-0">
                            <a class="btn btn-base" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>