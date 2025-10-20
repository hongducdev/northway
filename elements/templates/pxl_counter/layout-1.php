<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'pxl-counter--value '.$settings['effect'].'',
    'data-duration' => $settings['duration'],
    'data-startnumber' => $settings['starting_number'],
    'data-endnumber' => $settings['ending_number'],
    'data-to-value' => $settings['ending_number'],
    'data-delimiter' => $settings['thousand_separator_char'],
] ); ?>
<div class="pxl-counter pxl-counter1 <?php echo esc_attr($settings['pxl_animate'].' '.($settings['style_layout_1'])); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-counter--inner">
        <div class="pxl-counter--number ">
            <?php if(!empty($settings['prefix'])) : ?>
                <span class="pxl-counter--prefix el-empty"><?php echo pxl_print_html($settings['prefix']); ?></span>
            <?php endif; ?>
            <span <?php pxl_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
            <?php if(!empty($settings['suffix_end'])) : ?>
                <span class="pxl-counter--suffix_end"><?php echo pxl_print_html($settings['suffix_end']); ?></span>
            <?php endif; ?>
            <?php if(!empty($settings['suffix'])) : ?>
                <span class="pxl-counter--suffix"><?php echo pxl_print_html($settings['suffix']); ?></span>
            <?php endif; ?>
        </div>
        <?php if(!empty($settings['title'])) : ?>
            <div class="pxl-counter--title"><?php echo pxl_print_html($settings['title']); ?></div>
        <?php endif; ?>
    </div>
</div>