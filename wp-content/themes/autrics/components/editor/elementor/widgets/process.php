<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Autrics_Process_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'autrics-process';
    }

    public function get_title() {
        return esc_html__( 'Process', 'autrics' );
    }

    public function get_icon() { 
        return 'eicon-form-vertical';
    }

    public function get_categories() {
        return [ 'autrics-elements' ];
    }

    protected function _register_controls() { 
      
      $this->start_controls_section('section_process_style',
            [
              'label'  => esc_html__('Process Style', 'autrics'),
              'tab'    => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
         );
		
		 $this->add_control('process_style',
			[
				'label'      => esc_html__( 'Process Style', 'autrics' ),
				'type'       => Custom_Controls_Manager::IMAGECHOOSE,
				'default'    => 'working_process',
				'options'    => [
					'working_process' => [
						          'title'      => esc_html__( 'Working Process', 'autrics' ),
                            'imagelarge' => AUTRICS_IMG. '/style/process/working_process_lg.png',
                            'imagesmall' => AUTRICS_IMG. '/style/process/working_process_sm.png',
                            'width'      => '30%',
					],
              	'footer_contact' => [
					          'title'        => esc_html__( 'Contact Process', 'autrics' ),
                        'imagelarge'    => AUTRICS_IMG. '/style/process/footer_contact_lg.png',
                        'imagesmall'    => AUTRICS_IMG. '/style/process/footer_contact_sm.png',
                        'width'         => '30%',
					],  
			
				],
			]
		);
		
		$this->end_controls_section();

      $this->start_controls_section('section_tab_1',
            [
               'label'     => esc_html__('Step 1', 'autrics'),
               'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
         );
		
         /*Work Progress*/
         
      $this->add_control('icon_1',
            [
               'label'       => esc_html__( 'Icons', 'autrics' ),
               'type'        => Controls_Manager::ICON,
               'default'     => 'fa fa-apple',
              
            ]
        );
        
      $this->add_control('title_1',
            [

               'label'			=> esc_html__( 'Heading text', 'autrics' ),
               'type'			=> Controls_Manager::TEXT,
               'label_block'	=> true,
               'placeholder'	=> esc_html__( ' { Why } choose us', 'autrics' ),
               'default'	   => esc_html__( 'why choose us', 'autrics' ),
               'description'  => esc_html__( 'Help: Please Bold the text using third bracket;Ex: { Why } choose us', 'autrics' ),
            ]
         );
         
      $this->add_control('content_1', 
           [
               'label'			=> esc_html__( 'Sub Heading text', 'autrics' ),
               'type'			=> Controls_Manager::TEXTAREA,
			      'label_block'	=> true,
			      'rows'         => 3,
               'placeholder'	=> esc_html__( ' Most of the vehicles get damage just because of maintain ', 'autrics' ),
               'default'	   => esc_html__( 'Most of the vehicles get damage just because of maintain', 'autrics' ),
               
            ]
         );
      $this->add_control('background_1',
            [
               'label'		 =>esc_html__( 'Background', 'autrics' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [

				  '{{WRAPPER}} .footer-top [class*=col]:nth-child(1)' => 'background: {{VALUE}};',
				  '{{WRAPPER}} .footer-top [class*=col]:nth-child(1) .angle-shap' => 'border-left-color: {{VALUE}};',
				  '{{WRAPPER}} .working-box-wrapper .child_1' => 'background: {{VALUE}};',
				  '{{WRAPPER}} .working-box-wrapper .child_1 .working-left-shape' => 'border-color:{{VALUE}} {{VALUE}} transparent;',
				  '{{WRAPPER}} .working-box-wrapper .child_1 .working-right-shape' => 'border-color: transparent {{VALUE}} transparent {{VALUE}};',
				 
            
               ],
            ]
           );
      $this->end_controls_section();

      $this->start_controls_section('section_tab_2',
         [
               'label' => esc_html__('Step 2', 'autrics'),
               'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
       );

      /*Work Progress*/
      $this->add_control('icon_2',
			[
				'label'    => esc_html__( 'Icons', 'autrics' ),
				'type'     => Controls_Manager::ICON,
				'default'  => 'fa fa-apple',
               
		   	]
        );
         
      $this->add_control('title_2',
         [
				'label'			=> esc_html__( 'Heading text', 'autrics' ),
				'type'			=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'placeholder'	=> esc_html__( ' { Why } choose us', 'autrics' ),
				'default'	   => esc_html__( 'why choose us', 'autrics' ),
				'description'  => esc_html__( 'Help: Please Bold the text using third bracket;Ex: { Why } choose us', 'autrics' ),
			]
      );
      
      $this->add_control('content_2', 
         [
				'label'			=> esc_html__( 'Sub Heading text', 'autrics' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
				'rows'         => 3,
				'placeholder'	=> esc_html__( ' Most of the vehicles get damage just because of maintain ', 'autrics' ),
				'default'	   => esc_html__( 'Most of the vehicles get damage just because of maintain', 'autrics' ),
			
			]
		);

      $this->add_control('background_2',
           [
              'label'		 =>esc_html__( 'Background', 'autrics' ),
              'type'		 => Controls_Manager::COLOR,
              'selectors'	 => [

                     '{{WRAPPER}} .footer-top [class*=col]:nth-child(2)'                => 'background: {{VALUE}};',
                     '{{WRAPPER}} .footer-top [class*=col]:nth-child(2) .angle-shap'    => 'border-left-color: {{VALUE}};',
                     '{{WRAPPER}} .working-box-wrapper .child_2'                        => 'background: {{VALUE}};',
                     '{{WRAPPER}} .working-box-wrapper .child_2 .working-left-shape'    => 'border-color:{{VALUE}} {{VALUE}} transparent;',
                     '{{WRAPPER}} .working-box-wrapper .child_2 .working-right-shape'   => 'border-color: transparent {{VALUE}} transparent {{VALUE}};',
				 
            
               ],
            ]
           );

      $this->end_controls_section();

      $this->start_controls_section('section_tab_3',
            [
                  'label'     => esc_html__('Step 3', 'autrics'),
                  'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
      );

        /*Work Progress*/
      $this->add_control('icon_3',
            [
               'label'      => esc_html__( 'Icons', 'autrics' ),
               'type'       => Controls_Manager::ICON,
               'default'    => 'fa fa-apple',
                 
            ]
        );
        
      $this->add_control('title_3',
            [
               'label'			  => esc_html__( 'Heading text', 'autrics' ),
               'type'			  => Controls_Manager::TEXT,
               'label_block'	  => true,
               'placeholder'	  => esc_html__( ' { Why } choose us', 'autrics' ),
               'default'	     => esc_html__( 'why choose us', 'autrics' ),
               'description'    => esc_html__( 'Help: Please Bold the text using third bracket;Ex: { Why } choose us', 'autrics' ),
            ]
        );
         
      $this->add_control('content_3',
            [
               'label'			=> esc_html__( 'Sub Heading text', 'autrics' ),
               'type'			=> Controls_Manager::TEXTAREA,
               'label_block'	=> true,
               'rows'         => 3,
               'placeholder'	=> esc_html__( ' Most of the vehicles get damage just because of maintain ', 'autrics' ),
               'default'	   => esc_html__( 'Most of the vehicles get damage just because of maintain', 'autrics' ),
               
            ]
		);
        
      $this->add_control('background_3',
            [
               'label'		 => esc_html__( 'Background', 'autrics' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [

				  '{{WRAPPER}} .footer-top [class*=col]:nth-child(3)'             => 'background: {{VALUE}};',
				  '{{WRAPPER}} .footer-top [class*=col]:nth-child(3) .angle-shap' => 'border-left-color: {{VALUE}};',
				  '{{WRAPPER}} .working-box-wrapper .child_3'                     => 'background: {{VALUE}};',
				  '{{WRAPPER}} .working-box-wrapper .child_3 .working-left-shape' => 'border-color:{{VALUE}} {{VALUE}} transparent;',
				  '{{WRAPPER}} .working-box-wrapper .child_3 .working-right-shape' => 'border-color: transparent {{VALUE}} transparent {{VALUE}};',
				 
            
               ],
            ]
		   );
		   
      $this->end_controls_section();

      $this->start_controls_section('section_tab_style',
            [
                  'label' => esc_html__('Style', 'autrics'),
                  'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                
            ]
         );
        
      $this->add_control('icon_color',
            [
               'label'		 => esc_html__( 'Icon color', 'autrics' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [
                  '{{WRAPPER}} .working-single-box .working-content-wrapper .workig-icon ' => 'color: {{VALUE}};',
                  '{{WRAPPER}} .footer-top .footer-box i' => 'color: {{VALUE}};',
               ],
            ]
           );
        

      $this->add_control('title_color',
            [
               'label'		 => esc_html__( 'Title color', 'autrics' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [
				  '{{WRAPPER}} .working-single-box .working-content h3' => 'color: {{VALUE}};',
				  '{{WRAPPER}} .footer-top .footer-box-content h3' => 'color: {{VALUE}};',
            
               ],
            ]
           );
          
         
      $this->add_control('content_color',
               [
               'label'		 => esc_html__( 'Content color', 'autrics' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [
				  '{{WRAPPER}} .working-single-box .working-content ' => 'color: {{VALUE}};',
				  '{{WRAPPER}} .footer-top .footer-box .footer-box-content p' => 'color: {{VALUE}};',
                
               ],
             ]
           );  
  
      $this->add_group_control(Group_Control_Typography::get_type(),
            [
            'name'		 => 'full_content_typography',
            'selector'	 => '{{WRAPPER}} .working-single-box .working-content',
            ]
		 );   
		

      $this->add_responsive_control(
            'title_align', [
               'label'			 =>esc_html__( 'Alignment', 'autrics' ),
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
                        '{{WRAPPER}} .working-single-box' => 'text-align: {{VALUE}};',
               ],
            ]
           );//Responsive control end

      $this->end_controls_section();

    }

    protected function render( ) { 
        
        $settings    =        $this->get_settings();
		  $style       =        $settings["process_style"];
        
        $icon_1      =        $settings["icon_1"];
        $title_1     =        $settings["title_1"];
        $title_1     =        str_replace(['{', '}'], ['<span>', '</span>'], $title_1); 
        $content_1   =        wp_trim_words($settings["content_1"],14);

        $icon_2      =        $settings["icon_2"];
        $title_2     =        $settings["title_2"];
        $title_2     =        str_replace(['{', '}'], ['<span>', '</span>'], $title_2); 
        $content_2   =        wp_trim_words($settings["content_2"],14);

        $icon_3      =        $settings["icon_3"];
        $title_3     =        $settings["title_3"];
        $title_3     =        str_replace(['{', '}'], ['<span>', '</span>'], $title_3); 
        $content_3   =        wp_trim_words($settings["content_3"],14);
   	
      ?>
      <?php if($style=='working_process'): ?>	
         
        <div class="row working-box-wrapper">
            <div class="col-md-4">
               <div class="working-single-box child_1">
				   <span class="working-left-shape"></span>
                  <div class="working-content-wrapper">
                     <span class="workig-icon">
                        <i class="<?php echo esc_attr( $icon_1 ); ?>"></i>
                     </span>
                     <div class="working-content">
                        <?php  $title_1 = str_replace(['{', '}'], ['<span>', '</span>'], $title_1);  ?>
                        <h3><?php echo autrics_kses($title_1); ?></h3>
                        <p><?php echo autrics_kses( $content_1 ); ?></p>
                     </div> <!-- Working Content -->
				  </div> <!-- Working wrapper -->
				  <span class="working-right-shape"></span>
               </div> <!-- Working single box -->
            </div><!-- Col End -->
            <div class="col-md-4">
               <div class="working-single-box child_2 bg-red">
               <span class="working-left-shape"></span>
                  <div class="working-content-wrapper">
				         <span class="workig-icon">
                        <i class="<?php echo esc_attr($icon_2 ); ?>"></i>
                     </span>
                     <div class="working-content">
                     <?php  $title_2 = str_replace(['{', '}'], ['<span>', '</span>'], $title_2);  ?>
                        <h3><?php echo autrics_kses($title_2) ?></h3>
                        <p><?php echo autrics_kses($content_2); ?></p>
                     </div> <!-- Working Content -->
                  </div> <!-- Working wrapper -->
                  <span class="working-right-shape"></span>
               </div> <!-- Working single box -->
            </div><!-- Col End -->
            <div class="col-md-4">
               <div class="working-single-box child_3 bg-red-light">
                  <div class="working-content-wrapper">
				  <span class="workig-icon">
                        <i class="<?php echo esc_attr($icon_3); ?>"></i>
                     </span>
                     <div class="working-content">
                     <?php  $title_3 = str_replace(['{', '}'], ['<span>', '</span>'], $title_3);  ?>
                        <h3><?php echo autrics_kses($title_3); ?></h3>
                        <p><?php echo autrics_kses($content_3); ?></p>
                     </div> <!-- Working Content -->
                  </div> <!-- Working wrapper -->
                  <span class="working-right-shape"></span>
               </div> <!-- Working single box -->
            </div><!-- Col End -->
        </div> <!-- Row End -->
		<?php endif; ?>
	    <?php if($style=='footer_contact'): ?>	
         
		<div class="row footer-top">
               <div class="col-md-4 footer-box">
                  <i class="<?php echo esc_attr($icon_1); ?>"></i>
                  <div class="footer-box-content">
                     <h3><?php echo autrics_kses($title_1); ?></h3>
                     <p><?php echo autrics_kses($content_1); ?></p>
                  </div>
				  <span class="angle-shap"></span>
               </div><!-- Box 1 end-->
			   <div class="col-md-4 footer-box">
                  <i class="<?php echo esc_attr($icon_2); ?>"></i>
                  <div class="footer-box-content">
                     <h3><?php echo autrics_kses($title_2); ?></h3>
                     <p><?php echo autrics_kses($content_2); ?></p>
                  </div>
				  <span class="angle-shap"></span>
			
               </div><!-- Box 1 end-->
			   <div class="col-md-4 footer-box">
                  <i class="<?php echo esc_attr($icon_3); ?>"></i>
                  <div class="footer-box-content">
                     <h3><?php echo autrics_kses($title_3); ?></h3>
                     <p><?php echo autrics_kses($content_3); ?></p>
                  </div>
               </div><!-- Box 1 end-->
         </div><!-- Content row end--> 

	    <?php endif; ?>
      
     <?php      
    }

}
