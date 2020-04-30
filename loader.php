<?php 
/*
Plugin Name: Purelogic customizer
Plugin URI: http://www.pranaair.com
Description: This plugin allows you to modify the theme and plugin as per your requirement.
Author: Madhvendra pratap singh
Version: 1.0
Author URI: https://www.linkedin.com/in/madhvendras84/
*/


// add_action('woocommerce_before_checkout_form', 'displays_notice_on_checkout', 10);
// function displays_notice_on_checkout() {
// 	$product_id = 69;
// 	$product_title = get_the_title($product_id);
// 	$product_link = get_the_permalink($product_id);

// 	$product_cart_id = WC()->cart->generate_cart_id( $product_id );
// 	$in_cart = WC()->cart->find_product_in_cart( $product_cart_id );

// 	if ( $in_cart ) {

// 		$notice = '<div class="add-custom-notice">Currently, we do not ship this product in India. </div> <a href="'.$product_link.'">View Product</a>';

// 		wc_print_notice( $notice, 'notice' );

// 	}

// }

add_action('woocommerce_before_checkout_form', 'displays_notice_on_checkout_page', 380);

function displays_notice_on_checkout_page() {
	$product_id = 6;
	$product_title = get_the_title($product_id);
	$product_link = get_the_permalink($product_id);

	global $woocommerce;
	foreach($woocommerce->cart->get_cart() as $key => $val ) {
		$_product = $val['data'];
		if($product_id == $_product->get_id() ) {

			$notice = '<div class="add-custom-notice">Currently, we do not ship this product in India. </div> <a href="'.$product_link.'">View Product</a>';

			wc_print_notice( $notice, 'notice' );
		}
	}
}

add_action( 'wp_body_open', 'show_a_custom_notice_above_header' );
function show_a_custom_notice_above_header() {
	?>
	<style>
		.alert {
			padding: 8px;
			background-color: #f44336;
			color: white;
			opacity: 1;
			transition: opacity 0.6s;
			font-size: 16px;
			font-family: ProximaNova-Regular;
			font-weight: 500;
			letter-spacing: 1px;
		}
		.alert.success {
			background: linear-gradient(to right, #dce35b, #68b555);
			text-align: center;
		}
		.closebtn {
			margin-left: 15px;
			color: red;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
		}

		.closebtn:hover {
			color: black;
		}
	</style>
	<?php
	echo '<div class="alert success">';
	echo '<span class="closebtn">&times;</span>  ';
	echo 'The delivery of orders might take longer than usual times due to the government regulations.<br/>';
	echo 'Please email us at <a href="mailto:rahul@purelogic.in"> rahul@purelogic.in</a> for more details.</div>';
	?>
	<script>
		var close = document.getElementsByClassName("closebtn");
		var i;
		for (i = 0; i < close.length; i++) {
			close[i].onclick = function(){
				var div = this.parentElement;
				div.style.opacity = "0";
				setTimeout(function(){ div.style.display = "none"; }, 600);
			}
		}
	</script>
	<?php
}

add_action('wp_head', 'add_gtm_codes_in_head_tag', 10);

function add_gtm_codes_in_head_tag(){
	?>
	<!-- Global site tag (gtag.js) - Google Ads: 959758292 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-959758292"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'AW-959758292');
	</script>

	<!-- Event snippet for Website sale conversion page -->
	<script>
		gtag('event', 'conversion', {
			'send_to': 'AW-959758292/veS-CMPo4ssBENT_0skD',
			'transaction_id': ''
		});
	</script>
	<?php
}


// adding paroller.js for the horizontal parallax effect.

add_action('wp_footer', function(){
if (is_page ('10133')) { 
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/paroller.js@1.3.1/dist/jquery.paroller.min.js"></script>
<script>
jQuery(document).ready(function($){
$(".vera-verto2 .elementor-image img").paroller({
factor: -0.08,
type: 'foreground', 
direction: 'horizontal'
});
	
$(".vera-verto1 .elementor-image img").paroller({
factor: -0.2,
type: 'foreground', 
direction: 'horizontal'
});
	
$(".vera-verto .elementor-image img").paroller({
factor: 0.2,
type: 'foreground', 
direction: 'horizontal'
});

	
$(".vera-verto-vertical .elementor-image img").paroller({
factor: 0.6,
type: 'foreground', 
direction: 'vertical'
});
});	
</script>
<?php
}
}, 9999);