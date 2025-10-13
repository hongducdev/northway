<?php

//Custom products layout on archive page
add_filter( 'loop_shop_columns', 'northway_loop_shop_columns', 20 ); 
function northway_loop_shop_columns() {
	$columns = isset($_GET['product-column']) ? sanitize_text_field($_GET['product-column']) : northway()->get_theme_opt('products_columns', 3);
	return $columns;
}

// Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'northway_loop_shop_per_page', 20 );
function northway_loop_shop_per_page( $limit ) {
	$limit = isset($_GET['product-limit']) ? sanitize_text_field($_GET['product-limit']) : northway()->get_theme_opt('product_per_page', 9);
	return $limit;
}

// Custom pagination for shop page
// Remove default WooCommerce pagination
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

// Add custom pagination
add_action( 'woocommerce_after_shop_loop', 'northway_custom_pagination', 10 );
function northway_custom_pagination() {
	global $wp_query;
	
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}
	
	$current = max( 1, get_query_var( 'paged' ) );
	$total = $wp_query->max_num_pages;
	
	$output = '<nav class="woocommerce-pagination" aria-label="Product Pagination">';
	$output .= '<ul class="page-numbers">';
	
	// Previous page
	if ( $current > 1 ) {
		$prev_link = get_pagenum_link( $current - 1 );
		$output .= '<li><a class="prev page-numbers" href="' . esc_url( $prev_link ) . '"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none"><g transform="translate(13,0) scale(-1,1)"><path d="M6.50358 4.42541L1.65571 0.153365C1.54358 0.0544776 1.3939 0 1.23431 0C1.07471 0 0.925031 0.0544776 0.812906 0.153365L0.455894 0.467899C0.223584 0.672853 0.223584 1.00596 0.455894 1.21061L4.52677 4.79801L0.451377 8.3894C0.339252 8.48828 0.277344 8.62011 0.277344 8.76067C0.277344 8.90139 0.339252 9.03322 0.451377 9.13218L0.808389 9.44664C0.920603 9.54552 1.07019 9.6 1.22979 9.6C1.38939 9.6 1.53906 9.54552 1.65119 9.44664L6.50358 5.17069C6.61597 5.07149 6.6777 4.93904 6.67734 4.79824C6.6777 4.6569 6.61597 4.52453 6.50358 4.42541Z" fill="currentColor"/><path d="M12.7047 4.42541L7.85688 0.153365C7.74475 0.0544776 7.59507 0 7.43548 0C7.27588 0 7.1262 0.0544776 7.01408 0.153365L6.65707 0.467899C6.42476 0.672853 6.42476 1.00596 6.65707 1.21061L10.7279 4.79801L6.65255 8.3894C6.54042 8.48828 6.47852 8.62011 6.47852 8.76067C6.47852 8.90139 6.54042 9.03322 6.65255 9.13218L7.00956 9.44664C7.12178 9.54552 7.27136 9.6 7.43096 9.6C7.59056 9.6 7.74024 9.54552 7.85236 9.44664L12.7047 5.17069C12.8171 5.07149 12.8789 4.93904 12.8785 4.79824C12.8789 4.6569 12.8171 4.52453 12.7047 4.42541Z" fill="currentColor"/></g></svg></a></li>';
	}
	
	$output .= '<div class="woocommerce-pagination-wrapper">';
	for ( $i = 1; $i <= $total; $i++ ) {
		if ( $i == $current ) {
			$output .= '<li><span aria-label="Page ' . $i . '" aria-current="page" class="page-numbers current">' . $i . '</span></li>';
		} else {
			$page_link = get_pagenum_link( $i );
			$output .= '<li><a aria-label="Page ' . $i . '" class="page-numbers" href="' . esc_url( $page_link ) . '">' . $i . '</a></li>';
		}
	}
	$output .= '</div>';
	
	// Next page
	if ( $current < $total ) {
		$next_link = get_pagenum_link( $current + 1 );
		$output .= '<li><a class="next page-numbers" href="' . esc_url( $next_link ) . '"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none"><path d="M6.50358 4.42541L1.65571 0.153365C1.54358 0.0544776 1.3939 0 1.23431 0C1.07471 0 0.925031 0.0544776 0.812906 0.153365L0.455894 0.467899C0.223584 0.672853 0.223584 1.00596 0.455894 1.21061L4.52677 4.79801L0.451377 8.3894C0.339252 8.48828 0.277344 8.62011 0.277344 8.76067C0.277344 8.90139 0.339252 9.03322 0.451377 9.13218L0.808389 9.44664C0.920603 9.54552 1.07019 9.6 1.22979 9.6C1.38939 9.6 1.53906 9.54552 1.65119 9.44664L6.50358 5.17069C6.61597 5.07149 6.6777 4.93904 6.67734 4.79824C6.6777 4.6569 6.61597 4.52453 6.50358 4.42541Z" fill="currentColor"/><path d="M12.7047 4.42541L7.85688 0.153365C7.74475 0.0544776 7.59507 0 7.43548 0C7.27588 0 7.1262 0.0544776 7.01408 0.153365L6.65707 0.467899C6.42476 0.672853 6.42476 1.00596 6.65707 1.21061L10.7279 4.79801L6.65255 8.3894C6.54042 8.48828 6.47852 8.62011 6.47852 8.76067C6.47852 8.90139 6.54042 9.03322 6.65255 9.13218L7.00956 9.44664C7.12178 9.54552 7.27136 9.6 7.43096 9.6C7.59056 9.6 7.74024 9.54552 7.85236 9.44664L12.7047 5.17069C12.8171 5.07149 12.8789 4.93904 12.8785 4.79824C12.8789 4.6569 12.8171 4.52453 12.7047 4.42541Z" fill="currentColor"/></svg></a></li>';
	}
	
	$output .= '</ul>';
	$output .= '</nav>';
	
	echo wp_kses_post( $output );
}


