<div class="pxl-position <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-position--col-1">
        <?php if (!empty($settings['position'])) : ?>
            <h5 class="pxl-position--title">
                <?php echo esc_html($settings['position']); ?>
            </h5>
        <?php endif; ?>
        <?php if (!empty($settings['description'])) : ?>
            <div class="pxl-position--description">
                <?php echo esc_html($settings['description']); ?>
            </div>
        <?php endif; ?>
        <div class="pxl-position--meta">    
            <?php if (!empty($settings['address'])) : ?>
                <div class="pxl-position--address pxl-position--meta-item">
                    <i class="flaticon-mail"></i>
                    <?php echo esc_html($settings['address']); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($settings['employment_type'])) : 
                $employment_types = array(
                    'full_time' => esc_html__('Full Time', 'northway'),
                    'part_time' => esc_html__('Part Time', 'northway'),
                    'contract' => esc_html__('Contract', 'northway'),
                    'temporary' => esc_html__('Temporary', 'northway'),
                );
                $employment_label = isset($employment_types[$settings['employment_type']]) 
                    ? $employment_types[$settings['employment_type']] 
                    : $settings['employment_type'];
            ?>
            <div class="pxl-position--employment pxl-position--meta-item">
                <i class="flaticon-suitcase"></i>
                <?php echo esc_html($employment_label); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="pxl-position--col-2">
        <h5 class="pxl-position--col-title">
            <?php echo esc_html('Requirements', 'northway'); ?>
        </h5>
        <ul class="pxl-position--requirements">
            <?php foreach ($settings['requirements'] as $requirement) : ?>
                <li class="pxl-position--requirement">
                    <i class="flaticon-polygon"></i>
                    <p><?php echo esc_html($requirement['requirement']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="pxl-position--col-3">
        <h5 class="pxl-position--col-title">
            <?php echo esc_html('Salary', 'northway'); ?>
        </h5>
        <div class="pxl-position--salary">
            <div class="pxl-position--salary-inner">
                <span class="pxl-position--salary-currency"><?php echo esc_html($settings['salary_currency']); ?></span>
                <span class="pxl-position--salary-amount"><?php echo esc_html($settings['salary']); ?></span>
            </div>
            <span class="pxl-position--salary-period"><?php echo esc_html($settings['salary_period']); ?></span>
        </div>
        <?php if (!empty($settings['salary_desc'])) : ?>
            <p class="pxl-position--salary-desc">
                <?php echo pxl_print_html($settings['salary_desc']); ?>
            </p>
        <?php endif; ?>
        <?php if (!empty($settings['apply_link'])) : ?>
            <div class="pxl-position--apply">
                <a href="<?php echo esc_url($settings['apply_link']['url']); ?>" class="btn pxl-button-style-2-default btn-default inline pxl-icon--right">
                    <div class="pxl-button--icon pxl-button--icon-left">
                        <i class="flaticon-arrow"></i>
                    </div>
                    <span class="pxl--btn-text" data-text="Apply Now">Apply Now</span>
                    <div class="pxl-button--icon pxl-button--icon-right">
                        <i class="flaticon-arrow"></i>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>