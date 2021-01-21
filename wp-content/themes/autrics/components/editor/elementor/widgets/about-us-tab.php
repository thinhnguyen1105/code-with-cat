<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Autrics_about_us_tab_Widget extends Widget_Base {

    public function get_name() {
        return 'autrics-about-us-tab';
    }

    public function get_title() {
        return esc_html__( 'Autrics about us tab', 'autrics' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return ['autrics-elements'];
    }

    protected function _register_controls() {
        
        $this->start_controls_section('section_tab_style',
            [
                'label'      => esc_html__('autrics about us tab', 'autrics'),
            ]
         );
                         
         $this->add_control('autrics_tab_items',
            [
                'label'     => esc_html__('autrics about us tabs', 'autrics'),
                'type'      => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default'   => [
                    [
                        'name' => esc_html__('Tab items', 'autrics')
                    ],
         
                ],
                'fields' => [
                           
                    [
                        'name'             => 'autrics_tab_nav',
                        'label'            => esc_html__(' Tab navigation ', 'autrics'),
                        'type'             => Controls_Manager::TEXT,
                        'default'          => esc_html__('History', 'autrics'),
                        'label_block'      => true,
                    ],

                    [
                       'name'             => 'autrics_tab_nav_icon',
                       'label'            => esc_html__( 'Nav Icon', 'autrics' ),
                       'type'             => Custom_Controls_Manager::ICON,
                       'label_block'      => true,
                       'default'          => 'icon-history',
                    ],

                    [
                       'name'             => 'autrics_tab_content_title',
                       'label'            => esc_html__('Content Title', 'autrics'),
                       'type'             => Controls_Manager::TEXT,
                       'default'          => esc_html__(' Autrics was founded in 1999 at USA ', 'autrics'),
                       'label_block'      => true,
                       'description'      => esc_html__( 'Help: Please Bold the text using third bracket;Ex: { Why }  choose us','autrics'), 
                    ],

                    [
                       'name'             => 'autrics_tab_content',
                       'label'            => esc_html__('Tab Content', 'autrics'),
                       'type'             => Controls_Manager::WYSIWYG,
                       'default'          => esc_html__(' Share best practices and hitech product knowledge. ', 'autrics'),
                       'label_block'      => true,
                    ],
                    
                 
                ],
            ]
        );
      

        $this->add_responsive_control('slider_align', 
        [
				'label'			 =>esc_html__( 'Alignment', 'autrics' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'	  => [
						'title'	 =>esc_html__( 'Left', 'autrics' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	  => [
						'title'	 =>esc_html__( 'Center', 'autrics' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 =>esc_html__( 'Right', 'autrics' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'  => [
						'title'	 =>esc_html__( 'Justified', 'autrics' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'	  => 'left',
                'selectors' => [
                    '{{WRAPPER}} .intro-content' => 'text-align: {{VALUE}};',
                   
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
     
         $this->add_control('about_us__title_color',
            [
               'label'     => esc_html__('Title color', 'autrics'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                  '{{WRAPPER}} .ts-tab-content h2' => 'color: {{VALUE}};',
               ],
            ]
         );
    
        $this->add_control('about_us_tab_nav_color',
            [
               'label'     => esc_html__('Nav color', 'autrics'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                     '{{WRAPPER}} .ts-tab .nav-item a' => 'color: {{VALUE}};',
               
               ],
            ]
        );

        $this->add_control('about_us_icon_color',
            [
               'label'     => esc_html__('Icon color', 'autrics'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                     '{{WRAPPER}} .ts-tab .nav-item a i' => 'color: {{VALUE}};',
               
               ],
            ]
        );
      
        $this->add_group_control(Group_Control_Typography::get_type(),
         [
            'name'		 => 'about_us_tab_content_typography',
            'selectors'	 => [
                  '{{WRAPPER}} .about-us .ts-tab-content',
                     
                  ]
         ]
        );
     
  
       $this->end_controls_section();  

    }

    protected function render( ) {

        $settings            = $this->get_settings();
        $autrics_tab_items   = $settings["autrics_tab_items"];
 
     ?>

      <div class="row about-us">
         <div class="col-lg-4 col-md-4">
            <ul class="nav nav-tabs ts-tab" id="myTab" role="tablist">
               <?php foreach($autrics_tab_items as $key=>$nav): ?>
               <li class="nav-item">
                  <a class="nav-link <?php echo esc_attr($key==0?'active':''); ?>"  data-toggle="tab" href="#tab-item-<?php echo esc_attr($key); ?>" role="tab"  aria-selected="true">
                  <i class="<?php echo esc_attr($nav["autrics_tab_nav_icon"]); ?>"></i><?php echo esc_html__($nav["autrics_tab_nav"],'autrics'); ?></a>
               </li>
               <?php endforeach;  ?>
            </ul><!-- ul end -->
         </div><!-- Col end -->
         <div class="col-lg-8 col-md-8 about-us">
            <div class="tab-content ts-tab-content" id="myTabContent">
            <?php foreach($autrics_tab_items as $key=>$data): ?>
               <div class="tab-pane fade show <?php echo esc_attr($key==0?'active':''); ?>" id="tab-item-<?php echo esc_attr($key); ?>" role="tabpanel">
                  <h2 class="column-title-sm">
                  <?php  $title_1 = str_replace(['{', '}'], ['<span>', '</span>'], $data["autrics_tab_content_title"]);  ?>
                  <?php  echo autrics_kses($title_1); ?>
                  </h2>
                  <p>
                  <?php echo autrics_kses($data["autrics_tab_content"]); ?>
                  </p>
               </div> <!-- tab pane end -->
               <?php endforeach;  ?>
            </div> <!-- tab content -->
         </div> <!-- col end -->
      </div><!-- Row end -->
 
     <?php      
 
    }

    protected function _content_template() { }
}