if(!function_exists('northway_woocommerce_catalog_result')){
    // remove
	
    // add back
	add_action('woocommerce_before_shop_loop','northway_woocommerce_catalog_result', 20);
	add_action('northway_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering');
	add_action('northway_woocommerce_result_count', 'woocommerce_result_count');
	function northway_woocommerce_catalog_result(){
		$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : northway()->get_theme_opt('products_columns', '2');
		$display_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : northway()->get_theme_opt('shop_display_type', 'grid');
		$active_grid = 'active';
		$active_list = '';
		if( $display_type == 'list' ){
			$active_list = $display_type == 'list' ? 'active' : '';
			$active_grid = '';
		}
		?>
		<div class="pxl-shop-topbar-wrap ">
			<div class="text-heading number-result">
				<?php do_action('northway_woocommerce_result_count'); ?>
			</div>
			<div class="pxl-view-layout-wrap ">
				<div class="woocommerce-topbar-ordering">
					<?php woocommerce_catalog_ordering(); ?>
				</div>
			</div>
		</div>
		<?php
	}
}

add_action('woocommerce_thankyou', 'add_custom_order_meta_to_thank_you', 20);
function add_custom_order_meta_to_thank_you($order_id) {
	$order = wc_get_order($order_id);
	$custom_meta = $order->get_meta('_your_custom_meta_key');

	if ($custom_meta) {
		echo '<p>Custom Meta: ' . esc_html($custom_meta) . '</p>';
	}
}

add_action('woocommerce_thankyou', 'custom_thank_you_message', 20);
function custom_thank_you_message($order_id) {
	$order = wc_get_order($order_id);
	echo '<p>Thank you for your order!</p>';
	echo '<p>Your order number is: ' . $order->get_order_number() . '</p>';
}

