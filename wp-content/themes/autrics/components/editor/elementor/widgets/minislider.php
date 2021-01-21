<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Autrics_MiniSlider_Widget extends Widget_Base {

    public function get_name() {
        return 'autrics-contentSlider';
    }

    public function get_title() {
        return esc_html__( 'autrics Intro Carasoul Sliders', 'autrics' );
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
                'label'      => esc_html__('autrics Content Slider', 'autrics'),
            ]
         );

          
         $this->add_control('autrics_slider_items',
            [
                'label'     => esc_html__('autrics Slider', 'autrics'),
                'type'      => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default'   => [
                        [ 
                           'name' => esc_html__('tips slider', 'autrics')
                        ],
         
                ],
                'fields' => [
                           
                    [
                        'name'             => 'autrics_slider_title',
                        'label'            => esc_html__('Slider Title', 'autrics'),
                        'type'             => Controls_Manager::TEXT,
                        'default'          => esc_html__('{ vahicle } Tips', 'autrics'),
                        'label_block'      => true,
                        'description'      => esc_html__( 'Help: Please Bold the text using third  bracket;Ex: { vahicle } Tips', 'autrics' ),
                    ],
                    [
                        'name'             => 'autrics_slider_description',
                        'label'            => esc_html__('Slider Description ', 'autrics'),
                        'type'             => Controls_Manager::TEXTAREA,
                        'default'          => esc_html__('Most of the vehicles get damaged just because of maintenance neglect. If you take care of your vehicles
                        , it will keep you safe.', 'autrics'),
                        'label_block'      => true,
                      
                    ],
                              
                               
                ],
            ]
        );
       
         $this->add_control('intro_carousel_icon',
            [
               'label'       => esc_html__( 'Icon', 'autrics' ),
               'type'        => Custom_Controls_Manager::ICON,
               'label_block' => true,
               'default'     => 'icon icon-tie',
            ]
         );
         
        $this->add_responsive_control(	'slider_align',
         [
				'label'			 =>esc_html__( 'Alignment', 'autrics' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 =>esc_html__( 'Left', 'autrics' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 =>esc_html__( 'Center', 'autrics' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 =>esc_html__( 'Right', 'autrics' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'	 => [
						'title'	 =>esc_html__( 'Justified', 'autrics' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'		 => 'left',
                'selectors' => [
                    '{{WRAPPER}} .intro-content' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .intro-content h2' => 'text-align: {{VALUE}};',
				],
			]
        );
        //Responsive control end
        
        $this->end_controls_section();

        //style
        $this->start_controls_section('style_section',
		   [
				'label'    => esc_html__( 'Style Section', 'autrics' ),
				'tab'      => Controls_Manager::TAB_STYLE,
			]
		); 
      $this->add_control('slider_text_color',
         [
             'label' => esc_html__('title color', 'autrics'),
             'type' => Controls_Manager::COLOR,
             'default' => '',
             'selectors' => [
                  '{{WRAPPER}} .intro-content h2' => 'color: {{VALUE}};',
              
             ],
         ]
        );

      $this->add_control('slider_icon_color',
         [
             'label'     => esc_html__('Icon color', 'autrics'),
             'type'      => Controls_Manager::COLOR,
             'default'   => '',
             'selectors' => [
                  '{{WRAPPER}} .ts-intro-wrapper i' => 'color: {{VALUE}};',
              
             ],
         ]
        );
      
      $this->add_group_control(Group_Control_Typography::get_type(),
       [
			'name'		 => 'autrics_slider_typography',
			'selectors'	 => [
                '{{WRAPPER}} .intro-content',
                      
                ]
			]
        );
        
  
      $this->end_controls_section();  

    }

    protected function render( ) {

        $settings               = $this->get_settings();
        $autrics_slider_items = $settings["autrics_slider_items"];
        $intro_carousel_icon    = $settings["intro_carousel_icon"];

     ?>
     
      <div class="ts-intro-wrapper intro-carousel">
         <div class="intro-content-carousel owl-carousel">
            <?php foreach($autrics_slider_items as $item): ?>
                  <?php $title_1 = str_replace(['{', '}'], ['<span>', '</span>'],$item["autrics_slider_title"]);  ?>
                  <div class="intro-content">
                     <h2> <?php echo autrics_kses($title_1); ?></h2>
                     <div class="intro-carousel">
                        <p><?php echo autrics_kses($item["autrics_slider_description"]); ?></p>
                     </div>
                  </div><!-- Intro Content End -->
            <?php endforeach; ?>    
         </div><!-- Intro Carousel end -->
       
         <?php if($intro_carousel_icon!=''): ?>
         <i class="<?php echo esc_attr($intro_carousel_icon); ?>"></i>
         <?php endif; ?>

      </div><!-- Intro Wrapper End -->
     
   <?php      
 
    }

    protected function _content_template() { }
}