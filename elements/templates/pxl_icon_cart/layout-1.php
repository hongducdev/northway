<?php if (class_exists('Woocommerce')) { ?>
	<div class="pxl-cart-sidebar-button <?php echo esc_attr($settings['style']); ?>">
		<?php if (!empty($settings['pxl_icon']['value'])) {
			\Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i');
		} else  if (!empty($settings['image']['id'])) {
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
			$img  = pxl_get_image_by_size(array(
				'attach_id'  => $settings['image']['id'],
				'thumb_size' => $image_size,
			));
			$thumbnail    = $img['thumbnail'];
			$thumbnail_url    = $img['url'];
		?>
		<?php echo wp_kses_post($thumbnail);
		} else { ?>
			<i class="bi-cart2"></i>
		<?php } ?>
		<?php if (WC()->cart) {  ?>
			<span class="pxl_cart_counter"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'northway'), WC()->cart->cart_contents_count); ?></span>
		<?php } else { ?>
			<span class="pxl_cart_counter"><?php echo __('0', 'northway'); ?></span>
		<?php } ?>
	</div>
<?php }
if (class_exists('Woocommerce')) {
	add_action('pxl_anchor_target', 'northway_hook_anchor_cart');
} ?>