function utero_wc_cart_totals_shipping_method_label( $method ) {
	$label     = $method->get_label();
	$has_cost  = 0 < $method->cost;
	$hide_cost = ! $has_cost && in_array( $method->get_method_id(), array( 'free_shipping', 'local_pickup' ), true );

	if ( $has_cost && ! $hide_cost ) {
		if ( WC()->cart->display_prices_including_tax() ) {
			$label .= ' (' . wc_price( $method->cost + $method->get_shipping_tax() ).')';
			if ( $method->get_shipping_tax() > 0 && ! wc_prices_include_tax() ) {
				$label .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
			}
		} else {
			$label .= ' (' . wc_price( $method->cost ).')';
			if ( $method->get_shipping_tax() > 0 && wc_prices_include_tax() ) {
				$label .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
			}
		}
	}

	return apply_filters( 'woocommerce_cart_shipping_method_full_label', $label, $method );
}

add_filter( 'wc_get_template', 'northway_wc_update_get_template', 10, 5 );
function northway_wc_update_get_template($template, $template_name, $args, $template_path, $default_path){
	switch ($template_name) {
		case 'cart/cart-totals.php':
		$template = get_template_directory().'/'.WC()->template_path().'cart/pxl-cart-totals.php';
		break;
		case 'cart/cart.php':
		$template = get_template_directory().'/'.WC()->template_path().'cart/pxl-cart-content.php';
		break;
		case 'cart/cart-shipping.php':
		$template = get_template_directory().'/'.WC()->template_path().'cart/pxl-cart-shipping.php';
		break;
		case 'checkout/thankyou.php':
		$template = get_template_directory().'/'.WC()->template_path().'checkout/pxl-thankyou.php';
		break;
		case 'checkout/form-checkout.php':
		$template = get_template_directory().'/'.WC()->template_path().'checkout/form-checkout.php';
		break;
		case 'checkout/form-shipping.php':
		$template = get_template_directory().'/'.WC()->template_path().'checkout/form-shipping.php';
		break;
	} 

	return $template;
}

add_action('woocommerce_cart_totals_after_order_total', 'add_terms_conditions_to_cart_page');

function add_terms_conditions_to_cart_page() {
	?>
	<div class="woocommerce-terms-and-conditions">
		<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
			<input type="checkbox" class="woocommerce-form__input-checkbox" name="terms_conditions" id="terms_conditions" />
			<span><?php _e('I agree with term and conditions', 'northway'); ?></span>
		</label>
		<p class="terms-error-message" style="color: red; display: none;"><?php _e('You must agree to the terms and conditions before proceeding.', 'northway'); ?></p>
	</div>
	<script>
		jQuery(function($) {
			$('form.woocommerce-cart-form').on('submit', function(e) {
				if (!$('#terms_conditions').is(':checked')) {
					e.preventDefault();
					$('.terms-error-message').show();
				} else {
					$('.terms-error-message').hide();
				}
			});
		});
	</script>
	<?php
}

/* Cart action */
add_filter('woocommerce_add_to_cart_fragments', 'northway_woocommerce_add_to_cart_fragments', 10, 1 );
function northway_woocommerce_add_to_cart_fragments( $fragments ) {

	ob_start();
	?>
	<span class="header-count cart_total"><?php echo WC()->cart->cart_contents_count; ?></span>
	<?php
	$fragments['.cart_total'] = ob_get_clean();
	$fragments['.mini-cart-count'] = '<span class="mini-cart-total mini-cart-count">'.WC()->cart->cart_contents_count.'</span>';

	ob_start();
	wc_get_template( 'cart/mini-cart-totals.php' );
	$mini_cart_totals = ob_get_clean();
	$fragments['.pxl-hidden-template-canvas-cart .cart-footer-inner'] = $mini_cart_totals;
	$fragments['.pxl-cart-dropdown .cart-footer-inner'] = $mini_cart_totals;

	$fragments['.pxl-anchor-cart .anchor-cart-count'] = '<span class="anchor-cart-count">'.WC()->cart->cart_contents_count.'</span>';
	$fragments['.pxl-anchor-cart .anchor-cart-total'] = '<span class="anchor-cart-total">'.WC()->cart->get_cart_subtotal().'</span>';

	ob_start();
	wc_get_template( 'cart/pxl-cart-content.php' );
	$fragments['.cart-list-wrapper .cart-list-content'] = ob_get_clean();

	return $fragments;
}


