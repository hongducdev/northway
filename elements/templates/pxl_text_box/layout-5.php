<?php 
$all_titles = array();
foreach ($settings['title_list'] as $title) {
    $all_titles[] = strip_tags($title['title']);
}
$combined_text = implode(' • ', $all_titles) . ' • ';
?>

<div class="pxl-text-box pxl-text-box5 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-circle-text-wrapper">
        <div class="pxl-circle-text" data-text="<?php echo esc_attr($combined_text); ?>">
            <?php echo esc_html($combined_text); ?>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30" viewBox="0 0 24 30" fill="none" class="pxl-circle-text-icon">
            <path d="M13.4388 1.04946C13.0129 -0.348942 11.0823 -0.35048 10.6403 1.04881L10.6006 1.19325L9.84559 4.51477C8.9755 8.3434 6.35876 11.4581 2.88646 12.8237L0.962308 13.58C-0.266652 14.0634 -0.33218 15.8447 0.844645 16.4195L3.67911 17.8042C6.67986 19.2692 8.90155 22.0905 9.72348 25.497L10.5318 28.8437L10.572 28.9847C11.0376 30.3943 13.033 30.3315 13.3943 28.8252L14.1755 25.5601C15.0038 22.1039 17.265 19.2318 20.3121 17.7417L23.1439 16.3556C24.2923 15.7935 24.2752 14.0973 23.1535 13.5611L23.0422 13.5129L21.1301 12.7776C17.6292 11.4297 15.0074 8.29243 14.1731 4.42708L13.4758 1.19469L13.4388 1.04946Z" fill="currentColor"/>
        </svg>
    </div>
</div>