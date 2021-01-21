<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Autrics_Feature_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'autrics-feature';
    }

    public function get_title() {
        return esc_html__( 'Feature', 'autrics' );
    }

    public function get_icon() { 
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'autrics-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section('section_tab',
            [
                'label' => esc_html__('Autrics Featured Box', 'autrics'),
            ]
		);
		
	

        $this->add_control('title', [
				'label'			=> esc_html__( 'Title', 'autrics' ),
				'type'			=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'placeholder'	=> esc_html__( 'Expert Mechanics', 'autrics' ),
            'default'	   => esc_html__( 'Expert Mechanics', 'autrics' ),
            'description'  => esc_html__( 'Help: Please Bold the text using third bracket;Ex: { Why } choose us', 'autrics' ),
			]
		);

        $this->add_control('desc', [
				'label'			=> esc_html__( 'Content', 'autrics' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
				'placeholder'	=> esc_html__( 'Most of the vehicles get damaged', 'autrics' ),
				'default'      => esc_html__( 'Most of the vehicles get damaged just because of maintenance neglect you take', 'autrics' ),
			]
		);
		
		$this->add_control('icon',
			[
				'label'       => esc_html__( 'Icon', 'autrics' ),
				'type'        => Custom_Controls_Manager::ICON,
				'label_block' => true,
				'default'     => 'icon icon-tie',
			]
		);

		$this->add_control('image',
            [
                'label'          => esc_html__( 'Image', 'autrics' ),
                'type'           => Controls_Manager::MEDIA,
                'default'        => [
                'url'  => Utils::get_placeholder_image_src(),
            ],
                'label_block'    => true,
                'condition'	   => [
				        	'use' => 'image',
			      	],
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
					'center'	 => [
                     'title'	 => esc_html__( 'Center', 'autrics' ),
                     'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
                     'title'	 => esc_html__( 'Right', 'autrics' ),
                     'icon'	 => 'fa fa-align-right',
					],
					'justify'	 => [
                     'title'	 =>esc_html__( 'Justified', 'autrics' ),
                     'icon'	 => 'fa fa-align-justify',
					],
				],
			   	'default'		 => 'left',
                   'selectors' => [
                         '{{WRAPPER}} .feature-single' => 'text-align: {{VALUE}};',
				],
			]
        );//Responsive control end
      $this->end_controls_section();
     
      $this->start_controls_section('section_sub_title_style',
         [
				'label'	 => esc_html__( 'Title', 'autrics' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
        );

      $this->add_control('title_color',
         [
				'label'		 => esc_html__( 'Title color', 'autrics' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .feature-single h3' => 'color: {{VALUE}};',
				],
			]
		);

        
      $this->add_group_control(Group_Control_Typography::get_type(), 
         [
			'name'		 => 'title_typography',
			'selector'	 => '{{WRAPPER}} .feature-single h3',
			]
		);

      $this->end_controls_section();
        
        //Content Style Section
      $this->start_controls_section('section_content_style',
         [
				'label'	 => esc_html__( 'Content', 'autrics' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );

      $this->add_control('feature_content_color', 
         [
				'label'		 => esc_html__( 'Content color', 'autrics' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .feature-single p' => 'color: {{VALUE}};',
				],
			]
      );

      $this->add_group_control(Group_Control_Typography::get_type(), 
         [
			'name'		 => 'feature_content_typography',
			'selector'	 => '{{WRAPPER}} .feature-single p',
			]
		);

		$this->end_controls_section();

		//Icon Style Section
      $this->start_controls_section('section_icon_style', 
         [
				'label'	 => esc_html__( 'Icon', 'autrics' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control('icon_color', [
				'label'		 => esc_html__( 'Icon color', 'autrics' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .feature-single .feature-icon i' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), 
            [
               'name'		 => 'icon_typography',
               'selector'	 => '{{WRAPPER}} .feature-single .feature-icon i',
            ]
		);
		$this->end_controls_section();

		
    } //Register control end

    protected function render( ) { 

		$settings       =    $this->get_settings();
		$icon           =    $settings["icon"];
		$title          =    $settings["title"];
		$desc           =    $settings["desc"];
	   $title_1        =    str_replace(['{', '}'], ['<span>', '</span>'], $title); 
		
    ?>
           
		<div class="feature-single">
			<span class="feature-icon">
				<i class="<?php echo esc_attr($icon); ?>"></i>
			</span><!-- feature icon -->
			<div class="feature-content">
				<h3><?php echo autrics_kses($title_1); ?></h3>
				<p><?php echo esc_html($desc); ?></p>
			</div><!-- feature content end -->
		</div><!-- feature single end -->
	  

    <?php  
    }
    protected function _content_template() { }
}