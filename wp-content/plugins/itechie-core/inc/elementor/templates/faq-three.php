<?php if ('layout_three' == $settings['layout_type']) : ?>
    <div class="accordion" id="accordionExample">
        <?php if (is_array($settings['faq_list'])) : ?>
            <?php $i = 1;
            foreach ($settings['faq_list'] as $item) : ?>
                <div class="accordion-item single-accordion-inner">
                    <h2 class="accordion-header" id="headingOne<?php echo esc_attr($i); ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($i); ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr($i); ?>">
                            <?php echo esc_html($item['question']); ?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo esc_attr($i); ?>" class="accordion-collapse collapse <?php echo esc_attr(($i == 1 ? 'show' : '')); ?>" aria-labelledby="headingOne<?php echo esc_attr($i); ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo esc_html($item['answer']); ?>
                        </div>
                    </div>
                </div>
            <?php $i++;
            endforeach; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>