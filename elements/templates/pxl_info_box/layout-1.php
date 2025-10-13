<div class="pxl-info-box pxl-info-box1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <h3 class="pxl-info-box-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="31" viewBox="0 0 28 31" fill="none">
            <path d="M7.57904 16.1887C7.84121 16.0472 8.16759 16.1506 8.30135 16.4118C10.3506 20.3622 13.5715 24.4595 15.8401 27.1203C21.6828 7.5152 5.42282 5.73588 1.87548 5.57808C1.4849 5.55631 1.13712 5.82294 1.04081 6.20927C-4.1384 26.87 11.517 27.8114 14.984 27.7733C12.678 25.0635 9.43564 20.9281 7.35432 16.9233C7.22056 16.6566 7.31687 16.3247 7.57904 16.1887Z" fill="currentColor" />
            <path d="M15.8401 27.1203C15.8401 27.1203 15.8294 27.1584 15.824 27.1747C15.7224 27.523 15.4067 27.7678 15.0482 27.7733H14.984C16.5571 29.6233 17.686 30.8096 17.7127 30.8368C17.8198 30.9456 17.9589 31 18.098 31C18.2371 31 18.3655 30.951 18.4725 30.8476C18.6812 30.6354 18.6865 30.2926 18.4832 30.075C18.4565 30.0478 17.365 28.9105 15.8401 27.1203Z" fill="currentColor" />
            <path d="M26.9583 0.631905C26.862 0.251012 26.5142 -0.0156136 26.1236 0.000710429C23.7159 0.109537 15.4656 0.969269 12.2286 7.62402C13.5394 8.50008 14.7647 9.61555 15.7598 11.0412C16.3591 11.9009 16.8406 12.8368 17.2152 13.838C18.007 12.445 18.7347 11.014 19.2751 9.67541C19.3874 9.3979 19.6978 9.26731 19.9706 9.37613C20.2435 9.4904 20.3773 9.806 20.2649 10.0835C19.5907 11.7594 18.6491 13.5388 17.6592 15.2201C18.1515 17.1246 18.2852 19.2522 18.0552 21.5865C23.6036 20.1663 30.6929 15.5194 26.9583 0.626464V0.631905Z" fill="currentColor" />
        </svg>
        <?php echo esc_html($settings['title']); ?>
    </h3>
    <?php if (!empty($settings['description'])) : ?>
        <div class="pxl-info-box-description"><?php echo esc_html($settings['description']); ?></div>
    <?php endif; ?>
    <?php if (!empty($settings['list_items'])) : ?>
        <ul class="pxl-info-box-list">
            <?php foreach ($settings['list_items'] as $item) : ?>
                <li class="pxl-info-box-list-item">
                    <div class="pxl-info-box-list-item-icon">
                        <?php \Elementor\Icons_Manager::render_icon($item['item_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                    </div>
                    <div class="pxl-info-box-list-item-text">
                        <?php echo esc_html($item['item_text']); ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if (!empty($settings['link'])) : ?>
        <div class="pxl-info-box-btn-wrapper">
            <a href="<?php echo esc_url($settings['link']['url']); ?>" class="btn btn-default pxl-info-box-link">
                <?php echo esc_html($settings['link_text']); ?>
                <i class="bi-arrow-right-short"></i>
            </a>
        </div>
    <?php endif; ?>
</div>