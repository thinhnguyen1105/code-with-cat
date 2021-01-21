<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */

$options =[
    'general_settings' => [
            'title'		 => esc_html__( 'General settings', 'autrics' ),
            'options'	 => [
                'general_main_logo' => [
                    'label'	        => esc_html__( 'Main logo', 'autrics' ),
                    'desc'	           => esc_html__( 'It\'s the main logo, mostly it will be shown on "dark or coloreful" type area.', 'autrics' ),
                    'type'	           => 'upload',
                    'image_only'      => true,
                 ],
                 'preloader_show' => [
                    'type'			 => 'switch',
                    'label'		    => esc_html__( 'Preloader show', 'autrics' ),
                    'desc'			 => esc_html__( 'Do you want to show preloader on your site ?', 'autrics' ),
                    'value'         => 'no',
                    'left-choice'	 => [
                       'value'     => 'yes',
                       'label'	   => esc_html__( 'Yes', 'autrics' ),
                    ],
                    'right-choice'	 => [
                       'value'	 => 'no',
                       'label'	 => esc_html__( 'No', 'autrics' ),
                    ],
                  ],
                'general_dark_logo' => [
                    'label'	        => esc_html__( 'White logo', 'autrics' ),
                    'desc'	           => esc_html__( 'It will be shown on any "light background" type area.', 'autrics' ),
                    'type'	           => 'upload',
                    'image_only'      => true,
                 ],
                 'general_sticky_sidebar' => [
                    'type'			    => 'switch',
                    'label'			 => esc_html__( 'Sticky sidebar', 'autrics' ),
                    'desc'			    => esc_html__( 'Use sticky sidebar?', 'autrics' ),
                    'value'          => 'yes',
                    'left-choice' => [
                        'value'	 => 'yes',
                        'label'	 => esc_html__( 'Yes', 'autrics' ),
                    ],
                    'right-choice' => [
                        'value'	 => 'no',
                        'label'	 => esc_html__( 'No', 'autrics' ),
                    ],
               ],
               'blog_breadcrumb_show' => [
                    'type'			    => 'switch',
                    'label'			 => esc_html__( 'Breadcrumb', 'autrics' ),
                    'desc'			    => esc_html__( 'Do you want to show breadcrumb?', 'autrics' ),
                    'value'          => 'yes',
                    'left-choice'	 => [
                        'value'	 => 'yes',
                        'label'	 => esc_html__('Yes', 'autrics'),
                    ],
                    'right-choice'	 => [
                        'value'	 => 'no',
                        'label'	 => esc_html__('No', 'autrics'),
                    ],
                ],
                'blog_breadcrumb_length' => [
                    'type'			    => 'text',
                    'label'			 => esc_html__( 'Breadcrumb word length', 'autrics' ),
                    'desc'			    => esc_html__( 'The length of the breadcumb text.', 'autrics' ),
                    'value'          => '3',
                ],
        
            ],
        ],
    ];
