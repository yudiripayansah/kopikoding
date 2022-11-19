<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- client-area area start -->
    <div class="client-area-area bg-sky pt-5 pb-5">
        <div class="container">
            <div class="client-slider owl-carousel">
                <?php foreach ($settings['sponsor'] as $item) : ?>
                    <div class="item">
                        <div class="thumb text-center">
                            <?php if (!empty($item['Url']['url'])) : ?>
                                <a href="<?php echo esc_url($item['Url']['url']); ?>">
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id'])); ?>">
                                </a>
                            <?php else : ?>
                                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id'])); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- client-area area end -->
<?php endif; ?>