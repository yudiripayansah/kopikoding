<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9">
                <div class="section-title text-center">
                    <?php if (!empty($settings['sub_title'])) : ?>
                        <h5 class="sub-title double-line"><?php echo esc_html($settings['sub_title']); ?></h5>
                    <?php endif; ?>
                    <?php if (!empty($settings['title'])) : ?>
                        <h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['summary'])) : ?>
                        <p class="content"><?php echo esc_html($settings['summary']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>