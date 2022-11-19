<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="footer-area-inner">
        <div class="widget widget_about">
            <?php if (!empty($settings['title'])) : ?>
                <h4 class="widget-title"><?php echo esc_html($settings['title']); ?></h4>
            <?php endif; ?>
            <div class="details">
                <?php echo wp_kses($settings['content'], 'itechie_core_allowed_tags'); ?>
                <?php if (is_array($settings['social_icon'])) : ?>
                    <ul class="social-media">
                        <?php foreach ($settings['social_icon'] as $item) : ?>
                            <li>
                                <a style="color:<?php echo esc_attr($item['icon_color']); ?>;border-color:<?php echo esc_attr($item['icon_color']); ?>" href="<?php echo esc_url($item['url']['url']); ?>">
                                    <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>