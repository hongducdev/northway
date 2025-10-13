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
                <div class="pxl--item item--prev pxl-navigation-btn--wrap pxl-navigation--prev">
                    <a class="pxl-navigation-link" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                        <div class="pxl-navigation-image">
                            <?php 
                            $prev_thumbnail = get_the_post_thumbnail($previous_post->ID, 'medium');
                            if ($prev_thumbnail) {
                                echo wp_kses_post($prev_thumbnail);
                            } else {
                                echo '<div class="pxl-placeholder-image"></div>';
                            }
                            ?>
                        </div>
                        <div class="pxl-navigation-content">
                            <div class="pxl-navigation-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.9036 0.507158C5.6314 0.194938 5.1576 0.162488 4.8454 0.434678L0.257099 4.4347C0.0937996 4.5771 0 4.7833 0 5C0 5.2168 0.0937996 5.4229 0.257099 5.5653L4.8454 9.5653C5.1576 9.8375 5.6314 9.8051 5.9036 9.4929C6.1758 9.1806 6.1433 8.7069 5.8311 8.4347L2.7516 5.75H11.75C12.1642 5.75 12.5 5.4142 12.5 5C12.5 4.5858 12.1642 4.25 11.75 4.25H2.7516L5.8311 1.56534C6.1433 1.29315 6.1758 0.819378 5.9036 0.507158Z" fill="currentColor"/>
                                </svg>
                                <span class="pxl-navigation-label"><?php echo esc_html__('Previous Project','northway'); ?></span>
                            </div>
                            <h3 class="pxl-navigation-title"><?php echo get_the_title($previous_post->ID); ?></h3>
                        </div>
                    </a>
                </div>
            <?php } ?>
            
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <div class="pxl--item item--next pxl-navigation-btn--wrap pxl-navigation--next">
                    <a class="pxl-navigation-link" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                        <div class="pxl-navigation-content">
                            <div class="pxl-navigation-text">
                                <span class="pxl-navigation-label"><?php echo esc_html__('Next Project','northway'); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.5964 0.507158C6.8686 0.194938 7.3424 0.162488 7.6546 0.434678L12.2429 4.4347C12.4062 4.5771 12.5 4.7833 12.5 5C12.5 5.2168 12.4062 5.4229 12.2429 5.5653L7.6546 9.5653C7.3424 9.8375 6.8686 9.8051 6.5964 9.4929C6.3242 9.1806 6.3567 8.7069 6.6689 8.4347L9.7484 5.75H0.75C0.33579 5.75 0 5.4142 0 5C0 4.5858 0.33579 4.25 0.75 4.25H9.7484L6.6689 1.56534C6.3567 1.29315 6.3242 0.819378 6.5964 0.507158Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <h3 class="pxl-navigation-title"><?php echo get_the_title($next_post->ID); ?></h3>
                        </div>
                        <div class="pxl-navigation-image">
                            <?php 
                            $next_thumbnail = get_the_post_thumbnail($next_post->ID, 'medium');
                            if ($next_thumbnail) {
                                echo wp_kses_post($next_thumbnail);
                            } else {
                                echo '<div class="pxl-placeholder-image"></div>';
                            }
                            ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
<?php } 
endif;?>
