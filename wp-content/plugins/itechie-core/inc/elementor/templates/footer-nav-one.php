<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="footer-area-inner">
        <div class="widget widget_nav_menu">
            <h4 class="widget-title"><?php echo esc_html($settings['title']); ?></h4>
            <?php wp_nav_menu(array(
                'menu' => $settings['nav_menu'],
                'container'  => ''
            )); ?>
        </div>
    </div>
<?php endif; ?>