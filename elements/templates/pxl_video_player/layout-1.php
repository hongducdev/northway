<?php 
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
?>
<div class="pxl-video-player pxl-video-player1 pxl-video-<?php echo esc_attr($settings['btn_video_style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-video--inner ">
        <?php if( $settings['image_type'] != 'none' && !empty( $settings['image']['url'] ) ) : 
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $img_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            ?>
            <div class="pxl-video--holder">
                <?php if ($settings['image_type'] == 'img') { ?>
                    <?php if ( ! empty( $settings['image']['url'] ) ) { echo wp_kses_post($thumbnail); } ?>
                <?php } else { ?>
                    <div class="pxl-video--imagebg">
                        <div class="bg-image <?php echo esc_attr($settings['box_style']); ?>" data-parallax='{"y":<?php if ($settings['box_style']=='parallax') {echo esc_attr('-60');} ?>}' style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($settings['video_link'])) : ?>
            <div class="btn-video-wrap  el-parallax-wrap <?php echo esc_attr($settings['btn_video_position']); ?>">
                <a class="pxl-btn-video pxl-action-popup el-parallax-item <?php echo esc_attr($settings['btn_video_style']); ?>" href="<?php echo esc_url($settings['video_link']); ?>">
                    <?php if($settings['btn_video_style'] == 'style-button') { ?>
                        <?php if (!empty($settings['label'])): ?>
                            <span class="label-text">
                                <?php echo pxl_print_html($settings['label']);?>
                            </span>
                        <?php endif ?>
                    <?php } ?>
                    <?php if($settings['btn_video_style'] == 'style-button') { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                            <path d="M16.5401 8.38384C16.5401 12.9513 12.8375 16.6539 8.27007 16.6539C3.70264 16.6539 0 12.9513 0 8.38384C0 3.81641 3.70264 0.11377 8.27007 0.11377C12.8375 0.11377 16.5401 3.81641 16.5401 8.38384Z" fill="currentColor"/>
                            <path d="M11.3169 7.71656C11.8973 8.05163 11.8973 8.8893 11.3169 9.22437L7.3995 11.4861C6.81915 11.8211 6.0937 11.4023 6.0937 10.7322V6.20875C6.0937 5.53861 6.81915 5.11978 7.3995 5.45485L11.3169 7.71656Z" fill="white"/>
                        </svg>
                    <?php } else { ?>
                        <?php if ( !empty($settings['video_icon']['value']) ) { ?>
                            <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                        <?php } else { ?>
                            <i class="bi-play-fill"></i>
                        <?php } ?>
                    <?php } ?>
                </a>
                <?php if($settings['btn_video_style'] != 'style-button') { ?>
                    <?php if (!empty($settings['label'])): ?>
                        <span class="label-text">
                            <?php echo pxl_print_html($settings['label']);?>
                        </span>
                    <?php endif ?>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
</div>