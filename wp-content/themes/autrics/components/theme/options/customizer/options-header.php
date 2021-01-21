<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: Header
 */

$options =[
    'header_settings' => [
        'title'		 => esc_html__( 'Header settings', 'autrics' ),

        'options'	 => [

            'header_layout_style' => [
                'label'	        => esc_html__( 'Header style', 'autrics' ),
                'desc'	        => esc_html__( 'This is the site\'s main header style.', 'autrics' ),
                'type'	        => 'image-picker',
                'choices'       => [
                    'one'    => [
                           'small'     => AUTRICS_IMG . '/admin/header-style/style1.png',
                           'large'     => AUTRICS_IMG . '/admin/header-style/style1.png',
                     ],
                    'two'    => [
                           'small'     => AUTRICS_IMG . '/admin/header-style/style2.png',
                           'large'     => AUTRICS_IMG . '/admin/header-style/style2.png',
                     ],

                    'three'    => [
                           'small'     => AUTRICS_IMG . '/admin/header-style/style3.png',
                           'large'     => AUTRICS_IMG . '/admin/header-style/style3.png',
                    ],

                   'four'     => [
                           'small'     => AUTRICS_IMG . '/admin/header-style/style4.png',
                           'large'     => AUTRICS_IMG . '/admin/header-style/style4.png',
                   ],
                   'five'     => [
                    'small'     => AUTRICS_IMG . '/admin/header-style/style5.png',
                    'large'     => AUTRICS_IMG . '/admin/header-style/style5.png',
                    ],
                ],
                'value'         => 'three',
             ], //Header style
             'header_top_bar_settings' => [
                'type'        => 'popup',
                'label'       => esc_html__('Header TopBar settings', 'autrics'),
                'popup-title' => esc_html__('Header topbar settings', 'autrics'),
                'button'      => esc_html__('Edit header topbar', 'autrics'),
                'size'        => 'small', // small, medium, large
                'popup-options' => [
               
                    'header_topbar_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Open Time', 'autrics' ),
                        'value'   => esc_html__( 'Open Time', 'autrics' ),
                    ],
                    'header_topbar_social_links' => [
                        'type'         => 'addable-popup',
                        'template'     => '{{- title }}',
                        'popup-title'  => null,
                        'label'        => esc_html__( 'Social links', 'autrics' ),
                        'desc'         => esc_html__( 'Add social links and it\'s icon class bellow. These are all fontaweseome-4.7 icons.', 'autrics' ),
                        'add-button-text' => esc_html__( 'Add new', 'autrics' ),
                        'popup-options' => [
                            'title' => [ 
                                'type'    => 'text',
                                'label'   => esc_html__( 'Title', 'autrics' ),
                            ],
                            'icon_class' => [ 
                                'type'    => 'new-icon',
                                'label'   => esc_html__( 'Social icon', 'autrics' ),
                            ],
                            'url' => [ 
                                'type'   => 'text',
                                'label'  => esc_html__( 'Social link', 'autrics' ),
                            ],
                        ],
                        'value' => [
                            [
                                'title'      => 'Facebook',
                                'icon_class' => 'fa fa-facebook',
                                'url'        => 'http://facebook.com/themewinter/',
                            ],
                        ],
                    ],

                ],
            ],
            'header_contact_settings' => [
                'type'          => 'popup',
                'label'         => esc_html__('Header Contact settings', 'autrics'),
                'popup-title'   => esc_html__('Header Contact settings', 'autrics'),
                'button'        => esc_html__('Edit header Contact', 'autrics'),
                'size'          => 'medium', // small, medium, large
                'popup-options' => [
                     
                    'header_contact_icon'	 => [
                        'type'	 => 'new-icon',
                        'label'	 => esc_html__( 'Phone icon', 'autrics' ),
                        'value'   => esc_html__( 'icon', 'autrics' ),
                    ],
                    'header_contact_title'	 => [
                        'type'	    => 'text',
                        'label'  	 => esc_html__( 'Phone title', 'autrics' ),
                        'value'      => esc_html__( 'Call Us', 'autrics' ),
                    ],
                    'header_contact_number'	 => [
                        'type'	  => 'text',
                        'label'	  => esc_html__( 'Phone number', 'autrics' ),
                        'value'    => esc_html__( '+91 458 654 528', 'autrics' ),
                    ],
                    'header_contact_number'	 => [
                        'type'	  => 'text',
                        'label'	  => esc_html__( 'Phone number', 'autrics' ),
                        'value'    => esc_html__( '+91 458 654 528', 'autrics' ),
                    ],
                    'header_contact_number_link' => [
                        'type'	  => 'text',
                        'label'	  => esc_html__( 'Phone number link', 'autrics' ),
                        'desc'	  => esc_html__( 'Give contact phone number link without any spacing for example [ tel:123-456-7890 ].', 'autrics' ),
                    ],
                    'header_contact_mail_icon'	 => [
                        'type'	 => 'new-icon',
                        'label'	 => esc_html__( 'Mail icon', 'autrics' ),
                        'value'   => esc_html__( 'icon', 'autrics' ),
                    ],
                    'header_contact_mail_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Email title', 'autrics' ),
                        'value'   => esc_html__( 'Send us mail', 'autrics' ),
                    ],
                    'header_contact_mail'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Email', 'autrics' ),
                        'value'   => esc_html__( 'query@finances.com', 'autrics' ),
                    ],
                    'header_contact_mail_link' => [
                        'type'	  => 'text',
                        'label'	  => esc_html__( 'Email link', 'autrics' ),
                        'desc'	  => esc_html__( 'Give contact Email link without any spacing for example [ mailto:example@domain.com].', 'autrics' ),
                    ],
                   

                ],
            ],
            'header_contact_button_settings' => [
                'type'          => 'popup',
                'label'         => esc_html__('Header Contact button settings', 'autrics'),
                'popup-title'   => esc_html__('Header Contact button settings', 'autrics'),
                'button'        => esc_html__('Edit header Contact button', 'autrics'),
                'size'          => 'small', // small, medium, large
                'popup-options' => [
                    'header_contact_btn_show' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show button?', 'autrics' ),
                        'desc'          => esc_html__('Show or hide the header contact button', 'autrics'),
                        'value'         => 'no',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'autrics' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'autrics' ),
                        ],
                    ],
                    'header_contact_btn_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Button title', 'autrics' ),
                        'value'   => esc_html__( 'Contact', 'autrics' ),
                    ],
                    'header_contact_btn_url'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Button Url', 'autrics' ),
                        'desc'	 => esc_html__( 'Put the url of the button', 'autrics' ),
                        'value'   => '#',
                    ],

                ],
            ],
             
            'header_nav_sticky_section' => [
                  'type'			 => 'switch',
                  'label'		 => esc_html__( 'Sticky header show', 'autrics' ),
                  'desc'			 => esc_html__( 'Do you want to show sticky in header ?', 'autrics' ),
                  'value'       => 'no',
                  'left-choice'	 => [
                     'value'   	     => 'yes',
                     'label'	        => esc_html__( 'Yes', 'autrics' ),
                  ],
                  'right-choice'	 => [
                     'value'	 => 'no',
                     'label'	 => esc_html__( 'No', 'autrics' ),
                  ],
            ],

             'header_nav_search_section' => [
                  'type'			 => 'switch',
                  'label'		 => esc_html__( 'Search button show', 'autrics' ),
                  'desc'			 => esc_html__( 'Do you want to show search button in header ?', 'autrics' ),
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
            
             'header_nav_shopping_cart_section' => [
                  'type'			 => 'switch',
                  'label'		 => esc_html__( 'Shopping cart show', 'autrics' ),
                  'desc'			 => esc_html__( 'Do you want to show shopping cart button in header ?', 'autrics' ),
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
      ], //Options end
    ]
];