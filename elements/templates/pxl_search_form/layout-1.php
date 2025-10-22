<div class="pxl-search-form1">
	<h3 class="pxl-widget-title pxl-empty"><?php echo pxl_print_html($settings['wg_title']); ?></h3>
	<form role="search" method="get" class="pxl-search-form <?php echo esc_attr($settings['pxl_animate']); ?>" action="<?php echo esc_url(home_url( '/' )); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<div class="pxl-searchform-wrap">
			<input type="text" class="pxl-search-field" placeholder="<?php if(!empty($settings['placefolder'])) { echo esc_attr($settings['placefolder']); } else { esc_attr_e('Type Words Then Enter', 'northway'); } ?>" name="s" />
			<button type="submit" class="pxl-search-btn">
				<i class="flaticon-search-1"></i>
			</button>
		</div>
	</form>
</div>