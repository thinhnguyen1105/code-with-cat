<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */

$options =[
    'footer_settings' => [
        'title'		 => esc_html__( 'Footer settings', 'autrics' ),

        'options'	 => [

            'footer_style' => array(
                'type'         => 'multi-picker',
                'label'        => false,
                'desc'         => false,
                'picker'       => array(
                    'style' => array(
                        'label'   => esc_html__( 'Select Style', 'autrics' ),
                        'type'    => 'image-picker',
                        'value'   => 'style-1',
                        'choices'	 => [
                            'style-1' => [
                                'small'	 => [
                                    'height' => 30,
                                    'src'	   => AUTRICS_IMG. '/style/footer/style-1.png'
                                ],
                                'large' => [
                                    'width'	 => 370,
                                    'src'	    => AUTRICS_IMG. '/style/footer/style-1.png'
                                ],
                            ],
                            'style-2' => [
                                'small'	 => [
                                    'height' => 30,
                                    'src'	   => AUTRICS_IMG. '/style/footer/style-2.png'
                                ],
                                'large' => [
                                    'width'	 => 370,
                                    'src'	    => AUTRICS_IMG. '/style/footer/style-2.png'
                                ],
                            ],
                         
                        ],
                        
                    )
                ),
              
            ), 
     
          
            'footer_bg_color' => [
                'label'	 => esc_html__( 'Footer Background color', 'autrics'),
                'type'	 => 'color-picker',
                'desc'	 => esc_html__( 'You can change the footer\'s background color with rgba color or solid       color', 'autrics'),
            ],
            'footer_bg_image' => [
                'label'            => esc_html__('Footer Background Image', 'autrics'),
                'desc'               => esc_html__('It will be shown on footer "background" area.', 'autrics'),
                'type'               => 'upload',
                'image_only'      => true,
            ],
            
            'footer_copyright_color' => [
                'label'	 => esc_html__( 'Footer Copyright color', 'autrics'),
                'type'	 => 'color-picker',
                'desc'	 => esc_html__( 'You can change the footer\'s background color with rgba color or solid color', 'autrics'),
            ],
          
            'footer_copyright'	 => [
                'type'	 => 'textarea',
                'value'  => '&copy; 2019, Autrics. All rights reserved',
                'label'	 => esc_html__( 'Copyright text', 'autrics' ),
                'desc'	 => esc_html__( 'This text will be shown at the footer of all pages.', 'autrics' ),
            ],

            'footer_padding_top' => [
                'label'	        => esc_html__( 'Footer Padding Top', 'autrics' ),
                'desc'	        => esc_html__( 'Use Footer Padding Top', 'autrics' ),
                'type'	        => 'text',
                'value'         => '0px',
             ],
             'back_to_top'				 => [
                'type'			 => 'switch',
                'value'			 => 'hello',
                'label'			 => esc_html__( 'Back to top', 'autrics'),
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'autrics'),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'autrics'),
                ],
            ],
            
        ],
            
        ]
    ];