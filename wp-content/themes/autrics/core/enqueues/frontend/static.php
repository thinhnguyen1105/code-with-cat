<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	// wp_enqueue_style() $handle, $src, $deps, $version

	// 3rd party css
	wp_enqueue_style( 'autrics-fonts', autrics_google_fonts_url(['Dosis:400,500,600,700,700i', 'Roboto:400,500,700']), null, AUTRICS_VERSION );
	
	wp_enqueue_style( 'bootstrap', AUTRICS_CSS . '/bootstrap.min.css', null, AUTRICS_VERSION );

	if( is_rtl() ){
		wp_enqueue_style( 'bootstrap-rtl',  AUTRICS_CSS . '/bootstrap.min-rtl.css', null,  AUTRICS_VERSION );
	}

	wp_enqueue_style( 'font-awesome', AUTRICS_CSS . '/font-awesome.css', null, AUTRICS_VERSION );
	wp_enqueue_style( 'icon-font', AUTRICS_CSS . '/icofont.css', null, AUTRICS_VERSION );
	wp_enqueue_style( 'magnific-popup', AUTRICS_CSS . '/magnific-popup.css', null, AUTRICS_VERSION );
	wp_enqueue_style( 'owlcarousel', AUTRICS_CSS . '/owlcarousel.min.css', null, AUTRICS_VERSION );
	wp_enqueue_style( 'woocommerce', AUTRICS_CSS . '/woocommerce.css', null, AUTRICS_VERSION );
   wp_enqueue_style( 'select2-full-style', AUTRICS_CSS . '/select2.min.css', null, AUTRICS_VERSION );
   wp_enqueue_style( 'autrics-gutenberg-custom', AUTRICS_CSS . '/gutenberg-custom.css', null, AUTRICS_VERSION );
   // theme css
	wp_enqueue_style( 'autrics-style', AUTRICS_CSS . '/master.css', null, AUTRICS_VERSION );
	
}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	// wp_enqueue_script() $handle, $src, $deps, $version, $in_footer(boolean)

	// 3rd party scripts
	if ( is_rtl() ) {
		wp_enqueue_script( 'bootstrap-rtl',  AUTRICS_JS . '/bootstrap.min-rtl.js', array( 'jquery' ),  AUTRICS_VERSION, true );
	}else{
		wp_enqueue_script( 'bootstrap', AUTRICS_JS . '/bootstrap.min.js', array( 'jquery' ), AUTRICS_VERSION, true );
	}
	wp_enqueue_script( 'popper', AUTRICS_JS . '/popper.min.js', array( 'jquery' ), AUTRICS_VERSION, true );
	wp_enqueue_script( 'magnific-popup', AUTRICS_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ), AUTRICS_VERSION, true );
	wp_enqueue_script( 'owl-carousel', AUTRICS_JS . '/owl-carousel.2.3.0.min.js', array( 'jquery' ), AUTRICS_VERSION, true );
	wp_enqueue_script( 'select2-full', AUTRICS_JS . '/select2.full.min.js', array( 'jquery' ), AUTRICS_VERSION, true );
   
	// theme scripts
	wp_enqueue_script( 'autrics-main', AUTRICS_JS . '/script.js', array( 'jquery' ), AUTRICS_VERSION, true );

	
	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}