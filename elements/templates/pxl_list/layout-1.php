<?php if (isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): ?>
    <div class="pxl-list pxl-list1 <?php echo esc_attr($settings['hozirontal_alignment'] == 'true' ? 'pxl-list-hozirontal' : ''); ?> <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($settings['lists'] as $key => $value): ?>
            <div class="pxl-item">
                <?php if ($settings['style'] == 'numbered') : ?>
                    <div class="pxl-item--numbered">
                        <?php echo pxl_print_html($key + 1); ?><?php echo esc_html('.', 'northway'); ?>
                    </div>
                <?php else: ?>
                    <?php if (!empty($settings['pxl_icon']['value'])) : ?>
                        <div class="pxl-item--icon">
                            <?php \Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!empty($value['content'])) : ?>
                    <div class="pxl-item--content">
                        <label class="pxl-empty"><?php echo pxl_print_html($value['label']); ?></label>
                        <?php echo pxl_print_html($value['content']) ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>