/* Remove result count & product ordering & item product category..... */
function northway_cwoocommerce_remove_function() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
}
add_action( 'init', 'northway_cwoocommerce_remove_function' );

/* Product Category */
//add_action( 'woocommerce_before_shop_loop', 'northway_woocommerce_nav_top', 2 );
function northway_woocommerce_nav_top() { ?>
	<div class="woocommerce-topbar">
		<div class="woocommerce-result-count pxl-pr-20">
			<?php woocommerce_result_count(); ?>
		</div>
		<div class="woocommerce-topbar-ordering">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
<?php }

add_filter( 'woocommerce_after_shop_loop_item', 'northway_woocommerce_product' );
function northway_woocommerce_product() {
	global $product;
	$product_id = $product->get_id();
	$shop_featured_img_size = northway()->get_theme_opt('shop_featured_img_size');
	?>
	<div class="woocommerce-product-inner">
		<?php if (has_post_thumbnail()) {
			$img  = pxl_get_image_by_size( array(
				'attach_id'  => get_post_thumbnail_id($product_id),
				'thumb_size' => $shop_featured_img_size,
			) );
			$thumbnail    = $img['thumbnail'];
			$thumbnail_url    = $img['url']; ?>
			<div class="woocommerce-product-header">
				<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
					<?php if(!empty($shop_featured_img_size)) { echo wp_kses_post($thumbnail); } else { woocommerce_template_loop_product_thumbnail(); } ?>
				</a>
				<div class="woocommerce-product-info">
					<?php woocommerce_template_loop_price(); ?>
					<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
					<?php } else { ?>
						<div class="woocommerce-product-meta">
							<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
							<?php } else { ?>
								<div class="woocommerce-add-to-cart">
									<?php woocommerce_template_loop_add_to_cart(); ?>
								</div>
							<?php } ?>
							<?php if (class_exists('WPCleverWoosw')) { ?>
								<div class="woocommerce-wishlist">
									<?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="woocommerce-product-content">
				<h4 class="woocommerce-product--title">
					<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
				</h4>
				<div class="woocommerce-product--rating">
					<?php woocommerce_template_loop_rating(); ?> <span class="review-count">
						(<?php echo esc_html( $product->get_rating_count() ); ?>)
					</span>
				</div>
			</div>
		<?php } ?>
	</div>
<?php }

/* Replace text Onsale */
add_filter('woocommerce_sale_flash', 'northway_custom_sale_text', 10, 3);
function northway_custom_sale_text($text, $post, $_product)
{
	return '<span class="onsale">' . esc_html__( 'Sale!', 'northway' ) . '</span>';
}
/* Removes the "shop" title on the main shop page */
function northway_hide_page_title()
{
	return false;
}
add_filter('woocommerce_show_page_title', 'northway_hide_page_title');

add_action( 'woocommerce_before_single_product_summary', 'northway_woocommerce_single_summer_start', 0 );
function northway_woocommerce_single_summer_start() { ?>
	<?php echo '<div class="woocommerce-summary-wrap row">'; ?>
<?php }

add_action( 'woocommerce_before_add_to_cart_quantity', 'custom_before_quantity_input_field', 25 );
function custom_before_quantity_input_field() { ?>
	<?php echo '<div class="quantity-label">' . esc_html__( 'Quantity', 'northway' ) . '</div>'; ?>
<?php } 

add_action( 'woocommerce_single_product_summary', 'custom_after_quantity_input_field', 30 );
function custom_after_quantity_input_field() {
	global $product;
	?>
	<div class="wooc-product-meta">
		<?php if (class_exists('WPCleverWoosw')) { ?>
			<?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
		<?php } ?>
	</div>
	<?php
}

add_action( 'woocommerce_after_single_product_summary', 'northway_woocommerce_single_summer_end', 5 );
function northway_woocommerce_single_summer_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }

