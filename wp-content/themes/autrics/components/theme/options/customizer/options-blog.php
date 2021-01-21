<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */

$options =[
    'blog_settings' => [
        'title'		 => esc_html__( 'Blog settings', 'autrics' ),

        'options'	 => [
            'blog_sidebar' =>[
                'type'  => 'select',
                'value' => '3',             
                'label' => esc_html__('Sidebar', 'autrics'),
                'desc'  => esc_html__('Description', 'autrics'),
                'help'  => esc_html__('Help tip', 'autrics'),
                'choices' => array(
                    '1' => esc_html__('No sidebar','autrics'),
                    '2' => esc_html__('Left Sidebar', 'autrics'),
                    '3' => esc_html__('Right Sidebar', 'autrics'),
                 
                 ),
              
                'no-validate' => false,
            ],   
            'blog_title' => [
                'label'	 => esc_html__( 'Global blog title', 'autrics' ),
                'type'	 => 'text',
            ],
            'blog_header_image' => [
                'label'	 => esc_html__( 'Global header background image', 'autrics' ),
                'type'	 => 'upload',
             ],
            'blog_breadcrumb' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Breadcrumb', 'autrics' ),
                'desc'			 => esc_html__( 'Do you want to show breadcrumb?', 'autrics' ),
                'value'        => 'yes',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'autrics' ),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'autrics' ),
                ],
            ],
            'blog_author' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Blog author', 'autrics' ),
                'desc'			 => esc_html__( 'Do you want to show blog author?', 'autrics' ),
                'value'          => 'no',
                'left-choice' => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'autrics' ),
                ],
                'right-choice' => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'autrics' ),
                ],
           ],
            'blog_social_share' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Social share', 'autrics' ),
                'desc'			 => esc_html__( 'Do you want to show social share buttons?', 'autrics' ),
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
           'blog_date_style' => [
            'type'			 => 'switch',
            'label'			 => esc_html__( 'Blog Date', 'autrics' ),
            'desc'			 => esc_html__( 'Do you want to show Creative or Classic date?', 'autrics' ),
            'value'          => 'classic',
            'left-choice' => [
                'value'	 => 'creative',
                'label'	 => esc_html__( 'Creative', 'autrics' ),
            ],
            'right-choice' => [
                'value'	 => 'classic',
                'label'	 => esc_html__( 'Classic', 'autrics' ),
            ],
       ],
        ],
            
        ]
    ];