<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$wg_id = pxl_get_element_id($settings);

if (!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $number = isset($value['number']) ? $value['number'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $show_info = isset($value['show_info']) ? $value['show_info'] : '';
            $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
            $avatar = isset($value['avatar']) ? $value['avatar'] : '';
            $name = isset($value['name']) ? $value['name'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $widget->add_render_attribute($icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ]); ?>
            
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#' . $wg_id . '-' . $pxl_id); ?>">
                    <div class="pxl-title--wrapper">                        
                        <div class="pxl-title--meta">
                            <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="26" viewBox="0 0 80 26" fill="none" class="pxl-title--star">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.873 2.7627C15.8731 4.45899 16.0664 6.13367 16.8838 7.50489C18.6463 10.461 21.4986 11.7483 25.6084 12.2842C27.1497 12.4851 28.8527 12.5787 30.7236 12.6172C32.6766 12.5771 34.8027 12.5965 37.0986 12.6172C38.5257 12.6044 40.0247 12.5918 41.5967 12.5918H80V13.4082H41.5967C40.0247 13.4082 38.5257 13.3956 37.0986 13.3828C34.8027 13.4035 32.6766 13.4219 30.7236 13.3818C28.8527 13.4203 27.1497 13.5149 25.6084 13.7158C21.4986 14.2517 18.6463 15.539 16.8838 18.4951C16.0664 19.8663 15.8731 21.541 15.873 23.2373V26C15.873 26 15.4996 26 15.127 26V23.2373C15.1269 21.541 14.9336 19.8663 14.1162 18.4951C12.3537 15.539 9.5014 14.2517 5.3916 13.7158C3.85001 13.5148 2.1467 13.4203 0.275391 13.3818C0.183999 13.3837 0.0921491 13.3831 0 13.3848V12.6133C0.0921563 12.6149 0.183992 12.6153 0.275391 12.6172C2.14669 12.5787 3.85001 12.4852 5.3916 12.2842C9.5014 11.7483 12.3537 10.461 14.1162 7.50489C14.9336 6.13367 15.1269 4.45899 15.127 2.7627V2.64338e-06C15.4996 -3.30422e-06 15.873 2.64338e-06 15.873 2.64338e-06V2.7627ZM15.5 6.10157C15.3308 6.72831 15.0906 7.33619 14.752 7.9043C12.8675 11.0647 9.85258 12.4249 5.80078 13C9.85258 13.5751 12.8675 14.9353 14.752 18.0957C15.0905 18.6636 15.3309 19.271 15.5 19.8975C15.6691 19.271 15.9095 18.6636 16.248 18.0957C18.1324 14.9355 21.1468 13.5751 25.1982 13C21.1468 12.4249 18.1324 11.0645 16.248 7.9043C15.9094 7.33619 15.6692 6.72831 15.5 6.10157Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <?php if (!empty($value['pxl_icon']['value'])) : ?>
                            <span class="pxl-title--icon">
                                <?php \Elementor\Icons_Manager::render_icon($value['pxl_icon'], ['aria-hidden' => 'true']); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </<?php pxl_print_html($settings['title_tag']); ?>>
                
                <div id="<?php echo esc_attr($wg_id . '-' . $pxl_id); ?>" class="pxl-accordion--content" <?php if ($is_active) { ?>style="display: block;" <?php } ?>>
                    <div class="pxl-accordion--content-inner">
                        <?php echo wp_kses_post(nl2br($desc)); ?>
                    </div>
                    <?php if ($show_info == 'true') : ?>
                        <div class="pxl-accordion--info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none" class="pxl-accordion--info-star">
                                <path d="M5.46007 1.30672C5.54368 1.16588 5.61897 1.02168 5.68674 0.874704C5.79376 0.642612 6.20624 0.642612 6.31326 0.874704C6.38103 1.02168 6.45632 1.16588 6.53993 1.30672C6.79498 1.73629 7.0787 2.12 7.3907 2.46266C7.49469 2.57689 7.60185 2.68653 7.71211 2.79182C7.87736 2.94961 8.04956 3.09764 8.22878 3.23636C8.34833 3.3289 8.47099 3.4173 8.59672 3.50181C9.16264 3.88215 9.79091 4.18309 10.4801 4.42061C10.7383 4.5096 11.0051 4.5897 11.2803 4.66178C11.5601 4.73504 11.5601 5.26591 11.2804 5.33924C10.9009 5.43871 10.5375 5.55341 10.1904 5.68557C9.99709 5.75917 9.80899 5.83856 9.62582 5.92341C9.47495 5.9933 9.3271 6.06626 9.18316 6.14426C8.98074 6.25395 8.78533 6.37214 8.59672 6.4989C8.47099 6.58341 8.34833 6.67181 8.22878 6.76435C8.04956 6.90307 7.87736 7.0511 7.71211 7.20889C7.60185 7.31418 7.49469 7.42382 7.3907 7.53805C7.0787 7.88071 6.79498 8.26442 6.53993 8.69399C6.45637 8.83473 6.38111 8.97882 6.31335 9.12567C6.20628 9.35771 5.79372 9.35771 5.68665 9.12567C5.61889 8.97882 5.54363 8.83473 5.46007 8.69399C4.68937 7.39594 3.65649 6.51743 2.37418 5.92341C2.19081 5.83847 2.00243 5.75924 1.80888 5.68557C1.46198 5.55352 1.09883 5.43885 0.719594 5.33939C0.439872 5.26603 0.439935 4.73504 0.719685 4.66178C0.994918 4.5897 1.26168 4.5096 1.51989 4.42061C1.92139 4.28224 2.30189 4.12167 2.66177 3.93714C3.81168 3.3475 4.74786 2.50627 5.46007 1.30672Z" fill="currentColor"/>
                            </svg>
                            <div class="pxl-accordion--info-left">
                                <?php if (!empty($avatar['id'])) {
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $avatar['id'],
                                        'thumb_size' => '210x210',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail']; ?>
                                    <div class="pxl-accordion--info-avatar ">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-accordion--info-content">
                                    <h5 class="pxl-accordion--info-name">
                                        <?php echo wp_kses_post($name); ?>
                                    </h5>
                                    <h6 class="pxl-accordion--info-position">
                                        <?php echo wp_kses_post($position); ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="pxl-accordion--info-right">
                                <span class="pxl-accordion--info-signature">
                                    <?php echo wp_kses_post($name); ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>