/* Checkout Page*/
add_action( 'woocommerce_checkout_before_order_review_heading', 'northway_checkout_before_order_review_heading_start', 5 );
function northway_checkout_before_order_review_heading_start() { ?>
	<?php echo '<div class="pxl-order-review-right"><div class="pxl-order-review-inner">'; ?>
<?php }

add_action( 'woocommerce_checkout_after_order_review', 'northway_checkout_after_order_review_end', 5 );
function northway_checkout_after_order_review_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }


add_action( 'woocommerce_single_product_summary', 'northway_woocommerce_sg_product_title', 9 );
function northway_woocommerce_sg_product_title() { 
	global $product; 
	$product_title = northway()->get_theme_opt( 'product_title', false ); 
	if($product_title ) : ?>
		<div class="woocommerce-sg-product-title">
			<?php woocommerce_template_single_title(); ?>
		</div>
	<?php endif; }

	add_action( 'woocommerce_single_product_summary', 'northway_woocommerce_sg_product_rating', 10 );
	function northway_woocommerce_sg_product_rating() { global $product; ?>
		<div class="woocommerce-sg-product-rating">
			<?php woocommerce_template_single_rating();
			$rating_count = $product->get_rating_count();
			$average_rating = $product->get_average_rating();
			if ( $average_rating > 0 ) {
				echo ' <span class="average-rating">' . number_format($average_rating, 1) . '</span>';
			}
			if ( $rating_count ) {
				$rating_count = $rating_count > 1 ? $rating_count . ' reviews' : $rating_count . ' review';
				echo ' <span class="review-count">(' . $rating_count . ')</span>';
			} ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'northway_woocommerce_sg_product_price', 1 );
	function northway_woocommerce_sg_product_price() { ?>
		<div class="woocommerce-sg-product-price">
			<?php woocommerce_template_single_price(); ?>
		</div>
	<?php }

	// add_filter('woocommerce_get_price_html', 'custom_dynamic_discount_label', 20, 2);
	// function custom_dynamic_discount_label($price, $product) {
	// 	if ($product->is_on_sale()) {
	// 		$regular_price = (float) $product->get_regular_price();
	// 		$sale_price    = (float) $product->get_sale_price();

	// 		if ($regular_price > 0 && $regular_price > $sale_price) {
	// 			$discount = round((($regular_price - $sale_price) / $regular_price) * 100);

	// 			$price .= '<span class="custom-discount-label">' . $discount . '% Off</span>';
	// 		}
	// 	}

	// 	return $price;
	// }


	add_action( 'woocommerce_single_product_summary', 'northway_woocommerce_sg_product_meta', 25 );
	function northway_woocommerce_sg_product_meta() { ?>
		<div class="woocommerce-sg-product-meta">
			<?php woocommerce_template_single_meta(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'northway_woocommerce_sg_product_excerpt', 20 );
	function northway_woocommerce_sg_product_excerpt() { ?>
		<div class="woocommerce-sg-product-excerpt">
			<?php woocommerce_template_single_excerpt(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'northway_woocommerce_sg_social_share', 34 );
	function northway_woocommerce_sg_social_share() { 
		$product_social_share = northway()->get_theme_opt( 'product_social_share', false );
		if($product_social_share) : ?>
			<div class="woocommerce-social-share">
				<label class="pxl-mr-20"><?php echo esc_html__('Share:', 'northway'); ?></label>
				<a class="fb-social pxl-mr-10" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a>
				<a class="tw-social pxl-mr-10" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="fab fa-x-twitter"></i></a>
				<a class="pin-social pxl-mr-10" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>%20"><i class="fab fa-pinterest-p"></i></a>
				<a class="lin-social pxl-mr-10" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="fab fa-linkedin"></i></a>
			</div>
		<?php endif; }

		add_action( 'woocommerce_single_product_summary', 'northway_woocommerce_sg_payment_methods', 35 );

		function northway_woocommerce_sg_payment_methods() {
			$text = northway()->get_theme_opt('cart_payment_methods_text', '');
			$logo = northway()->get_theme_opt('cart_payment_methods_logo', []);
			if ( !empty($text) && !empty($logo['url'])) {
				echo '<div class="payment_method_container">';
				if ( !empty($text) ) {
					echo '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
					<path d="M12.7804 1.35845C12.9262 1.3159 13.081 1.3159 13.2268 1.35845L22.7731 4.14695C22.9381 4.19539 23.0831 4.29598 23.1862 4.43365C23.2893 4.57133 23.345 4.73869 23.3451 4.9107V10.6307C23.345 13.7286 22.3702 16.748 20.5586 19.261C18.7471 21.7741 16.1907 23.6534 13.2517 24.6328C13.0882 24.6873 12.9114 24.6873 12.7479 24.6328C9.80813 23.6533 7.2511 21.7736 5.43914 19.2599C3.62719 16.7463 2.65221 13.7261 2.65234 10.6275V4.9107C2.65234 4.55753 2.88634 4.24662 3.22651 4.14695L12.7804 1.35845ZM4.24376 5.50762V10.6275C4.24376 16.2088 7.75918 21.1726 13.0003 23.0359C15.5614 22.1246 17.7776 20.443 19.3449 18.2219C20.9121 16.0008 21.7536 13.3491 21.7537 10.6307V5.50762L13.0025 2.95095L4.24376 5.50762Z" fill="black"/>
					<path d="M18.8664 8.98834C19.0155 9.13765 19.0993 9.34008 19.0993 9.55114C19.0993 9.7622 19.0155 9.96462 18.8664 10.1139L12.4985 16.4807C12.3492 16.6299 12.1468 16.7137 11.9357 16.7137C11.7247 16.7137 11.5223 16.6299 11.3729 16.4807L7.65928 12.767C7.5853 12.6931 7.52661 12.6054 7.48654 12.5088C7.44648 12.4122 7.42583 12.3086 7.42578 12.2041C7.42573 12.0995 7.44628 11.9959 7.48625 11.8993C7.52622 11.8027 7.58483 11.7149 7.65874 11.6409C7.73265 11.5669 7.8204 11.5082 7.91699 11.4681C8.01358 11.4281 8.11712 11.4074 8.22169 11.4074C8.32626 11.4073 8.42982 11.4279 8.52645 11.4679C8.62308 11.5078 8.71089 11.5664 8.78486 11.6403L11.9363 14.7928L17.7408 8.98834C17.8901 8.83917 18.0925 8.75537 18.3036 8.75537C18.5146 8.75537 18.7171 8.83917 18.8664 8.98834Z" fill="black"/>
					</svg><div class="payment_method_text">'.wp_kses_post($text).'</div>';
				}

				if ( !empty($logo['url']) ) {
					echo '<div class="payment_method_logo"><img src="'.esc_url($logo['url']).'" alt="Payment Method"/></div>';
				}
				echo '</div>';
			}
		}


/* Product Single: Gallery */
add_action( 'woocommerce_before_single_product_summary', 'northway_woocommerce_single_gallery_start', 0 );
function northway_woocommerce_single_gallery_start() { ?>
	<?php echo '<div class="woocommerce-gallery col-xl-7 col-lg-6 col-md-6"><div class="woocommerce-gallery-inner">'; ?>
<?php }
add_action( 'woocommerce_before_single_product_summary', 'northway_woocommerce_single_gallery_end', 30 );
function northway_woocommerce_single_gallery_end() { ?>
	<?php echo '</div></div><div class="woocommerce-summary-inner col-xl-5 col-lg-6 col-md-6">'; ?>
<?php }

/* Ajax update cart item */
add_filter('woocommerce_add_to_cart_fragments', 'northway_woo_mini_cart_item_fragment');
function northway_woo_mini_cart_item_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<div class="widget_shopping_cart">
		<div class="widget_shopping_head">
			<div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
			<div class="widget_shopping_title">
				<?php echo esc_html__( 'Cart', 'northway' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'northway' ), WC()->cart->cart_contents_count ); ?>)</span>
			</div>
		</div>
		<div class="widget_shopping_cart_content">
			<?php
			$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
			?>
			<ul class="cart_list product_list_widget">

				<?php if ( ! WC()->cart->is_empty() ) : ?>

				<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

						$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
						$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
						$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
						<li>
							<?php if(!empty($thumbnail)) : ?>
								<div class="cart-product-image">
									<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
										<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="cart-product-meta">
								<h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									esc_attr__( 'Remove this item', 'northway' ),
									esc_attr( $product_id ),
									esc_attr( $cart_item_key ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
								?>
							</div>	
						</li>
						<?php
					}
				}
				?>

			<?php else : ?>

				<li class="empty">
					<i class="bootstrap-icons bi-cart3"></i>
					<span><?php esc_html_e( 'Your cart is empty', 'northway' ); ?></span>
					<a class="btn btn-shop" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'northway'); ?></a>
				</li>

			<?php endif; ?>

		</ul><!-- end product list -->
	</div>
	<?php if ( ! WC()->cart->is_empty() ) : ?>
	<div class="widget_shopping_cart_footer">
		<p class="total"><strong><?php esc_html_e( 'Subtotal', 'northway' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

		<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

		<p class="buttons">
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-shop wc-forward"><?php esc_html_e( 'View Cart', 'northway' ); ?></a>
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn checkout wc-forward"><?php esc_html_e( 'Checkout', 'northway' ); ?></a>
		</p>
	</div>
<?php endif; ?>
</div>
<?php
$fragments['div.widget_shopping_cart'] = ob_get_clean();
return $fragments;
}

