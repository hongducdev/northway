<?php
/**
 * Image Comparison Layout 1
 */

$settings = $widget->get_settings_for_display();
$image_before = $settings['image_before'];
$image_after = $settings['image_after'];
$label_before = $settings['label_before'] ?: 'Before';
$label_after = $settings['label_after'] ?: 'After';

if (empty($image_before['url']) || empty($image_after['url'])) {
    return;
}
?>

<div class="pxl-image-comparison <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="picture-curtain" data-widget-id="<?php echo esc_attr($widget->get_id()); ?>">
        <div class="background-picture-container">
            <img class="background-picture" 
                 src="<?php echo esc_url($image_after['url']); ?>" 
                 alt="<?php echo esc_attr($label_after); ?>" />
        </div>
        <div class="foreground-picture-container">
            <img class="foreground-picture" src="<?php echo esc_url($image_before['url']); ?>" alt="<?php echo esc_attr($label_before); ?>" />
        </div>
        <div class="slider-handle">
            <div class="slider-line"></div>
            <div class="slider-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="22" viewBox="0 0 14 22" fill="none">
                    <path d="M6.05294 21.6742L6.69324 21.9827C6.7309 22.0006 6.77407 22.0048 6.81469 21.9944C6.85532 21.984 6.8906 21.9598 6.91394 21.9263C7.4667 21.1293 7.90634 20.2655 8.2213 19.3574C8.24538 19.2913 8.28741 19.2325 8.34306 19.1871C8.39871 19.1417 8.46597 19.1113 8.53794 19.099C11.0295 18.6722 14 17.0394 14 11.6764C14 4.80089 5.99488 0.930198 3.80389 0C4.27659 3.75945 3.01618 5.70545 1.79612 7.58912C0.872534 9.01519 4.73993e-06 10.3631 4.73993e-06 12.4705C-0.00157349 13.7751 0.391 15.0524 1.13035 16.148C1.8697 17.2436 2.92422 18.1108 4.16665 18.645C4.2745 18.6899 4.39606 18.6942 4.50705 18.6569C4.61805 18.6197 4.71029 18.5437 4.76536 18.4442C6.06612 16.0721 6.64753 12.4531 6.87812 10.5071C6.89311 10.3708 6.96002 10.2445 7.06606 10.1525C7.1721 10.0604 7.30984 10.009 7.45294 10.0081H7.462C7.60545 10.0071 7.74433 10.0564 7.85254 10.1466C7.96075 10.2368 8.03082 10.3618 8.04959 10.4981C8.54822 13.6288 8.13648 16.8307 6.85959 19.7519C6.60156 20.3272 6.30871 20.8875 5.98253 21.4301C5.96937 21.4511 5.96089 21.4745 5.95763 21.4988C5.95437 21.5231 5.9564 21.5478 5.96359 21.5713C5.97032 21.5934 5.98173 21.6139 5.9971 21.6317C6.01247 21.6494 6.03148 21.6639 6.05294 21.6742Z" fill="currentColor"/>
                </svg>
            </div>
        </div>
    </div>
</div>
