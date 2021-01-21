<?php

/**
 * theme's main functions and globally usable variables, contants etc
 * added: v1.0 
 * textdomain: autrics, class: Autrics, var: $autrics_, constants: AUTRICS_, function: autrics_
 */


// shorthand contants
// ------------------------------------------------------------------------
define('AUTRICS_THEME', 'Xpeedstudio WordPress Theme');
define('AUTRICS_VERSION', '2.3');
define('AUTRICS_MINWP_VERSION', '5.2');


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('AUTRICS_THEME_URI', get_template_directory_uri());
define('AUTRICS_IMG', AUTRICS_THEME_URI . '/assets/images');
define('AUTRICS_CSS', AUTRICS_THEME_URI . '/assets/css');
define('AUTRICS_JS', AUTRICS_THEME_URI . '/assets/js');



// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('AUTRICS_THEME_DIR', get_template_directory());
define('AUTRICS_IMG_DIR', AUTRICS_THEME_DIR . '/assets/images');
define('AUTRICS_CSS_DIR', AUTRICS_THEME_DIR . '/assets/css');
define('AUTRICS_JS_DIR', AUTRICS_THEME_DIR . '/assets/js');

define('AUTRICS_CORE', AUTRICS_THEME_DIR . '/core');
define('AUTRICS_COMPONENTS', AUTRICS_THEME_DIR . '/components');
define('AUTRICS_EDITOR', AUTRICS_COMPONENTS . '/editor');
define('AUTRICS_EDITOR_ELEMENTOR', AUTRICS_EDITOR . '/elementor');
define('AUTRICS_INSTALLATION', AUTRICS_CORE . '/installation-fragments');
define('AUTRICS_REMOTE_CONTENT', esc_url('http://demo.themewinter.com/demo-content/autrics'));


// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if (!isset($content_width)) {
    $content_width = 800;
}


// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function _action_autrics_setup() {

    // make the theme available for translation
    $lang_dir = AUTRICS_THEME_DIR . '/languages';
    load_theme_textdomain('autrics', $lang_dir);

    // add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'quote'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');

    // add support for post thumbnails
    add_theme_support('post-thumbnails');

    // hard crop center center
    set_post_thumbnail_size(750, 465, ['center', 'center']);

   
    // register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'autrics'),
            'footermenu' => esc_html__('Footer Menu', 'autrics'),
        ]
    );

    // HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    //Wooocmmemrce support

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}
add_action('after_setup_theme', '_action_autrics_setup');

//Gutenberg optimization enqueue files
add_action('enqueue_block_editor_assets', 'autrics_action_enqueue_block_editor_assets' );
function autrics_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'autrics-fonts', autrics_google_fonts_url(['Dosis:400,500,600,700,700i', 'Roboto:400,500,700']), null, AUTRICS_VERSION );
    wp_enqueue_style( 'autrics-gutenberg-editor-font-awesome-styles', AUTRICS_CSS . '/font-awesome.css', null, AUTRICS_VERSION );
    wp_enqueue_style( 'autrics-gutenberg-editor-customizer-styles', AUTRICS_CSS . '/gutenberg-editor-custom.css', null, AUTRICS_VERSION );
    wp_enqueue_style( 'autrics-gutenberg-editor-styles', AUTRICS_CSS . '/gutenberg-custom.css', null, AUTRICS_VERSION );
    wp_enqueue_style( 'autrics-gutenberg-blog-styles', AUTRICS_CSS . '/blog.css', null, AUTRICS_VERSION );
}

// hooks for unyson framework
// ----------------------------------------------------------------------------------------
function _filter_autrics_framework_customizations_path($rel_path) {
    return '/components';
}
add_filter('fw_framework_customizations_dir_rel_path', '_filter_autrics_framework_customizations_path');


function _action_autrics_remove_fw_settings() {
    remove_submenu_page( 'themes.php', 'fw-settings' );
}
add_action( 'admin_menu', '_action_autrics_remove_fw_settings', 999 );


function autrics_color_rgb( $hex ) {
	$hex		 = preg_replace( "/^#(.*)$/", "$1", $hex );
	$rgb		 = array();
	$rgb[ 'r' ]	 = hexdec( substr( $hex, 0, 2 ) );
	$rgb[ 'g' ]	 = hexdec( substr( $hex, 2, 2 ) );
	$rgb[ 'b' ]	 = hexdec( substr( $hex, 4, 2 ) );

	$color_hex = $rgb[ "r" ] . ", " . $rgb[ "g" ] . ", " . $rgb[ "b" ];

	return $color_hex;
}


/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'autrics_columns', 999);
if (!function_exists('autrics_columns')) {
	function autrics_columns() {
		return 3; // 3 products per row
	}
}

// include the init.php
// ----------------------------------------------------------------------------------------

require_once( AUTRICS_CORE . '/init.php');
require_once( AUTRICS_COMPONENTS . '/editor/elementor/elementor.php');

// backups-demo
//  $test  = get_option('fw_active_extensions');
//   $test['backups-demo'] = [];
//    $test['backups'] = [];
// update_option('fw_active_extensions', $test);
//  var_dump($test);



// preloader function
// ----------------------------------------------------------------------------------------
function preloader_function(){
    $preloader_show = autrics_option('preloader_show');
        if($preloader_show == 'yes'){
        ?>
        <div id="preloader">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
            <div class="preloader-cancel-btn-wraper"> 
                <span class="btn btn-primary preloader-cancel-btn"><?php echo esc_html('Cancel Preloader', 'autrics'); ?></span>
            </div>
        </div>
    <?php
    }
}
add_action('wp_head', 'preloader_function');




