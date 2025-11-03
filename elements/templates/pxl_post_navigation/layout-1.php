<?php
if($settings['type'] === 'navigation') :
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    if ( ! $next && ! $previous ) {
        return;
    }
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="pxl-post-navigation">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <div class="pxl-item--navigation pxl-item--prev">
                    <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                        <div class="pxl-item--icon">
                            <i class="bi-arrow-left-short"></i>
                        </div>
                        <span class="pxl-item--text"><?php echo esc_html($settings['text_prev']); ?></span>
                    </a>
                </div>
            <?php } ?>
            
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <div class="pxl-item--navigation pxl-item--next">
                    <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                        <span class="pxl-item--text"><?php echo esc_html($settings['text_next']); ?></span>
                        <div class="pxl-item--icon">
                            <i class="bi-arrow-right-short"></i>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
<?php } 
endif;?>