/* Ajax update cart total number */

function custom_related_products_on_shop_archive() {
	if (is_shop() || is_product_category() || is_product_tag()) {
		global $post;

		$product = wc_get_product($post->ID);
		if ($product) {
			$related_products = wc_get_related_products($product->get_id(), 4);

			if (!empty($related_products)) {
				echo '<h2 class="pxl-related--title">' . esc_html__('Recently Products', 'northway') . '</h2>';
				echo '<section class="related products"><ul class="products columns-4">';

				foreach ($related_products as $related_id) {
					$related_product = wc_get_product($related_id);

					if ($related_product) {
						echo '<li class="product">';
						echo '<div class="woocommerce-product-inner">';
						echo '<div class="woocommerce-product-header">';
						echo '<a href="' . esc_url(get_permalink($related_product->get_id())) . '">';
						echo wp_kses_post($related_product->get_image());
						echo '</a>';
						echo '<div class="woocommerce-product--buttons">';
						echo '<div class="woocommerce-add-to-cart">';
						echo '<div class="woocommerce-product-meta">';
						echo '<div class="woocommerce-add-to-cart list-v">';
						woocommerce_template_loop_add_to_cart(['product' => $related_product]);
						echo '</div>';

						if (class_exists('WPCleverWoosw')) {
							echo '<div class="woocommerce-wishlist">';
							echo do_shortcode('[woosw id="' . esc_attr($related_product->get_id()) . '"]');
							echo '</div>';
						}
						echo '</div>'; 
						echo '</div>'; 
						echo '</div>'; 
						echo '</div>'; 

						echo '<div class="woocommerce-product-content">';
						echo wc_get_rating_html($related_product->get_average_rating());

						echo '<h2 class="woocommerce-loop-product__title">' . esc_html($related_product->get_name()) . '</h2>';

						echo '<span class="price">' . $related_product->get_price_html() . '</span>';

						echo '</div>'; 
						echo '</div>'; 
						echo '</li>';
					}
				}

				echo '</ul></section>';
			}
		}
	}
}


