<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Autrics_OwlSlider_Widget extends Widget_Base {

    public function get_name() {
        return 'autrics-slider';
    }

    public function get_title() {
        return esc_html__( 'autrics Sliders', 'autrics' );
    }

    public function get_icon() {
        return 'eicon-carousel';
    }

    public function get_categories() {
        return ['autrics-elements'];
    }

    protected function _register_controls() {
        
        $this->start_controls_section('section_tab_style',
            [
                'label' => esc_html__('autrics Slider', 'autrics'),
            ]
         );
         $this->add_control(
			'style',
			[
				'label' => esc_html__( 'Slider Style', 'autrics' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => esc_html__( 'Style 1', 'autrics' ),
					'style2'  => esc_html__( 'Style 2', 'autrics' ),
				],
			]
        );

         $this->add_control(
            'show_nav',
            [
                'label'       => esc_html__('Show nav', 'autrics'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__('Yes', 'autrics'),
                'label_off'   => esc_html__('No', 'autrics'),
                'default'     => 'yes',
               
            ]
         );  

         $this->add_control(
            'auto_nav_slide',
            [
                'label'       => esc_html__('Auto slide', 'autrics'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__('Yes', 'autrics'),
                'label_off'   => esc_html__('No', 'autrics'),
                'default'     => 'yes',
               
            ]
         ); 

            
        $this->add_control(
			'ts_slider_speed',
			[
				'label' => esc_html__( 'Slider Speed', 'autrics' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 3,
				'max' => 8000,
				'default' => 900,
			]
		);

         $this->add_control('autrics_slider_items',
             [
                'label'       => esc_html__('autrics Slider', 'autrics'),
                'type'        => Controls_Manager::REPEATER,
                'separator'   => 'before',
                'default'     => [
                    [ 'name' => esc_html__(' Slider #1', 'autrics') ],
         
                ],
                'fields' => [
             
                    [
                        'name'         => 'autrics_slider_title_top',
                        'label'        => esc_html__('Slider Top title', 'autrics'),
                        'type'         => Controls_Manager::TEXT,
                        'default'      => esc_html__('5 to 7 June 2019, Waterfront Hotel, London', 'autrics'),
                        'label_block'  => true,
                    ],
                    [
                        'name'          => 'autrics_slider_title',
                        'label'         => esc_html__('Slider Title', 'autrics'),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => esc_html__('digital {thinkers Meet}', 'autrics'),
                        'label_block'   => true,
                        'description'   => esc_html__( 'Help: Please Bold the text using third bracket;Ex: { Why } choose us', 'autrics' ),
                    ],
                    [
                        'name'       => 'autrics_slider_description',
                        'label'      => esc_html__('Slider Description ', 'autrics'),
                        'type'       => Controls_Manager::TEXTAREA,
                        'default'    => esc_html__('How you transform your business as technology, consumer, habits industry dynamis change? Find out from those leading the charge.', 'autrics'),
                        'label_block' => true,
                      
                    ],
                    [
                        'name'        => 'autrics_slider_bg_image',
                        'label'       => esc_html__('Background Image', 'autrics'),
                        'type'        => Controls_Manager::MEDIA,
                        'label_block' => true,
                        'separator'   => 'after',
                    ],
                    [
                        'name'        => 'autrics_slider_image',
                        'label'       => esc_html__('Slider Content Image', 'autrics'),
                        'type'        => Controls_Manager::MEDIA,
                        'label_block' => true,
                        'separator'   => 'after',
                        'description' => esc_html__('Only for style 2', 'autrics')
                    ],
                    [
                        'name'         => 'autrics_button_one_text',
                        'label'        => esc_html__('Button Text', 'autrics'),
                        'type'         => Controls_Manager::TEXT,
                        'default'      => esc_html__('Button ', 'autrics'),
                        'label_block'  => true,
                    ],
                    [
                    'name'             => 'autrics_button_one',
                    'label'            => esc_html__( 'Button', 'autrics' ),
                    'type'             => \Elementor\Controls_Manager::URL,
                    'label_block'      => true,
                    'separator'        => 'after', 
                    'separator'        => 'before',  
                     ],
                    [
                        'name'         => 'autrics_button_one_icon',
                        'label'        => esc_html__('Button Icon', 'autrics'),
                        'type'         => Controls_Manager::ICONS,
                        'label_block'  => true,
                        'default' => [
                            'value' => 'icon icon-down-arrow1',
                            'library' => 'ekiticons',
                        ],
                    ],
                                   
                   //
             
                 
                ],
            ]
        );
       
        $this->add_responsive_control(
			'thumbnail_height',
			[
				'label' =>esc_html__( 'Slider Height', 'autrics' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 645,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .slider-items' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
        );
     

        $this->add_responsive_control(
			'slider_align', [
				'label'			 => esc_html__( 'Alignment', 'autrics' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 => esc_html__( 'Left', 'autrics' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 => esc_html__( 'Center', 'autrics' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 => esc_html__( 'Right', 'autrics' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'	 => [
						'title'	 => esc_html__( 'Justified', 'autrics' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'		 => 'left',
                'selectors' => [
                    '{{WRAPPER}} .slider-items .slider-content' => 'text-align: {{VALUE}};',
				],
			]
        );//Responsive control end
        $this->end_controls_section();

        //style
        $this->start_controls_section('style_section',
            [
               'label'    => esc_html__( 'Style Section', 'autrics' ),
               'tab'      => Controls_Manager::TAB_STYLE,
            ]
       ); 
    

      $this->add_control('slider_text_top_color',
       [
          'label'     => esc_html__('Top title color', 'autrics'),
          'type'      => Controls_Manager::COLOR,
          'default'   => '',
          'selectors' => [
                '{{WRAPPER}} .slider-content h1 small' => 'color: {{VALUE}};',
          
          ],
       ]
      );

      $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'label' => __( 'Background', 'autrics' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .ts-slider-area .slider-overlay:after',
        ]
    );


      $this->add_control('slider_text_color',
            [
               'label'     => esc_html__('Title color', 'autrics'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                     '{{WRAPPER}}  .slider-content h1' => 'color: {{VALUE}};',
               
               ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'autrics_slider__title_typography',
				'label' =>  esc_html__('Title Typography ', 'autrics'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}}  .slider-content h1',
			]
		);
        
        

      $this->add_control('slider_text_highlight_color',
        [
           'label'     => esc_html__('Title highlight color', 'autrics'),
           'type'      => Controls_Manager::COLOR,
           'default'   => '',
           'selectors' => [
                 '{{WRAPPER}} .slider-content h1 span' => 'color: {{VALUE}};',
           
           ],
        ]
      );

        $this->add_control('slider_desc_color',
        [
           'label'     => esc_html__('Desc color', 'autrics'),
           'type'      => Controls_Manager::COLOR,
           'default'   => '',
           'selectors' => [
                 '{{WRAPPER}} .slider-content .slider-desc' => 'color: {{VALUE}};',
           
           ],
         ]
      );
    

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'autrics_slider_typography',
            'label' =>  esc_html__('Content Desc', 'autrics'),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .slider-content .slider-desc',
        ]
    );
        
  
      $this->end_controls_section();  
      
      $this->start_controls_section('button_style_section',
         [
            'label'    => esc_html__( 'Button', 'autrics' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

    //    Style start
    
     $this->start_controls_tabs(
			'btn_style_tabs'
		);

		$this->start_controls_tab(
			'btn_style_normal_tab',
			[
				'label' => __( 'Normal', 'autrics' ),
			]
        );
        $this->add_control('slider_button_bg_color',
        [
        'label'     => esc_html__('Button  BG color', 'autrics'),
        'type'      => Controls_Manager::COLOR,
        'default'   => '',
        'selectors' => [
                '{{WRAPPER}} .slider-content .btn-classic' => 'background: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control('slider_button_text_color',
        [
        'label'     => esc_html__('Button Text color', 'autrics'),
        'type'      => Controls_Manager::COLOR,
        'default'   => '',
        'selectors' => [
                '{{WRAPPER}} .slider-items .slider-content .btn-classic' => 'color: {{VALUE}};',
                ],
            ]
        );
     
    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'border',
            'label' => esc_html__( 'Border', 'autrics' ),
            'selector' => '{{WRAPPER}} .slider-items .slider-content .btn-classic',
        ]
    );
 
 
       
      $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'btn_typography',
            'label' => esc_html__( 'Button Typography', 'autrics' ),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .slider-items .slider-content .btn-classic',
        ]
    );
   
      $this->add_responsive_control(
        'btn_margin',
         [
               'label' => esc_html__( 'Button Padding', 'autrics' ),
               'type' => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                  '{{WRAPPER}} .slider-items .slider-content .btn-classic' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
         ]
      );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'btn_style_hover_tab',
			[
				'label' => __( 'Hover', 'autrics' ),
			]
        );
        $this->add_control('slider_button_hove_bg_color',
        [
        'label'     => esc_html__('Button Hover BG color', 'autrics'),
        'type'      => Controls_Manager::COLOR,
        'default'   => '',
        'selectors' => [
                '{{WRAPPER}} .slider-items .slider-content .btn-classic:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control('slider_button_hov_text_color',
        [
        'label'     => esc_html__('Button Text color', 'autrics'),
        'type'      => Controls_Manager::COLOR,
        'default'   => '',
        'selectors' => [
                '{{WRAPPER}} .slider-items .slider-content .btn-classic:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        
     
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hov_border',
                'label' => esc_html__( 'Button Border', 'autrics' ),
                'selector' => '{{WRAPPER}} .slider-items .slider-content .btn-classic:hover',
            ]
        );
        


		$this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();  

         //style
         $this->start_controls_section('additional_section',
            [
                'label'    => esc_html__( 'Additional Style Section', 'autrics' ),
                'tab'      => Controls_Manager::TAB_STYLE,
            ]
        ); 

        $this->add_responsive_control(
            'slider_content_padding',
             [
                   'label' => esc_html__( 'Button Padding', 'autrics' ),
                   'type' => Controls_Manager::DIMENSIONS,
                   'size_units' => [ 'px', '%', 'em' ],
                   'selectors' => [
                      '{{WRAPPER}} .slider-items .slider-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                   ],
             ]
          );

        $this->end_controls_section();  
        
       

    }

    protected function render( ) {

        $settings          =         $this->get_settings();
        $autrics_slider    =         $settings['autrics_slider_items'];
        $slider_align      =         $settings["slider_align"];
        $show_nav          =         $settings['show_nav'];
        $auto_nav_slide    =         $settings['auto_nav_slide'];
        $ts_slider_speed   =         $settings['ts_slider_speed'];
       
        $slide_controls = [
         'show_nav'=>$show_nav, 
         'auto_nav_slide'=>$auto_nav_slide, 
         'ts_slider_speed' => $ts_slider_speed, 
      
         ];
         $slide_controls = \json_encode($slide_controls); 
         
         
        if($settings['style']=='style1'):   
            include (locate_template("components/editor/elementor/widgets/style/main-slider/default.php", false, false ));  
        endif;
        if($settings['style']=='style2'): 
            include (locate_template("components/editor/elementor/widgets/style/main-slider/style2.php", false, false ));  
        endif;
       
        ?>
    
     
        <?php
    }

    protected function _content_template() { }
}