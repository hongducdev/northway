<div class="pxl-process pxl-process2 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-process-wrapper">
        <?php foreach ($settings['process_2'] as $key => $value):
            $title = isset($value['title_2']) ? $value['title_2'] : ''; 
            $desc = isset($value['desc_2']) ? $value['desc_2'] : ''; 
            $step = isset($value['step_2']) ? $value['step_2'] : ''; 
            $image = isset($value['image_2']) ? $value['image_2'] : ''; 

            $img = pxl_get_image_by_size(array(
                'attach_id'  => $image['id'],
                'thumb_size' => 'full',
                'class'      => 'no-lazyload',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            
            <div class="pxl-item">
                <div class="pxl-item--inner">
                    <div class="pxl-item--step">
                        <span>
                            <?php if(intval($step) < 10) { ?>
                                <?php echo '0' . intval($step); ?>
                            <?php } else { ?>
                                <?php echo intval($step); ?>
                            <?php } ?>
                        </span>
                    </div>
                    <div class="pxl-item--content wow fadeInUp" data-wow-delay="200ms">
                        <div class="pxl-item--thumbnail">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                        <div class="pxl-item--meta">
                            <h5 class="pxl-item--title">
                                <?php echo esc_html__('Step', 'northway') . ' ' . intval($step) . '. ' . $title; ?>
                            </h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="551" height="26" viewBox="0 0 551 26" fill="none" class="pxl-item--divider">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.8875 2.7627C15.8875 4.45899 16.081 6.13367 16.8991 7.50488C18.6632 10.461 21.5181 11.7483 25.6317 12.2842C27.1744 12.4851 28.8789 12.5787 30.7515 12.6172C32.7063 12.5771 34.8343 12.5965 37.1323 12.6172C38.5607 12.6044 40.0611 12.5918 41.6345 12.5918H551L550.5 13.4082H41.6345C40.0611 13.4082 38.5607 13.3956 37.1323 13.3828C34.8343 13.4035 32.7063 13.4219 30.7515 13.3818C28.8789 13.4203 27.1744 13.5149 25.6317 13.7158C21.5181 14.2517 18.6632 15.539 16.8991 18.4951C16.081 19.8663 15.8875 21.541 15.8875 23.2373V26C15.8875 26 15.5137 26 15.1407 26V23.2373C15.1406 21.541 14.9472 19.8663 14.129 18.4951C12.3649 15.539 9.51003 14.2517 5.3965 13.7158C3.8535 13.5148 2.14864 13.4203 0.275641 13.3818C0.184166 13.3837 0.0922327 13.3831 0 13.3848V12.6133C0.09224 12.6149 0.184159 12.6153 0.275641 12.6172C2.14864 12.5787 3.85351 12.4852 5.3965 12.2842C9.51003 11.7483 12.3649 10.461 14.129 7.50488C14.9472 6.13367 15.1406 4.45899 15.1407 2.7627V2.64338e-06C15.5136 -3.30422e-06 15.8875 2.64338e-06 15.8875 2.64338e-06V2.7627ZM15.5141 6.10156C15.3448 6.72831 15.1044 7.33619 14.7654 7.9043C12.8792 11.0647 9.86153 12.4249 5.80605 13C9.86153 13.5751 12.8792 14.9353 14.7654 18.0957C15.1042 18.6636 15.3448 19.271 15.5141 19.8975C15.6834 19.271 15.9239 18.6636 16.2628 18.0957C18.1489 14.9355 21.166 13.5751 25.2211 13C21.166 12.4249 18.1489 11.0645 16.2628 7.9043C15.9238 7.33619 15.6834 6.72831 15.5141 6.10156Z" fill="url(#paint0_linear_1631_2195)" fill-opacity="0.5"/>
                                <defs>
                                    <linearGradient id="paint0_linear_1631_2195" x1="242" y1="13" x2="534.5" y2="13" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#666F78"/>
                                    <stop offset="1" stop-color="#F8F8F2"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <div class="pxl-item--desc">
                                <?php echo wp_kses_post($desc); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
