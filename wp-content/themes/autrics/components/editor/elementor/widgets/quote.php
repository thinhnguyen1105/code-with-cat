<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Autrics_Quote_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'autrics-quote-carousel';
    }

    public function get_title() {
        return esc_html__( 'Autrics Quote Carousel', 'autrics' );
    }

    public function get_icon() {
        return 'eicon-quote-carousel';
    }

    public function get_categories() {
        return ['autrics-elements'];
    }

    protected function _register_controls() {
        
        $this->start_controls_section('section_tab_style',
            [
                'label' => esc_html__('Autrics Quote Carousel', 'autrics'),
            ]
         );

         
		 $this->add_control('quote_style',
			[
				'label'        => esc_html__( 'Quote Style', 'autrics' ),
				'type'         => Custom_Controls_Manager::IMAGECHOOSE,
				'default'      => 'style1',
				'options'      => [
					'style1' => [
						'title'      => esc_html__( ' Style 1 ', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/testimonial/style1_bg.png',
                        'imagesmall' => AUTRICS_IMG. '/style/testimonial/style1_bg.png',
                        'width'     => '30%',
					],
              	'style2' => [
					    'title'      => esc_html__( ' Style 2', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/testimonial/style2_bg.png',
                        'imagesmall' => AUTRICS_IMG. '/style/testimonial/style2_bg.png',
                        'width'      => '30%',
                    ],  
                    
               'style3' => [
					    'title'      => esc_html__( ' Style 3', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/testimonial/style3.png',
                        'imagesmall' => AUTRICS_IMG. '/style/testimonial/style3.png',
                        'width'      => '30%',
               ], 

               'style4' => [
                        'title'        => esc_html__( ' Style 4', 'autrics' ),
                        'imagelarge'   => AUTRICS_IMG. '/style/testimonial/style4_bg.png',
                        'imagesmall'   => AUTRICS_IMG. '/style/testimonial/style4_bg.png',
                        'width'        => '30%',
               ],
				
			
				],
			]
		);
        $this->add_control('show_navigation',
                     [
                     'label'       => esc_html__('Show Navigation', 'autrics'),
                     'type'        => Controls_Manager::SWITCHER,
                     'label_on'    => esc_html__('Yes', 'autrics'),
                     'label_off'   => esc_html__('No', 'autrics'),
                     'default'     => 'yes',
             
                     ]
             );    
        $this->add_control('quote_slider_count',
                     [
                     'label'       => esc_html__('Count', 'autrics'),
                     'type'        => Controls_Manager::NUMBER,
                     'default'     => '2',
                     'condition'   =>['quote_style'=> 'style2']
                     ]
             );    
         $this->add_control('quote_carousel',
            [
                'label'         => esc_html__('Quote Carousel', 'autrics'),
                'type'          => Controls_Manager::REPEATER,
                'separator'     => 'before',
                'default'       => [
                     [ 
                       'name'   => esc_html__('Quote Carousel #1', 'autrics') 
                     ],
        
                ],
                'fields' => [
                    [
                        'name'         => 'name',
                        'label'        => esc_html__('Client Name', 'autrics'),
                        'type'         => Controls_Manager::TEXT,
                        'default'      => esc_html__('Donald Drump', 'autrics'),
                        'label_block'  => true,
                    ],
                    [
                        'name'         => 'designation',
                        'label'        => esc_html__('Client designation', 'autrics'),
                        'type'         => Controls_Manager::TEXT,
                        'default'      => esc_html__('CEO,apple', 'autrics'),
                        'label_block'  => true,
                    ],
                    [
                        'name'        => 'photo',
                        'label'       => esc_html__('Client Photo', 'autrics'),
                        'type'        => Controls_Manager::MEDIA,
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'title',
                        'label'       => esc_html__('Title', 'autrics'),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__('Quote Carousel #1', 'autrics'),
                        'label_block' => true,
                      
                    ],
                    [
                        'name'        => 'quote',
                        'label'       => esc_html__('Quote Carousel Review', 'autrics'),
                        'type'        => Controls_Manager::TEXTAREA,
                        'default'     => esc_html__('Keep your face always toward the sunshine and shadows will fall behind you', 'autrics'),
                        'label_block' => true,
                    ],
                 
                ],
            ]
        );
       
        $this->end_controls_section();

        //style
        $this->start_controls_section('style_section',
            [
               'label'      => esc_html__( 'Style Section', 'autrics' ),
               'tab'        => Controls_Manager::TAB_STYLE,
            ]
       ); 
      
      $this->add_control('testimonial_text_color',
            [
               'label'      => esc_html__('Title color', 'autrics'),
               'type'       => Controls_Manager::COLOR,
               'selectors'  => [

                     '{{WRAPPER}} .testimonial-content .service-name' => 'color: {{VALUE}};',
                     '{{WRAPPER}} .quote-item-info .quote-author' => 'color: {{VALUE}};',
               ],
            ]
        );

 
        
      
        $this->add_group_control(Group_Control_Typography::get_type(), 
        [
			'name'		 => 'autrics_testimonial_typography',
			'selectors'	 => [
                '{{WRAPPER}} .testimonial-body',
                '{{WRAPPER}} .testimonial-item-single',
              
                ]
			]
      );
      
      $this->end_controls_section();  

    }

    protected function render( ) {

        $settings           =     $this->get_settings();
        $quote_carousel     =     $settings['quote_carousel'];
        $style              =     $settings['quote_style'];
        $show_navigation    =     $settings["show_navigation"];
        $quote_slider_count    =  $settings["quote_slider_count"];
   
        ?>
        <?php if($style=="style1"): ?>
        <div data-nav="<?php echo esc_attr($show_navigation=="yes"?true:false); ?>" class="testimonial-carousel owl-carousel" >
        <?php foreach($quote_carousel as $quote): ?>
            <div class="testimonial-container">
                <div class="testimonial-body">
                    <div class="testimonial-content">
                        <h4 class="service-name"><?php echo autrics_kses($quote['title']);?></h4>
                       
                    </div> <!-- Testimonial Content end -->
                    <p><?php echo autrics_kses($quote['quote']);?> </p>
                    <span class="quote-icon"><i class="icon icon-quote1"></i></span>
                </div> <!-- Testimonial Body end -->
                <div class="testimonial-footer">
                   <?php if($quote['photo']['url']!=''): ?> 
                    <img src=" <?php echo esc_url( $quote['photo']['url']); ?> "  alt="testimonial" class="img-fluid">
                    <?php endif; ?> 
                    <div class="client-info">

                        <h3 class="client-name"><?php echo autrics_kses($quote['name']);?></h3>
                        <span class="client-desig"><?php echo autrics_kses($quote['designation']);?></span>
                    </div> <!-- Client info end -->
                </div><!-- Testimonial Footer end -->
            </div> <!-- Testimonial Box end -->
        <?php endforeach; ?>    
       </div> <!-- Testimonial Carousel -->
    <?php endif; ?> 
    
    <?php if($style=="style2"): ?>
 

       <div data-nav="<?php echo esc_attr( $show_navigation=="yes"?true:false); ?>" class="testimonial-standard owl-carousel" data-count="<?php echo esc_html($quote_slider_count);  ?>">
            <?php foreach($quote_carousel as $quote): ?> 
                  <div class="testimonial-item-single with-bg">
                     <div class="quote-item">
                     <?php if($quote['photo']['url']!=''): ?> 
                        <img class="img-fluid" src="<?php echo esc_url($quote['photo']['url']); ?>" alt="<?php echo esc_html($quote['name']); ?>">
                        <?php endif; ?>
                        <div class="quote-item-info">
                           <h3 class="quote-author"><?php echo esc_html( $quote['name'] ); ?></h3>
                           <span class="quote-subtext"><?php echo esc_html($quote['designation']); ?></span>
                        </div>
                     </div>
                     <!-- Item End -->
                     <p class="quote-text"><?php echo autrics_kses($quote['quote']);?></p>
                  </div>
            <?php endforeach; ?>        
               </div>
    <?php endif; ?>

    <?php if($style=="style3"): ?>
    <div class="testimonial-classic owl-carousel">
        <?php foreach($quote_carousel as $quote): ?> 
                  <div class="testimonial-item-wrapper text-center">
                     <div class="quote-item">
                     <?php if($quote['photo']['url']!=''): ?> 
                        <img class="img-fluid" src="<?php echo esc_url($quote['photo']['url']); ?>" alt="<?php echo esc_html($quote['name']); ?>">
                        <?php endif; ?>
                        <i class="icon icon-quote1"></i>
                        <div class="quote-item-info">
                           <h3 class="quote-author"><?php echo esc_html( $quote['name'] ); ?></h3>
                           <span class="quote-subtext"><?php echo esc_html( $quote['designation'] ); ?></span>
                        </div>
                     </div> <!-- Item End -->
                     <p class="quote-text"> <?php echo autrics_kses($quote['quote']);?> </p>
                  </div><!-- Testimonial item end -->

                 <?php endforeach; ?>          
                </div><!-- Testimonial item end -->  
    <?php endif; ?>
    <?php if($style=="style4"): ?>
         
         <div  data-nav="<?php echo esc_attr( $show_navigation=="yes"?true:false); ?>" class="testimonial-slide owl-carousel">
         <?php foreach($quote_carousel as $quote): ?>   
               <div class="testimonial-item">
                  <span class="icon icon-quote1"></span>
                        <p class="quote-text">
                          <?php echo autrics_kses($quote['quote']);?>
                        </p>
                  <div class="quote-item-footer">
                  <?php if($quote['photo']['url']!=''): ?> 
                        <img class="img-fluid" src="<?php echo esc_url($quote['photo']['url']); ?>" alt="<?php echo esc_html($quote['name']); ?>">
                  <?php endif; ?>
                  <div class="quote-item-info">
                        <h3 class="quote-author"><?php echo esc_html( $quote['name'] ); ?></h3>
                        <span class="quote-text"> <?php echo esc_html( $quote['designation'] ); ?> </span>
                  </div>
                  </div> <!-- Item End -->
               </div> <!-- Testimonial Single End -->
        <?php endforeach; ?>   
			</div><!-- Testimonial Slide -->

    <?php endif; ?>
      
        <?php
    }

    protected function _content_template() { }
}