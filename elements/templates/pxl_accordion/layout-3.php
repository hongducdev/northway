<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$wg_id = pxl_get_element_id($settings);

if (!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion3 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            ?>
            
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#' . $wg_id . '-' . $pxl_id); ?>">
                    <div class="pxl-title--wrapper">                        
                        <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                    </div>
                    <div class="pxl-accordion--toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21" fill="none">
                            <path d="M7.76074 0.141602C6.52859 0.792218 0.458526 4.36807 0.136719 11.7363C-0.0165565 15.2457 1.37361 17.4338 3.00879 18.7939C4.55805 20.0825 6.33366 20.6305 7.24219 20.8418V16.8291L3.46875 13.5664C3.2516 13.379 3.22661 13.0503 3.41211 12.832C3.57484 12.6399 3.84686 12.5972 4.05762 12.7148L4.14355 12.7754L7.24219 15.4531V11.5039L4.83984 9.42676C4.62261 9.23923 4.59828 8.91061 4.78418 8.69238C4.94693 8.50113 5.21734 8.45887 5.42773 8.57617L5.51465 8.63672L7.24219 10.1289V5.9873C7.24219 5.70039 7.47312 5.46582 7.76074 5.46582C8.0483 5.46589 8.2793 5.70044 8.2793 5.9873V10.1289L10.0068 8.63672C10.2237 8.44889 10.5511 8.47389 10.7373 8.69238C10.9007 8.88368 10.902 9.16002 10.7539 9.35156L10.6816 9.42773L8.2793 11.5039V15.4531L11.3779 12.7754H11.377C11.594 12.5874 11.9223 12.613 12.1084 12.832C12.2947 13.0504 12.2697 13.3791 12.0527 13.5664L8.2793 16.8291V20.8418C9.1879 20.6304 10.9636 20.0824 12.5127 18.7939C14.1478 17.4338 15.538 15.2456 15.3848 11.7363C15.0634 4.36841 8.99364 0.792449 7.76074 0.141602Z" fill="currentColor" stroke="currentColor" stroke-width="0.25"/>
                        </svg>
                    </div>
                </<?php pxl_print_html($settings['title_tag']); ?>>
                
                <div id="<?php echo esc_attr($wg_id . '-' . $pxl_id); ?>" class="pxl-accordion--content" <?php if ($is_active) { ?>style="display: block;" <?php } ?>>
                    <div class="pxl-accordion--content-inner">
                        <?php echo wp_kses_post(nl2br($desc)); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>