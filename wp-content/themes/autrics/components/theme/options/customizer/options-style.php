<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$options =[
    'style_settings' => [
            'title'		 => esc_html__( 'Style settings', 'autrics' ),
            'options'	 => [
                'style_body_bg' => [
                    'label'	     => esc_html__( 'Body background', 'autrics' ),
                    'desc'	        => esc_html__( 'Site\'s main background color.', 'autrics' ),
                    'type'	        => 'color-picker',
                 ],
                'style_primary' => [
                    'label'	     => esc_html__( 'Primary color', 'autrics' ),
                    'desc'	        => esc_html__( 'Site\'s main color.', 'autrics' ),
                    'type'	        => 'color-picker',
                 ],

                 'style_secondary' => [
                  'label'	     => esc_html__( 'Secondary color', 'autrics' ),
                  'desc'	        => esc_html__( 'Site\'s main color.', 'autrics' ),
                  'type'	        => 'color-picker',
                 ],
                 'button_style' => [
                    'type'			 => 'switch',
                    'label'		 => esc_html__( 'Button shap Style', 'autrics' ),
                    'desc'			 => esc_html__( 'Do you want to show button shap style in all pages ?', 'autrics' ),
                    'value'       => 'yes',
                    'left-choice'	 => [
                        'value'   	     => 'yes',
                        'label'	        => esc_html__( 'Yes', 'autrics' ),
                    ],
                    'right-choice'	 => [
                        'value'	 => 'no',
                        'label'	 => esc_html__( 'No', 'autrics' ),
                    ],
                ],

                'body_font'    => array(
                    'type'        => 'typography-v2',
                    'label'       => esc_html__('Body Font', 'autrics'),
                    'desc'        => esc_html__('Choose the typography for the title', 'autrics'),
                    'value'   => array(
                        'family'    => 'Roboto',
                        'size'      => '16',
                    ),
                    'components' => array(
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ),
                ),
                
                'heading_font_one'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'	     => 'Dosis',
                        'size'        => '',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H1 and H2 Fonts', 'autrics' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'autrics' ),
                ],

                'heading_font'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Dosis',
                        'size'        => '24',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H3 and H4 Fonts', 'autrics' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'autrics' ),
                ],

          

            
            
            ],
        ],
    ];