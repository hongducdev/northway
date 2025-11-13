<?php
$html_id = pxl_get_element_id($settings);
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

$template = (int)$widget->get_setting('popup_template','0');
if($template > 0 ){
    if ( !has_action( 'pxl_anchor_target_page_popup_'.$template) ){
        add_action( 'pxl_anchor_target_page_popup_'.$template, 'northway_hook_anchor_page_popup' );
    } 
}

?>
<?php
// Prepare button classes and variables
$btn_classes = ['btn'];
$btn_style = !empty($settings['btn_style']) ? $settings['btn_style'] : 'btn-default';
$btn_style_for_default = !empty($settings['btn_style_for_default']) ? $settings['btn_style_for_default'] : 'style-1-default';
$btn_style_for_gradient = !empty($settings['btn_style_for_gradient']) ? $settings['btn_style_for_gradient'] : 'style-1-gradient';
$btn_text_effect = !empty($settings['btn_text_effect']) ? $settings['btn_text_effect'] : '';
$btn_w = !empty($settings['btn_w']) ? $settings['btn_w'] : 'inline';
$icon_align = !empty($settings['icon_align']) ? $settings['icon_align'] : 'left';
$pxl_animate = !empty($settings['pxl_animate']) ? $settings['pxl_animate'] : '';
$has_icon = !empty($settings['btn_icon']) && $btn_style != 'btn-no-icon';

$show_icon_left = false;
$show_icon_right = false;

$should_show_icon = $has_icon && !($btn_style == 'btn-gradient' && $btn_style_for_gradient == 'style-2-gradient');

if ($btn_style == 'btn-default' && $btn_style_for_default == 'style-2-default' && $should_show_icon) {
    $show_icon_left = true;
    $show_icon_right = true;
}
elseif ($btn_text_effect == 'btn-text-applied' && $should_show_icon) {
    $show_icon_left = true;
    $show_icon_right = true;
}
elseif ($should_show_icon && (
    ($btn_style == 'btn-default' && $btn_style_for_default == 'style-1-default') ||
    ($btn_style == 'btn-gradient' && $btn_style_for_gradient != 'style-2-gradient') ||
    ($btn_style != 'btn-default' && $btn_style != 'btn-gradient' && $btn_style != 'btn-no-icon')
)) {
    $show_icon_left = true;
}

if ($btn_style == 'btn-default' && !empty($btn_style_for_default)) {
    $btn_classes[] = 'pxl-button-' . esc_attr($btn_style_for_default);
}

if ($btn_style == 'btn-gradient' && $btn_style_for_gradient == 'style-2-gradient') {
    $btn_classes[] = 'btn-gradient-2 btn-glossy';
}

if (!empty($btn_text_effect)) {
    $btn_classes[] = esc_attr($btn_text_effect);
}

if (!empty($btn_style)) {
    $btn_classes[] = esc_attr($btn_style);
}

if (!empty($pxl_animate)) {
    $btn_classes[] = esc_attr($pxl_animate);
}

if (!empty($btn_w)) {
    $btn_classes[] = esc_attr($btn_w);
}

if (!empty($icon_align)) {
    $btn_classes[] = 'pxl-icon--' . esc_attr($icon_align);
}

$btn_class_string = implode(' ', array_filter($btn_classes));
?>
<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-button <?php echo esc_attr((!empty($settings['btn_action']) ? $settings['btn_action'] : '') . ' ' . (!empty($settings['pxl_animate']) ? $settings['pxl_animate'] : '')); ?>" data-wow-delay="<?php echo esc_attr(!empty($settings['pxl_animate_delay']) ? $settings['pxl_animate_delay'] : '0'); ?>ms">
    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> class="<?php echo esc_attr($btn_class_string); ?>" data-wow-delay="<?php echo esc_attr(!empty($settings['pxl_animate_delay']) ? $settings['pxl_animate_delay'] : '0'); ?>ms" data-target=".pxl-page-popup-template-<?php echo esc_attr($template); ?>">
        <?php
        if ($show_icon_left) {
            $icon_class = ($btn_text_effect == 'btn-text-applied' || ($btn_style == 'btn-default' && $btn_style_for_default == 'style-2-default')) 
                ? 'pxl-button--icon pxl-button--icon-left' 
                : 'pxl-button--icon';
            ?>
            <div class="<?php echo esc_attr($icon_class); ?>">
                <?php \Elementor\Icons_Manager::render_icon($settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i'); ?>
            </div>
            <?php
        }
        ?>
        <span class="pxl--btn-text" data-text="<?php echo esc_attr(!empty($settings['text']) ? $settings['text'] : ''); ?>">
            <?php 
            $btn_text = !empty($settings['text']) ? $settings['text'] : '';
            
            if ($btn_text_effect == 'btn-text-nina' || $btn_text_effect == 'btn-text-nanuk') {
                $chars = preg_split('//u', $btn_text, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($chars as $value) {
                    if ($value == ' ') {
                        echo '<span class="spacer">&nbsp;</span>';
                    } else {
                        echo '<span>' . esc_html($value) . '</span>';
                    }
                }
            } elseif ($btn_text_effect == 'btn-text-applied') {
                $chars = preg_split('//u', $btn_text, -1, PREG_SPLIT_NO_EMPTY);
                $totalChars = count($chars) - 1;
                echo '<span class="chars">';
                foreach ($chars as $index => $value) {
                    $class = $value == ' ' ? 'spacer' : '';
                    $char = $value == ' ' ? '&nbsp;' : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                    echo '<span class="' . esc_attr($class) . '" style="--chars-index: ' . esc_attr($index) . '; --chars-last-index: ' . esc_attr($totalChars - $index) . ';">' . $char . '</span>';
                }
                echo '</span>';
            } elseif ($btn_text_effect == 'btn-text-smoke' || $btn_text_effect == 'btn-text-reverse') { 
                ?>
                <span class="pxl-text--front">
                    <span class="pxl-text--inner">
                        <?php 
                        $chars = str_split($btn_text);
                        foreach ($chars as $value) {
                            if ($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>' . esc_html($value) . '</span>';
                            }
                        } 
                        ?>
                    </span>
                </span>
                <span class="pxl-text--back">
                    <span class="pxl-text--inner">
                        <?php 
                        $chars = str_split($btn_text);
                        foreach ($chars as $value) {
                            if ($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>' . esc_html($value) . '</span>';
                            }
                        } 
                        ?>
                    </span>
                </span>
                <?php 
            } else {
                echo pxl_print_html($btn_text);
            }
            ?>
        </span>
        <?php
        if ($show_icon_right) {
            ?>
            <div class="pxl-button--icon pxl-button--icon-right">
                <?php \Elementor\Icons_Manager::render_icon($settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i'); ?>
            </div>
            <?php
        }
        ?>
    </a>
</div>