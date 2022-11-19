<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="client-slider pd-top-90 pd-bottom-115 owl-carousel">
                <?php foreach ($settings['sponsor'] as $item) : ?>
                    <div class="item">
                        <div class="thumb text-center">
                            <?php if (!empty($item['Url']['url'])) : ?>
                                <a href="<?php echo esc_url($item['Url']['url']); ?>">
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id']));
                                                                                                    ?>">
                                </a>
                            <?php else : ?>
                                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(itechie_core_get_thumbnail_alt($item['image']['id']));
                                                                                                ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>