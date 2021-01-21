<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: banner
 */

 
$options = array(
    'banner_setting' => array(
        'title' => esc_html__('Banner Settings', 'autrics'),
        'options' => array(
            'page_banner_setting' => [
                'type'         => 'popup',
                'label'        => esc_html__('Page Banner settings', 'autrics'),
                'popup-title'  => esc_html__('Page banner settings', 'autrics'),
                'button'       => esc_html__('Edit page Banner Button', 'autrics'),
                'size'         => 'medium', // small, medium, large
                'popup-options' => [
                    'page_show_banner' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'autrics' ),
                        'desc'          => esc_html__('Show or hide the banner', 'autrics'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'autrics' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'autrics' ),
                        ],
                    ],
                    'page_show_breadcrumb' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show Breadcrumb?', 'autrics' ),
                        'desc'          => esc_html__('Show or hide the Breadcrumb', 'autrics'),
                        'value' => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'autrics' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'autrics' ),
                        ],
                    ],
                    'banner_page_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Banner title', 'autrics' ),
                        'value'   => esc_html__( 'Welcome Autrics', 'autrics' ),
                    ],

                    'banner_page_image'	 =>array(
                        'label'			 => esc_html__( 'Banner image', 'autrics' ),
                        'type'			 => 'upload',
                        'images_only'	 => true,
                        'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
                              
                        )

                ],
            ], 
        
            'blog_banner_setting' => [
                'type'           => 'popup',
                'label'          => esc_html__('Blog Banner settings', 'autrics'),
                'popup-title'    => esc_html__('Blog banner settings', 'autrics'),
                'button'         => esc_html__('Edit Blog Banner Button', 'autrics'),
                'size'           => 'medium', // small, medium, large
                'popup-options' => [
                    'blog_show_banner' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'autrics' ),
                        'desc'          => esc_html__('Show or hide the banner', 'autrics'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'autrics' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'autrics' ),
                        ],
                    ],
                    'blog_show_breadcrumb' => [
                        'type'		   	 => 'switch',
                        'label'		   	 => esc_html__( 'Show Breadcrumb?', 'autrics' ),
                        'desc'             => esc_html__('Show or hide the Breadcrumb', 'autrics'),
                        'value'            => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'autrics' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'autrics' ),
                        ],
                    ],
                    'banner_blog_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Banner title', 'autrics' ),
                        'value'   => esc_html__( 'Welcome Autrics', 'autrics' ),
                    ],
                   
                    'banner_blog_image'	 =>array(
                        'type'         => 'upload',
                        'label'        => esc_html__('Image', 'autrics'),
                        'desc'         => esc_html__('Banner blog image', 'autrics'),
                        'images_only'  => true,
                        'files_ext'    => array( 'PNG', 'JPEG', 'JPG','GIF'),
                              
                     
                    )

                ],
            ],

            'shop_banner_setting' => [
               'type'           => 'popup',
               'label'          => esc_html__('Shop Banner settings', 'autrics'),
               'popup-title'    => esc_html__('Shop banner settings', 'autrics'),
               'button'         => esc_html__('Edit shop Banner Button', 'autrics'),
               'size'           => 'medium', // small, medium, large
               'popup-options' => [
                   'shop_show_banner' => [
                       'type'			 => 'switch',
                       'label'			 => esc_html__( 'Show banner?', 'autrics' ),
                       'desc'          => esc_html__('Show or hide the banner', 'autrics'),
                       'value'         => 'yes',
                       'left-choice'	 => [
                           'value'	 => 'yes',
                           'label'	 => esc_html__( 'Yes', 'autrics' ),
                       ],
                       'right-choice'	 => [
                           'value'	 => 'no',
                           'label'	 => esc_html__( 'No', 'autrics' ),
                       ],
                   ],
                   'shop_show_breadcrumb' => [
                       'type'		   	 => 'switch',
                       'label'		   	 => esc_html__( 'Show Breadcrumb?', 'autrics' ),
                       'desc'             => esc_html__('Show or hide the Breadcrumb', 'autrics'),
                       'value'            => 'yes',
                       'left-choice'	 => [
                           'value'	 => 'yes',
                           'label'	 => esc_html__( 'Yes', 'autrics' ),
                       ],
                       'right-choice'	 => [
                           'value'	 => 'no',
                           'label'	 => esc_html__( 'No', 'autrics' ),
                       ],
                   ],
                   'shop_banner_single_title'	 => [
                       'type'	 => 'text',
                       'label'	 => esc_html__( 'Product details title', 'autrics' ),
                       'value'   => esc_html__( 'Product details', 'autrics' ),
                   ],
                   'shop_banner_title'	 => [
                     'type'	 => 'text',
                     'label'	 => esc_html__( 'Banner title', 'autrics' ),
                     'value'   => esc_html__( 'Welcome autrics shop', 'autrics' ),
                  ],
                  
                   'shop_banner_image'	 =>array(
                       'type'         => 'upload',
                       'label'        => esc_html__('Image', 'autrics'),
                       'desc'         => esc_html__('Banner shop image', 'autrics'),
                       'images_only'  => true,
                       'files_ext'    => array( 'PNG', 'JPEG', 'JPG','GIF'),
                             
                    
                   )

               ],
           ],

            'service_banner_setting' => [
               'type'           => 'popup',
               'label'          => esc_html__('Service Banner settings', 'autrics'),
               'popup-title'    => esc_html__('Service banner settings', 'autrics'),
               'button'         => esc_html__('Edit Service Banner Button', 'autrics'),
               'size'           => 'medium', // small, medium, large
               'popup-options' => [
                   'service_show_banner' => [
                       'type'			 => 'switch',
                       'label'			 => esc_html__( 'Show banner?', 'autrics' ),
                       'desc'          => esc_html__('Show or hide the banner', 'autrics'),
                       'value'         => 'yes',
                       'left-choice'	 => [
                           'value'	 => 'yes',
                           'label'	 => esc_html__( 'Yes', 'autrics' ),
                       ],
                       'right-choice'	 => [
                           'value'	 => 'no',
                           'label'	 => esc_html__( 'No', 'autrics' ),
                       ],
                   ],
                   'service_show_breadcrumb' => [
                       'type'		   	 => 'switch',
                       'label'		   	 => esc_html__( 'Show Breadcrumb?', 'autrics' ),
                       'desc'             => esc_html__('Show or hide the Breadcrumb', 'autrics'),
                       'value'            => 'yes',
                       'left-choice'	 => [
                           'value'	 => 'yes',
                           'label'	 => esc_html__( 'Yes', 'autrics' ),
                       ],
                       'right-choice'	 => [
                           'value'	 => 'no',
                           'label'	 => esc_html__( 'No', 'autrics' ),
                       ],
                   ],
                   'banner_service_title'	 => [
                       'type'	 => 'text',
                       'label'	 => esc_html__( 'Banner title', 'autrics' ),
                       'value'   => esc_html__( 'Welcome Autrics Service', 'autrics' ),
                   ],
                  
                   'banner_service_image'	 =>array(
                       'type'         => 'upload',
                       'label'        => esc_html__('Image', 'autrics'),
                       'desc'         => esc_html__('Banner Service image', 'autrics'),
                       'images_only'  => true,
                       'files_ext'    => array( 'PNG', 'JPEG', 'JPG','GIF'),
                             
                    
                   )

               ],
           ],

        ),
    ),
);