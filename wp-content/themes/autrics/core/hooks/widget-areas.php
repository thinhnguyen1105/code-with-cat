<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register widget area
 */

function _action_autrics_widget_init()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Blog widget area', 'autrics'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Appears on posts.', 'autrics'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
    }

    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Footer widget area 1', 'autrics'),
                'id' => 'footer-left',
                'description' => esc_html__('Footer About.', 'autrics'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
    }

    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Footer widget area 2', 'autrics'),
                'id' => 'footer-left-middle',
                'description' => esc_html__('Footer area 2.', 'autrics'),
                'before_widget' => '<div id="%1$s" class="footer-area-2 %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
    }

    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Footer widget area 3', 'autrics'),
                'id' => 'footer-right-middle',
                'description' => esc_html__('Footer area 3.', 'autrics'),
                'before_widget' => '<div id="%1$s" class="footer-area-3 %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
    }

    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name'          => esc_html__('Footer widget area 4', 'autrics'),
                'id'            => 'footer-right',
                'description' => esc_html__('Footer area 4.', 'autrics'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
        );
    }
    if (function_exists('register_sidebar')) {
        register_sidebar(
		    [
			    'name'			 => esc_html__( 'Woocommerce sidebar Area', 'autrics' ),
			    'id'			 => 'sidebar-woo',
			    'description'	 => esc_html__( 'Appears on posts and pages.', 'autrics' ),
			    'before_widget'	 => '<div id="%1$s" class="widgets ts-grid-box %2$s">',
			    'after_widget'	 => '</div> <!-- end widget -->',
			    'before_title'	 => '<h4 class="widget-title">',
			    'after_title'	 => '</h4>',
            ] 
        );
    }
}

add_action('widgets_init', '_action_autrics_widget_init');