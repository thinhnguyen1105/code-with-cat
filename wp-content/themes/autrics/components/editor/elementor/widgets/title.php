<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Autrics_Title_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'autrics-title';
    }

    public function get_title() {
        return esc_html__( 'Title', 'autrics' );
    }

    public function get_icon() { 
        return 'eicon-type-tool';
    }

    public function get_categories() {
        return [ 'autrics-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Title settings', 'autrics'),
            ]
        );

        $this->add_control(
			'title', [
				'label'			  => esc_html__( 'Heading  text', 'autrics' ),
				'type'			  => Controls_Manager::TEXT,
				'label_block'	  => true,
				'placeholder'    => esc_html__( ' { Why } choose us', 'autrics' ),
				'default'	     => esc_html__( 'why choose us', 'autrics' ),
				'description'    => esc_html__( 'Help: Please Bold the text using third bracket;Ex: { Why } choose us', 'autrics' ),
			]
      );
      
      $this->add_control(
         'show_border',
         [
             'label'     => esc_html__('Show title border', 'autrics'),
             'type'      => Controls_Manager::SWITCHER,
             'label_on'  => esc_html__('Yes', 'autrics'),
             'label_off' => esc_html__('No', 'autrics'),
             'default'   => 'yes',
      
         ]
     ); 

     
        
        $this->add_responsive_control(
			'title_align', [
				'label'			 => esc_html__( 'Alignment', 'autrics' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

               'left'		 => [
                  
                  'title'	 => esc_html__( 'Left', 'autrics' ),
						'icon'	 => 'fa fa-align-left',
               
               ],
					'center'	     => [
                  
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

                    '{{WRAPPER}} .title-section-area' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .title-section-area .widget-title' => 'text-align: {{VALUE}};',

				],
			]
        );//Responsive control end
        $this->end_controls_section();

       
        
        //Title Style Section
		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Title', 'autrics' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color', [

				'label'		 => esc_html__( 'Title color', 'autrics' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [

               '{{WRAPPER}} .title-section-area .section-title' => 'color: {{VALUE}};',
               '{{WRAPPER}} .title-section-area .widget-title' => 'color: {{VALUE}};',
               '{{WRAPPER}} .title-section-area .section-title:before ' => 'background: {{VALUE}};',
               
				],
			]
        );



        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Typography', 'autrics' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            
               'selector' => '{{WRAPPER}} .section-title',
			]
		);
        

    } //Register control end

    protected function render( ) { 

		$settings = $this->get_settings();
		$title    = $settings['title'];
      $title_1  = str_replace(['{', '}'], ['<span>', '</span>'], $title); 
      
    ?>
      <?php if($settings["show_border"]=="yes"): ?>
        <div class="title-section-area">
	           <h2 class="section-title">
                  <?php echo wp_kses_post($title_1); ?>
			   </h2>
      </div><!-- Section title -->		
      <?php else: ?>
         <div class="title-section-area title-border-none">
            <h3 class="section-title"> 
               <?php echo wp_kses_post($title_1); ?>
            </h3>
         </div><!-- Section title -->		
    <?php endif; ?> 
      
    <?php  

    }
    
    protected function _content_template() { }
}