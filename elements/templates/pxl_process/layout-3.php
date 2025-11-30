<div class="pxl-process pxl-process3 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <!-- process items -->
    <?php 
    $process_count = count($settings['process_2']);
    if ($process_count > 0) : 
        $first_item = reset($settings['process_2']);
        $active_step = isset($first_item['step_2']) ? $first_item['step_2'] : '';
        $active_title = isset($first_item['title_2']) ? $first_item['title_2'] : '';
        $active_desc = isset($first_item['desc_2']) ? $first_item['desc_2'] : '';
        $active_image = isset($first_item['image_2']) ? $first_item['image_2'] : '';
        
        $items_data = array();
        foreach ($settings['process_2'] as $key => $value) {
            $img = pxl_get_image_by_size(array(
                'attach_id'  => isset($value['image_2']['id']) ? $value['image_2']['id'] : 0,
                'thumb_size' => 'full',
                'class'      => 'no-lazyload',
            ));
            
            $items_data[] = array(
                'step' => isset($value['step_2']) ? $value['step_2'] : '',
                'title' => isset($value['title_2']) ? $value['title_2'] : '',
                'desc' => isset($value['desc_2']) ? $value['desc_2'] : '',
                'image' => isset($img['thumbnail']) ? $img['thumbnail'] : ''
            );
        }
        
        $active_img = pxl_get_image_by_size(array(
            'attach_id'  => isset($active_image['id']) ? $active_image['id'] : 0,
            'thumb_size' => 'full',
            'class'      => 'no-lazyload',
        ));
        $active_thumbnail = isset($active_img['thumbnail']) ? $active_img['thumbnail'] : '';
    ?>
    <div class="pxl-process-items" data-items='<?php echo esc_attr(wp_json_encode($items_data)); ?>'>
        <div class="pxl-process-item--content">
            <?php if(!empty($active_title)): ?>
                <h3 class="pxl-process-item--title">
                    <?php if(!empty($active_step)): ?>
                        <span><?php echo esc_html($active_step); ?></span>: 
                    <?php endif; ?>
                    <?php echo esc_html($active_title); ?>
                </h3>
            <?php endif; ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="596" height="14" viewBox="0 0 596 14" fill="none">
                <path d="M-6.10352e-05 0.849579H38.9033C40.4753 0.849579 41.9743 0.836419 43.4014 0.823062C45.6973 0.844668 47.8234 0.863913 49.7764 0.822042C50.2438 0.83209 50.7009 0.845683 51.1475 0.863857C52.4882 0.918413 53.7354 1.01341 54.8916 1.17084C59.0013 1.73052 61.8537 3.07492 63.6162 6.16217C64.4334 7.59415 64.6269 9.34334 64.627 11.1147V14C64.9977 14 65.3692 14 65.373 14V11.1147C65.3731 9.34335 65.5666 7.59414 66.3838 6.16217C68.1463 3.07493 70.9987 1.73052 75.1084 1.17084C75.3011 1.1446 75.4965 1.12028 75.6943 1.09741C77.0786 0.937368 78.5873 0.857217 80.2246 0.822042C82.1773 0.863886 84.3031 0.844665 86.5986 0.823062C88.0257 0.836419 89.5247 0.849578 91.0967 0.849579L596 0.849578V0.00511205L88.793 0.00511208C88.0435 0.0100714 87.312 0.0167929 86.5986 0.0234703C84.4106 0.00287874 82.3767 -0.0150783 80.5 0.0193907C80.4118 0.0210136 80.3239 0.0206963 80.2363 0.0224504C76.9399 0.0912086 73.9378 0.170984 70.8066 1.41052C70.5386 1.51664 70.2774 1.63084 70.0234 1.7532C68.2469 2.60905 66.8158 3.87489 65.748 5.74503C65.4096 6.33801 65.1691 6.97257 65 7.62673C64.8309 6.97256 64.5904 6.33802 64.252 5.74503C63.8986 5.12621 63.5054 4.57319 63.0732 4.07956C62.9292 3.91506 62.7806 3.75694 62.6279 3.60531C62.399 3.37804 62.1603 3.16464 61.9121 2.96482C61.7465 2.83154 61.5765 2.70407 61.4023 2.58237C61.1411 2.39976 60.8702 2.22941 60.5898 2.0714C60.3905 1.95905 60.1855 1.85387 59.9766 1.7532C59.7228 1.63097 59.4622 1.51655 59.1943 1.41052C56.0436 0.162984 52.8253 0.0805939 49.5 0.0193907C47.6233 -0.0150784 45.5894 0.00287864 43.4014 0.0234703C42.6879 0.0167928 41.9565 0.0100714 41.207 0.00511208H-6.10352e-05V0.849579Z" fill="url(#paint0_linear_1789_978)"/>
                <defs>
                    <linearGradient id="paint0_linear_1789_978" x1="-6.10352e-05" y1="7" x2="641.5" y2="7" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#AFB4B5"/>
                    <stop offset="1" stop-color="#F8F8F2"/>
                    </linearGradient>
                </defs>
            </svg>
            <?php if(!empty($active_desc)): ?>
                <div class="pxl-process-item--desc"><?php echo wp_kses_post($active_desc); ?></div>
            <?php endif; ?>
            <div class="pxl-process-item--controls">
                <button class="pxl-timeline-arrow pxl-timeline-arrow-prev" aria-label="<?php echo esc_attr__('Previous timeline items', 'northway'); ?>">
                        <i class="bi-arrow-left-short"></i>
                </button>
                <button class="pxl-timeline-arrow pxl-timeline-arrow-next" aria-label="<?php echo esc_attr__('Next timeline items', 'northway'); ?>">
                    <i class="bi-arrow-right-short"></i>
                </button>
            </div>
        </div>
        
        <?php if(!empty($active_thumbnail)): ?>
            <div class="pxl-process-item--image">
                <?php echo wp_kses_post($active_thumbnail); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <!-- timeline -->
    <?php 
    $process_count = count($settings['process_2']);
    if ($process_count > 0) : 
    ?>
    <div class="pxl-process-timeline" data-total-items="<?php echo esc_attr($process_count); ?>">
        <div class="pxl-timeline-wrapper">
            <div class="pxl-timeline-container">
                <div class="pxl-timeline-line">
                    <div class="pxl-timeline-progress"></div>
                </div>
                
                <div class="pxl-timeline-items" data-max-visible="5">
                    <?php foreach ($settings['process_2'] as $key => $value): 
                        $step = isset($value['step_2']) ? $value['step_2'] : '';
                        $title = isset($value['title_2']) ? $value['title_2'] : '';
                        $is_active = ($key === 0) ? 'active' : '';
                    ?>
                        <div class="pxl-timeline-item <?php echo esc_attr($is_active); ?>" data-index="<?php echo esc_attr($key); ?>" data-step="<?php echo esc_attr($step); ?>">
                            <div class="pxl-timeline-dot"></div>
                            <div class="pxl-timeline-label">
                                <?php if(!empty($step)): ?>
                                    <span class="pxl-timeline-step"><?php echo esc_html($step); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
