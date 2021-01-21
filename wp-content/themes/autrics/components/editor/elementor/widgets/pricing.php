<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Autrics_Pricing_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'autrics-pricing';
    }

    public function get_title() {
        return esc_html__( 'Pricing ', 'autrics' );
    }

    public function get_icon() { 
        return 'eicon-price-list';
    }

    public function get_categories() {
        return [ 'autrics-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Pricing Content', 'autrics'),
            ]
        );
        
     

        $this->add_control(
			'pricing_style',
			[
				'label'    => esc_html__( 'Pricing Style', 'autrics' ),
				'type'     => Custom_Controls_Manager::IMAGECHOOSE,
				'default'  => 'style',
				'options'  => [
                    'style1' => [
					   	'title'      => esc_html__( 'Curly price', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/price/style1.png',
                        'imagesmall' => AUTRICS_IMG. '/style/price/style1.png',
                        'width'      => '30%',
					],
              		  'style2' => [
						'title'     => esc_html__( 'Icon price', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/price/style2.png',
                        'imagesmall' => AUTRICS_IMG. '/style/price/style2.png',
                        'width'      => '30%',
					],
			
				],
			]
        );

       
        $this->add_control(
			'price_featured',
			[
				'label'          => esc_html__( 'Featured', 'autrics' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Yes', 'autrics' ),
				'label_off'      => esc_html__( 'No', 'autrics' ),
				'return_value'   => 'yes',
				'default'        => 'yes',
			]
        );
        $this->add_control(
			'package_plan_tag',
			[
				'label'         => esc_html__( 'Feature tag', 'autrics' ),
            'type'          => Controls_Manager::TEXT,
            'placeholder'   => esc_html__( 'Best', 'autrics' ),
            'condition'     => ["pricing_style"=>"style1",'price_featured'=>"yes"],
			]
        );
        
        $this->add_control(
			'package_name',
			[
				'label'        => esc_html__( 'Package Name', 'autrics' ),
				'type'         => Controls_Manager::TEXT,
            'placeholder'  => esc_html__( 'Enter your Price Package', 'autrics' ),               
			]
        );
      
      

          
      $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label'        => esc_html__( 'Title', 'autrics' ),
				'type'         => \Elementor\Controls_Manager::TEXT,
				'default'      => esc_html__( 'List Title' , 'autrics' ),
				'label_block'  => true,
			]
		);

		$this->add_control(
			'price_service_list',
			[
				'label'     => esc_html__( 'Package service list', 'autrics' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'    => $repeater->get_controls(),
				'default'   => [
					[
						'list_title' => esc_html__( 'Title #1', 'autrics' ),
					],
			
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

        
        $this->add_control(
			'price',
			[
				'label'       => esc_html__( 'Package Price', 'autrics' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Package Price', 'autrics' ),
			]
        );

        $this->add_control('package_validity',
            [
               'label'          => esc_html__( 'Package validity', 'autrics' ),
               'type'           => Controls_Manager::TEXT,
               'placeholder'    => esc_html__( 'Enter Package validity', 'autrics' ),
               'default'        => esc_html__('Per month','autrics'),
               'description'    => esc_html__('Help: per year , per month or every 3 month','autrics'),
            ]
        );
        
        $this->add_control('currency',
            [
               'label'         => esc_html__( 'Currency', 'autrics' ),
               'type'          => Controls_Manager::TEXT,
               'default'       => '$',
               'placeholder'   => esc_html__( 'Enter Currency', 'autrics' ),
               'condition'     => [
                  'pricing_style' => ['style1'],
                    
                ]
            ]
        );
      
      
        
        $this->add_control('price_button_text',
			   [
				'label'    => esc_html__( 'Button Text', 'autrics' ),
				'type'     => Controls_Manager::TEXT,
				
			   ]
        );
        
        $this->add_control('price_button_url',
            [
               'label'    => esc_html__( 'Button Link', 'autrics' ),
               'type'     => Controls_Manager::URL,
               
            ]
        );
      
             
        $this->end_controls_section();
  
        $this->start_controls_section('style_section',
            [
                'label'    => esc_html__( 'Style Section', 'autrics' ),
                'tab'      => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control('box_text_color',
            [
               'label'		 => esc_html__( 'Text color', 'autrics' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [
                  '{{WRAPPER}} .plan'                                 => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header h3'                 => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header h4'                 => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header .plan-price strong' => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header .plan-price sup'    => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header .plan-price span'   => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan ul li '                          => 'color: {{VALUE}};',
                           
               ],
			  ]
        );

        $this->add_control('box_background_color',
           [
            'label'		 => esc_html__( 'Background color', 'autrics' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .plan' => 'background: {{VALUE}};',
                            
				],
			 ]
        );
      
        $this->end_controls_section();

		
       
        

    } //Register control end

    protected function render( ) { 
     
        $settings           =   $this->get_settings();
        $package_name       =   $settings["package_name"];
        $package_plan_tag   =   $settings["package_plan_tag"];
        $price              =   $settings["price"];
        $currency           =   isset($settings["currency"])?$settings["currency"]:'$';
        $price_featured     =   $settings["price_featured"];
        $price_service_list =   $settings["price_service_list"];
        $package_validity   =   $settings["package_validity"];
        $button_text        =   $settings["price_button_text"]; 
        $button_url         =   $settings["price_button_url"]; 
        $style              =   $settings["pricing_style"];
       
    
        ?>  
        
        <?php if($style=="style1"): ?>
        <div class="plan text-center <?php echo esc_attr( $price_featured=="yes"?'plan-highlight':'solid-bg'); ?> ">
            <?php if($price_featured=="yes"): ?>    
            <span class="plan-tag">
                <?php echo esc_html($package_plan_tag); ?>
            </span>
            <?php endif;  ?> 
            <div class="plan-header">
                <h3 class="plan-name"><?php echo esc_html($package_name); ?></h3>
                <h4 class="plan-price">
                <sup class="currency"> <?php echo esc_html($currency); ?></sup>
                <strong><?php echo esc_html($price); ?></strong>
                </h4> <!-- Plan Price End -->
            </div><!-- Plan Header -->
            <ul class="list-unstyled">
             <?php foreach($price_service_list as $service_item): ?>
             <li> <?php echo esc_html($service_item["list_title"]); ?> <li>
             <?php endforeach; ?>
            </ul> <!-- List End -->
            <div class="text-center">
                <a target="<?php echo esc_attr($button_url["is_external"]=="on"?"_blank":"_self"); ?>" href="<?php echo esc_url($button_url["url"]); ?>" class="btn btn-primary"><?php echo esc_html($button_text); ?></a>
            </div>
        </div> <!-- Plan end -->
        <?php endif; ?>

        <?php if($style=="style2"): ?>
        <div class="ts-pricing-table-standard">
            <div class="plan text-center <?php echo esc_attr($price_featured=="yes"?'plan-highlight':''); ?> ">
                    <div class="plan-header">
                        <h3 class="plan-name"><?php echo esc_html($package_name); ?></h3>
                        <h4 class="plan-price">
                            <sup class="currency"><?php echo esc_html($currency); ?></sup>
                            <strong><?php echo esc_html($price); ?></strong>
                            <span><?php echo esc_html($package_validity); ?></span>
                        </h4> <!-- Plan Price End -->
                    </div>
                    <ul class="list-unstyled">
                    <?php foreach($price_service_list as $service_item): ?>
             <li> <?php echo esc_html($service_item["list_title"]); ?> <li>
             <?php endforeach; ?>
                    </ul> <!-- List End -->
                    <div class="text-center">
                    <a target="<?php echo esc_attr($button_url["is_external"]=="on"?"_blank":"_self"); ?>" href="<?php echo esc_url($button_url["url"]); ?>" class="btn btn-primary"><?php echo esc_attr($button_text); ?></a>
                    </div>
            </div> <!-- Plan end -->
       </div> 
   

        <?php endif; ?>
    <?php  
    }
    protected function _content_template() { }
}