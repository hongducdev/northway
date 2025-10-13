<?php
$html_id = pxl_get_element_id($settings);
$editor_title = $widget->get_settings_for_display( 'title' );
if (!empty($editor_title)) {
	$editor_title = $widget->parse_text_editor( $editor_title ); 
}
$sg_post_title = northway()->get_theme_opt('sg_post_title', 'default');
$sg_post_title_text = northway()->get_theme_opt('sg_post_title_text');

$sg_product_ptitle = northway()->get_theme_opt('sg_product_ptitle', 'default');
$sg_product_ptitle_text = northway()->get_theme_opt('sg_product_ptitle_text');

$sg_service_title = northway()->get_theme_opt('sg_service_title', 'default');
$sg_service_title_text = northway()->get_theme_opt('sg_service_title_text');

$sg_portfolio_title = northway()->get_theme_opt('sg_portfolio_title', 'default');
$sg_portfolio_title_text = northway()->get_theme_opt('sg_portfolio_title_text'); 

?>

<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-heading <?php echo esc_attr($settings['sub_title_style']); ?>-style <?php if(!empty($settings['highlight_text_image']['id'])) { echo 'highlight-text-image'; } ?>">
	<div class="pxl-heading--inner">
		<?php if(!empty($settings['sub_title'])) : ?>
			<div class="pxl-item--subtitle <?php if($settings['sub_title_style'] == 'pxl-sub-title-style-5') { echo esc_attr($settings['icon_position']); } ?> <?php echo esc_attr($settings['sub_title_style'].' '.$settings['pxl_animate_sub']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_sub']); ?>ms">
				<?php if($settings['sub_title_style'] == 'pxl-sub-title-default') : ?>
					<div class="pxl-item--subtitle-icon wow zoomIn">
						<svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11" fill="none">
							<path d="M5.35355 0.853553C5.15829 0.658291 4.84171 0.658291 4.64645 0.853553L0.353553 5.14645C0.158291 5.34171 0.158291 5.65829 0.353554 5.85355L4.64645 10.1464C4.84171 10.3417 5.15829 10.3417 5.35355 10.1464L9.64645 5.85355C9.84171 5.65829 9.84171 5.34171 9.64645 5.14645L5.35355 0.853553Z" fill="#041427"/>
						</svg>
					</div>
				<?php endif; ?>
				<span class="pxl-item--subtext">
					<?php echo esc_attr($settings['sub_title']); ?>
				</span>
			</div>
		<?php endif; ?>

		<<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title <?php echo esc_attr($settings['h_title_style'].' '.$settings['highlight_style']); ?> <?php if($settings['pxl_animate'] !== 'wow letter') { echo esc_attr($settings['pxl_animate']); } ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<?php if(is_singular('post') && $sg_post_title == 'custom_text' && !empty($sg_post_title_text) && $settings['source_type'] == 'title') { ?>
			<?php echo pxl_print_html($sg_post_title_text); ?>
			
		<?php } elseif(is_singular('portfolio') && $sg_portfolio_title == 'custom_text' && !empty($sg_portfolio_title_text) && $settings['source_type'] == 'title') { ?>
			<?php echo pxl_print_html($sg_portfolio_title_text); ?>
			
		<?php } elseif(is_singular('service') && $sg_service_title == 'custom_text' && !empty($sg_service_title_text) && $settings['source_type'] == 'title') { ?>
			<?php echo pxl_print_html($sg_service_title_text); ?>

		<?php } elseif(is_singular('product') && $sg_product_ptitle == 'custom_text' && !empty($sg_product_ptitle_text) && $settings['source_type'] == 'title') { ?>
			<?php echo pxl_print_html($sg_product_ptitle_text); ?>
			
		<?php } else { ?>
			<?php if($settings['source_type'] == 'text' && !empty($editor_title)) {
				if($settings['h_title_style'] == 'style-outline') { ?>
					<span class="pxl-text-line-backdrop">
						<span><?php echo wp_kses_post($editor_title); ?></span>
						<svg stroke-width="2" class="svg-text-line"><text dominant-baseline="middle" text-anchor="middle" x="50%" y="50%"><?php echo wp_kses_post($editor_title); ?></text></svg>		
					</span>
				<?php } else {
					echo wp_kses_post($editor_title);
				}
			} elseif($settings['source_type'] == 'title') {
				$titles = northway()->page->get_title();
				if(!empty($_GET['blog_title'])) {
					$blog_title = $_GET['blog_title'];
					$custom_title = explode('_', $blog_title);
					foreach ($custom_title as $index => $value) {
						$arr_str_b[$index] = $value;
					}
					$str = implode(' ', $arr_str_b);
					echo wp_kses_post($str);
				} else {
					pxl_print_html($titles['title']);
				}
			}?>	
		<?php } ?>	
		</<?php echo esc_attr($settings['title_tag']); ?>>
	</div>
</div>