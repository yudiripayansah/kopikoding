<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="single-service-inner text-center">
        <div class="icon-box-bg">
            <i class="<?php echo esc_attr($settings['icon']['value']); ?>"></i>
        </div>
        <div class="details">
            <h4><?php echo esc_html($settings['title']); ?></h4>
            <p><?php echo esc_html($settings['summary']); ?></p>
        </div>
    </div>
<?php endif; ?>