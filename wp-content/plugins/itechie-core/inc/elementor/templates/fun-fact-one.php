<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- counter area start -->
    <div class="counter-area bg-base pt-5 pb-3">
        <div class="container">
            <div class="row">
                <?php foreach ($settings['funfact_list'] as $item) : ?>
                    <div class="col-md-3">
                        <div class="single-exp-inner style-white">
                            <h2><span class="counter"><?php echo esc_html($item['number']); ?></span> <sub><?php echo esc_html($item['sign']); ?></sub></h2>
                            <h5><?php echo esc_html($item['title']); ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!-- counter area end -->
<?php endif; ?>