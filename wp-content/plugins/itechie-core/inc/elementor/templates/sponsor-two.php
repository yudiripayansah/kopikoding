<?php if ('layout_two' == $settings['layout_type']) : ?>
    <div class="client-area-area bg-base pt-5 pb-5">
        <div class="container">
            <div class="client-slider owl-carousel">
                <?php foreach ($settings['sponsor'] as $item) : ?>
                    <div class="item">
                        <div class="thumb text-center">
                            <?php if (!empty($item['Url']['url'])) : ?>
                                <a href="<?php echo esc_url($item['Url']['url']); ?>">
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_post_thumbnail($item['image']['id'])); ?>">
                                </a>
                            <?php else : ?>
                                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_post_thumbnail($item['image']['id'])); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>