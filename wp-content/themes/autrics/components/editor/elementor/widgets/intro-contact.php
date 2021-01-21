<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Autrics_intro_contact_Widget extends Widget_Base {

    public function get_name() {
        return 'autrics-intro-contact';
    }

    public function get_title() {
        return esc_html__( 'autrics Intro contact ', 'autrics' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return ['autrics-elements'];
    }

    protected function _register_controls() {
        
         $this->start_controls_section('section_tab_style',
            [
                'label'      => esc_html__('autrics Intro contact', 'autrics'),
            ]
         );

          
         $this->add_control('autrics_contact_items',
            [
                'label'     => esc_html__('autrics Contact', 'autrics'),
                'type'      => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default'   => [
                        [ 'name' => esc_html__('Contact Details', 'autrics') ],
         
                ],
                'fields' => [
                           
                    [
                        'name'             => 'autrics_contact_label',
                        'label'            => esc_html__('Label', 'autrics'),
                        'type'             => Controls_Manager::TEXT,
                        'default'          => esc_html__('Mail', 'autrics'),
                        'label_block'      => true,
                   
                    ],

                    [
                        'name'             => 'autrics_contact_value',
                        'label'            => esc_html__('Value', 'autrics'),
                        'type'             => Controls_Manager::TEXTAREA,
                        'default'          => esc_html__(' yourname@mail.com ', 'autrics'),
                        'label_block'      => true,
                
                 ],
                              
         
               ],
            ]
        );
         $this->add_control('intro_contact_icon',
            [
               'label'       => esc_html__( 'Icon', 'autrics' ),
               'type'        => Custom_Controls_Manager::ICON,
               'label_block' => true,
               'default'     => 'icon icon-tie',
            ]
		  );

        $this->add_responsive_control('slider_align',
           [
				'label'			 =>esc_html__( 'Alignment', 'autrics' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'	 => [

					'left'		 => [
						'title'	 => esc_html__( 'Left', 'autrics' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	  => [
						'title'	 => esc_html__( 'Center', 'autrics' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 => esc_html__( 'Right', 'autrics' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'  => [
						'title'	 => esc_html__( 'Justified', 'autrics' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'     => 'left',
                'selectors' => [
                    '{{WRAPPER}} .intro-content' => 'text-align: {{VALUE}};',
                
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
      
      $this->add_control('intro_contact_label_color',
         [
             'label'      => esc_html__('Label color', 'autrics'),
             'type'       => Controls_Manager::COLOR,
             'default'    => '',
             'selectors'  => [
                  '{{WRAPPER}} .intro-content ul li span' => 'color: {{VALUE}};',
              
             ],
         ]
        );

      $this->add_control('intro_contact_value_color',
         [
             'label'      => esc_html__('Value color', 'autrics'),
             'type'       => Controls_Manager::COLOR,
             'default'    => '',
             'selectors'  => [
                  '{{WRAPPER}} .intro-content ul li p' => 'color: {{VALUE}};',
              
             ],
         ]
        );

      $this->add_control('intro_contact_icon_color',
         [
            'label'      => esc_html__('Icon color', 'autrics'),
            'type'       => Controls_Manager::COLOR,
            'default'    => '',
            'selectors'  => [
                  '{{WRAPPER}} .ts-intro-wrapper i' => 'color: {{VALUE}};',
            
            ],
         ]
        );
      
      $this->add_group_control(Group_Control_Typography::get_type(), 
         [
		   	'name'	      => 'autrics_intro_contact_typography',
			   'selectors'	   => [
                '{{WRAPPER}} .intro-content ul li span',
                '{{WRAPPER}} .intro-content ul li p',          
                ]
			]
        );
        
  
      $this->end_controls_section();  

    }

    protected function render( ) {

        $settings                 =    $this->get_settings();
        $autrics_contact_items    =    $settings["autrics_contact_items"];
        $intro_contact_icon       =    $settings["intro_contact_icon"];

       

     ?>
      <div class="ts-intro-wrapper ts-intro-contact-list">
         <div class="intro-content">
               <ul>
                    <?php foreach($autrics_contact_items as $contact): ?>
                     <li>
                        <span> <?php echo esc_html($contact["autrics_contact_label"]); ?> </span>
                        <p class="intro-info"> <?php echo esc_html($contact["autrics_contact_value"]); ?></p>
                     </li>
                <?php endforeach; ?>
               </ul><!-- Ul List -->
         </div>
         <?php if($intro_contact_icon!=''): ?>
         <i class="<?php echo esc_attr($intro_contact_icon); ?>"></i>
         <?php endif; ?>
      </div>
 
   <?php      
 
    }

    protected function _content_template() { }
}