add_filter( 'woocommerce_add_to_cart_fragments', 'northway_woocommerce_sidebar_cart_count_number' );
function northway_woocommerce_sidebar_cart_count_number( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter">(<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'northway' ), WC()->cart->cart_contents_count ); ?>)</span>
	<?php

	$fragments['span.widget_cart_counter'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_output_related_products_args', 'northway_related_sub', 20 );
function northway_related_sub() {
	echo '<div class="heading-related">';

	echo '<h3 class="title-related">';
	echo '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none">
	<path d="M5.68428 12.5332C5.88091 12.4236 6.12569 12.5037 6.22601 12.7059C7.76292 15.7643 10.1786 18.9364 11.8801 20.9964C16.2621 5.81822 4.06711 4.44068 1.40661 4.31851C1.11368 4.30166 0.852842 4.50808 0.780611 4.80718C-3.1038 20.8026 8.63772 21.5314 11.238 21.5019C9.5085 19.404 7.07673 16.2024 5.51574 13.1019C5.41542 12.8955 5.48765 12.6385 5.68428 12.5332Z" fill="currentColor"/>
	<path d="M11.8801 20.9964C11.8801 20.9964 11.872 21.0259 11.868 21.0385C11.7918 21.3081 11.555 21.4977 11.2862 21.5019H11.238C12.4178 22.9342 13.2645 23.8526 13.2846 23.8736C13.3648 23.9579 13.4692 24 13.5735 24C13.6778 24 13.7741 23.9621 13.8544 23.882C14.0109 23.7178 14.0149 23.4524 13.8624 23.2838C13.8423 23.2628 13.0237 22.3823 11.8801 20.9964Z" fill="currentColor"/>
	<path d="M20.2187 0.489217C20.1465 0.194332 19.8857 -0.0120879 19.5927 0.00055001C17.7869 0.084803 11.5992 0.750402 9.17142 5.90247C10.1546 6.58071 11.0735 7.4443 11.8199 8.54801C12.2693 9.21361 12.6305 9.93818 12.9114 10.7133C13.5053 9.63487 14.051 8.52695 14.4563 7.49064C14.5406 7.27579 14.7733 7.17469 14.978 7.25894C15.1826 7.34741 15.2829 7.59174 15.1987 7.80659C14.6931 9.10408 13.9868 10.4816 13.2444 11.7833C13.6136 13.2578 13.7139 14.9049 13.5414 16.7121C17.7027 15.6126 23.0197 12.015 20.2187 0.485004V0.489217Z" fill="currentColor"/>
	</svg>';
	echo esc_html__('Related Products','northway');
	echo '</h3>';

	echo '</div>';
}

add_filter( 'woocommerce_output_related_products_args', 'northway_related_products_args', 20 );
function northway_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns'] = 4;
	return $args;
}

/* Pagination Args */
function northway_filter_woocommerce_pagination_args( $array ) { 
	$array['end_size'] = 1;
	$array['mid_size'] = 1;
	return $array; 
}; 
add_filter( 'woocommerce_pagination_args', 'northway_filter_woocommerce_pagination_args', 10, 1 ); 

/* Flex Slider Arrow */
add_filter( 'woocommerce_single_product_carousel_options', 'northway_update_woo_flexslider_options' );
function northway_update_woo_flexslider_options( $options ) {
	$options['directionNav'] = true;
	return $options;
}

/* Single Thumbnail Size */
$single_img_size = northway()->get_theme_opt('single_img_size');
if(!empty($single_img_size['width']) && !empty($single_img_size['height'])) {
	add_filter('woocommerce_get_image_size_single', function ($size) {
		$single_img_size = northway()->get_theme_opt('single_img_size');
		$single_img_size_width = preg_replace('/[^0-9]/', '', $single_img_size['width']);
		$single_img_size_height = preg_replace('/[^0-9]/', '', $single_img_size['height']);
		$size['width'] = $single_img_size_width;
		$size['height'] = $single_img_size_height;
		$size['crop'] = 1;
		return $size;
	});
}
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
	$size['width'] = 600;
	$size['height'] = 600;
	$size['crop'] = 1;
	return $size;
});

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
	$size['width'] = 767;
	$size['height'] = 821;
	$size['crop'] = 1;
	return $size;
});

/* Custom Text Add to cart - Single product */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'northway_add_to_cart_button_text_single' ); 
function northway_add_to_cart_button_text_single() {
	echo esc_html__('Add to Cart', 'northway').'<i class="flaticon-cart"></i>';
}