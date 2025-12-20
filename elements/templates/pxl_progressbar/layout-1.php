<?php
if(isset($settings['progressbar']) && !empty($settings['progressbar'])): ?>
    <div class="pxl-progressbar pxl-progressbar-1 <?php echo esc_attr($settings['style']); ?>">
        <?php foreach ($settings['progressbar'] as $key => $progressbar): 
            $percent_size = isset($progressbar['percent']['size']) ? $progressbar['percent']['size'] : 0;
        ?>
            <div class="pxl-progressbar--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <div class="pxl-progressbar--item-meta">
                    <h5 class="pxl-progressbar--item-title el-empty"><?php echo pxl_print_html($progressbar['title']); ?></h5>
                    <?php if ($settings['style'] == 'style-1'){ ?>
                        <div class="pxl-progressbar--item-percentage"><?php echo pxl_print_html($percent_size); ?><span>%</span></div>
                    <?php } ?>
                </div>
                <div class="pxl-progressbar--wrap">
                    <div class="pxl--progressbar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($percent_size); ?>"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>