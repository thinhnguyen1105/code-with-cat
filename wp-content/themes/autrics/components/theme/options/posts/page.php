<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */

$options = [
	'settings-page' => [
		'title'		 => esc_html__( 'Page settings', 'autrics' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => [
			'header_title'	 => [
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'autrics' ),
				'desc'	 => esc_html__( 'Add your Page hero title', 'autrics' ),
         ],
			'header_image'	 => [
				'label'	 => esc_html__( ' Banner image', 'autrics' ),
				'desc'	 => esc_html__( 'Upload a page header image', 'autrics' ),
				'help'	 => esc_html__( "This default header image will be used for all your service.", 'autrics' ),
				'type'	 => 'upload'
         ],
         'page_header_override' => [
            'type'			 => 'switch',
            'label'			 => esc_html__( 'Override default header layout?', 'autrics' ),
            'desc'  => esc_html__('Override customizer header layout', 'autrics'),
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
         'page_header_layout_style' => [
            'label'	        => esc_html__( 'Header style', 'autrics' ),
            'desc'	        => esc_html__( 'This is the site\'s main header style.', 'autrics' ),
            'type'	        => 'image-picker',
            'choices'       => [
                'one'    => [
                       'small'     => AUTRICS_IMG . '/admin/header-style/style1.png',
                       
                 ],
                'two'    => [
                       'small'     => AUTRICS_IMG . '/admin/header-style/style2.png',
                     
                 ],

                'three'    => [
                       'small'     => AUTRICS_IMG . '/admin/header-style/style3.png',
                       
                ],

               'four'     => [
                       'small'     => AUTRICS_IMG . '/admin/header-style/style4.png',
                     
               ],
               'five'     => [
                  'small'     => AUTRICS_IMG . '/admin/header-style/style5.png',
                
               ],
            ],
            'value'         => 'three',
         ], //Header style
         
      ],
   ],
];
