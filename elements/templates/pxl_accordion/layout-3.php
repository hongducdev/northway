<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion_2');
$wg_id = pxl_get_element_id($settings);

if (!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion3 <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-accordion--process">
            <div class="pxl-accordion--process-inner">
                <?php $total = count($accordion); ?>
                <?php if($total < 10): ?>
                    <span class="pxl-accordion--process-number">0<?php echo esc_html($total); ?></span>
                <?php else: ?>
                    <span class="pxl-accordion--process-number"><?php echo esc_html($total); ?></span>
                <?php endif; ?>
                <span class="pxl-accordion--process-title">
                    <?php echo esc_html__('Steps Process', 'northway'); ?>
                </span>
            </div>
        </div>
        <div class="pxl-accordion--items">
            <?php foreach ($accordion as $key => $value):
                $is_active = ($key + 1) == $active;
                $pxl_id = isset($value['_id']) ? $value['_id'] : '';
                $title = isset($value['title_2']) ? $value['title_2'] : '';
                $desc = isset($value['desc_2']) ? $value['desc_2'] : '';
                ?>
                <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                    <div class="pxl-accordion--title" data-target="<?php echo esc_attr('#' . $wg_id . '-' . $pxl_id); ?>">
                        <div class="pxl-title--wrapper">           
                            <span class="pxl-title--order">
                                <?php if($key < 10) echo esc_html('0' . ($key + 1)); else echo esc_html($key + 1); ?>
                            </span>             
                            <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-title--text"><?php echo wp_kses_post($title); ?></<?php pxl_print_html($settings['title_tag']); ?>>
                        </div>
                    </div>
                    
                    <div id="<?php echo esc_attr($wg_id . '-' . $pxl_id); ?>" class="pxl-accordion--content" <?php if ($is_active) { ?>style="display: block;" <?php } ?>>
                        <div class="pxl-accordion--content-inner">
                            <?php echo wp_kses_post(nl2br($desc)); ?>
                        </div>
                        <?php if($settings['style'] == 'style2'): 
                            $gradient_id = 'gradient_' . $wg_id . '_' . $pxl_id . '_' . $key;
                            ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="160" height="102" viewBox="0 0 160 102" fill="none" class="pxl-accordion--pattern">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M144.191 14.3896H160V14.7588H144.191V32.8525H160V33.2217H144.191V51.3154H160V51.6846H144.191V69.7783H160V70.1475H144.191V88.2412H160V88.6104H144.191V102H143.713V88.6104H120.239V102H119.761V88.6104H96.2871V102H95.8086V88.6104H72.335V102H71.8564V88.6104H48.3828V102H47.9043V88.6104H24.4307V102H23.9521V88.6104H0.479492V102H0V0H0.479492V14.3896H23.9521V0H24.4307V14.3896H47.9043V0H48.3828V14.3896H71.8564V0H72.335V14.3896H95.8086V0H96.2871V14.3896H119.761V0H120.239V14.3896H143.713V0H144.191V14.3896ZM0.479492 88.2412H23.9521V70.1475H0.479492V88.2412ZM24.4307 88.2412H47.9043V70.1475H24.4307V88.2412ZM48.3828 88.2412H71.8564V70.1475H48.3828V88.2412ZM72.335 88.2412H95.8086V70.1475H72.335V88.2412ZM96.2871 88.2412H119.761V70.1475H96.2871V88.2412ZM120.239 88.2412H143.713V70.1475H120.239V88.2412ZM0.479492 69.7783H23.9521V51.6846H0.479492V69.7783ZM24.4307 69.7783H47.9043V51.6846H24.4307V69.7783ZM48.3828 69.7783H71.8564V51.6846H48.3828V69.7783ZM72.335 69.7783H95.8086V51.6846H72.335V69.7783ZM96.2871 69.7783H119.761V51.6846H96.2871V69.7783ZM120.239 69.7783H143.713V51.6846H120.239V69.7783ZM0.479492 51.3154H23.9521V33.2217H0.479492V51.3154ZM24.4307 51.3154H47.9043V33.2217H24.4307V51.3154ZM48.3828 51.3154H71.8564V33.2217H48.3828V51.3154ZM72.335 51.3154H95.8086V33.2217H72.335V51.3154ZM96.2871 51.3154H119.761V33.2217H96.2871V51.3154ZM120.239 51.3154H143.713V33.2217H120.239V51.3154ZM0.479492 32.8525H23.9521V14.7588H0.479492V32.8525ZM24.4307 32.8525H47.9043V14.7588H24.4307V32.8525ZM48.3828 32.8525H71.8564V14.7588H48.3828V32.8525ZM72.335 32.8525H95.8086V14.7588H72.335V32.8525ZM96.2871 32.8525H119.761V14.7588H96.2871V32.8525ZM120.239 32.8525H143.713V14.7588H120.239V32.8525Z" fill="url(#<?php echo esc_attr($gradient_id); ?>)" fill-opacity="0.7"/>
                                <defs>
                                    <radialGradient id="<?php echo esc_attr($gradient_id); ?>" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(120 51.5) rotate(90) scale(92.5 120)">
                                    <stop stop-color="currentColor"/>
                                    <stop offset="1" stop-color="currentColor" stop-opacity="0"/>
                                    </radialGradient>
                                </defs>
                            </svg>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>