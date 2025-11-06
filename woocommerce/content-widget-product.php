<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
		<div class="pxl-woocommerce-product-image">
			<?php echo ''.$product->get_image(); ?>
		</div>
		<div class="pxl-woocommerce-product-info">
			<h4 class="pxl-woocommerce-product-title">
				<a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo wp_kses_post( $product->get_name() ); ?></a>
			</h4>
			<div class="pxl-woocommerce-product-meta">
				<div class="pxl-woocommerce-product-price">
					<?php woocommerce_template_loop_price(); ?>
				</div>
				<div class="pxl-woocommerce-product-rating">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
						<path d="M7.44918 0.835791C7.67529 0.38807 8.32861 0.388069 8.55472 0.835791L10.3948 4.4793C10.4846 4.65709 10.6582 4.78032 10.8589 4.80883L14.9735 5.39309C15.4791 5.46489 15.681 6.07208 15.3151 6.42058L12.3378 9.25665C12.1925 9.39504 12.1262 9.59443 12.1605 9.78984L12.8634 13.7944C12.9497 14.2865 12.4212 14.6618 11.969 14.4295L8.2888 12.5388C8.10922 12.4465 7.89468 12.4465 7.7151 12.5388L4.03493 14.4295C3.58271 14.6618 3.05416 14.2865 3.14053 13.7944L3.84338 9.78984C3.87768 9.59443 3.81138 9.39504 3.6661 9.25665L0.68878 6.42058C0.322921 6.07208 0.524806 5.46489 1.03041 5.39309L5.14497 4.80883C5.34574 4.78032 5.51931 4.65709 5.6091 4.4793L7.44918 0.835791Z" stroke="#666F78"/>
					</svg>
					<span class="review-rating">
						<?php echo esc_html( $product->get_average_rating() ); ?>
					</span>
				</div>
			</div>
		</div>
	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
