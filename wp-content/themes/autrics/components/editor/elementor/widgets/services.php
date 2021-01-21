<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Autrics_Services_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'autrics-service';
    }

    public function get_title() {
        return esc_html__( 'Autrics Services', 'autrics' );
    }

    public function get_icon() { 
        return 'eicon-tools';
    }

    public function get_categories() {
        return [ 'autrics-elements' ];
    }

    protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' =>esc_html__( 'Autrics Services', 'autrics' ),
			]
        );

        $this->add_control(
			'service_style',
			[
				'label' => esc_html__( 'Service Style', 'autrics' ),
				'type' => Custom_Controls_Manager::IMAGECHOOSE,
				'default' => 'style1',
				'options' => [
                    'style1' => [
                        'title'      => esc_html__( ' Style 1 ', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/service/style1.PNG',
                        'imagesmall' => AUTRICS_IMG. '/style/service/style1.PNG',
                        'width' => '30%',
                    ],
                    'style2' => [
                        'title'      => esc_html__( ' Style 2', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/service/style2.PNG',
                        'imagesmall' => AUTRICS_IMG. '/style/service/style2.PNG',
                        'width'      => '30%',
                    ],  				
            
                    'style3' => [
                        'title'      => esc_html__( ' Style 2', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/service/style1.PNG',
                        'imagesmall' => AUTRICS_IMG. '/style/service/style1.PNG',
                        'width'      => '30%',
                    ],
                    'style4' => [
                        'title'      => esc_html__( ' Style 4', 'autrics' ),
                        'imagelarge' => AUTRICS_IMG. '/style/service/service-classic.PNG',
                        'imagesmall' => AUTRICS_IMG. '/style/service/service-classic.PNG',
                        'width'      => '30%',
                    ],
				],
			]
        );

 
        $this->add_control(
			'service_category',
			[
				'label'     => esc_html__( 'Category', 'autrics' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'all',
                'options'   => $this->getCategories(),
                'condition' =>["service_style"=>["style1","style2"] ],
			]
        );

        $this->add_control(
			'service_single',
			[
				'label'      => esc_html__( 'Single Service', 'autrics' ),
				'type'       => \Elementor\Controls_Manager::SELECT,
				'options'    =>   $this->getServices(),
                'condition'  =>["service_style"=>["style3","style4"] ],
			]
        );
   
      $this->add_control('post_count',
            [
               'label'         => esc_html__( 'Service count', 'autrics' ),
               'type'          => Controls_Manager::NUMBER,
               'default'       => '3',
               'condition'     =>["service_style"=>["style1","style2"] ],
            ]
        );
    
      $this->add_control('post_title_crop',
            [
                'label'         => esc_html__( 'Title limit', 'autrics' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => '3',
            ]
       ); 
       
      $this->add_control('show_desc',
            [
               'label'      => esc_html__('Show desc', 'autrics'),
               'type'       => Controls_Manager::SWITCHER,
               'label_on'   => esc_html__('Yes', 'autrics'),
               'label_off'  => esc_html__('No', 'autrics'),
               'default'    => 'yes',
            ]
         ); 
         $this->add_control(
          'post_order',
          [
              'label'     =>esc_html__( 'Post order', 'autrics' ),
              'type'      => Controls_Manager::SELECT,
              'default'   => 'DESC',
              'options'   => [
                    'DESC'      =>esc_html__( 'Descending', 'autrics' ),
                    'ASC'       =>esc_html__( 'Ascending', 'autrics' ),
                ],
          ]
      );   
      $this->add_control('desc_limit',
            [
              'label'         => esc_html__( 'Description limit', 'autrics' ),
              'type'          => Controls_Manager::NUMBER,
              'default'       => '10',
              'condition'     => [ 'show_desc' => ['yes'] ],
            ]
          );   
    
      $this->add_control('show_icon',
            [
                'label'     => esc_html__('Show Icon', 'autrics'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Yes', 'autrics'),
                'label_off' => esc_html__('No', 'autrics'),
                'default'   => 'yes',
                'condition' => ["service_style"=>["style1","style3"] ],
            ]
        ); 
    

      $this->add_control('show_readmore',
            [
               'label'     => esc_html__('Show Readmore', 'autrics'),
               'type'      => Controls_Manager::SWITCHER,
               'label_on'  => esc_html__('Yes', 'autrics'),
               'label_off' => esc_html__('No', 'autrics'),
               'default'   => 'yes',
               'condition' => ["service_style"=>["style1","style3","style4"] ],
      
            ]
        );   

       $this->add_control('show_navigation',
            [
            'label'     => esc_html__('Show Navigation', 'autrics'),
            'type'      => Controls_Manager::SWITCHER,
            'label_on'  => esc_html__('Yes', 'autrics'),
            'label_off' => esc_html__('No', 'autrics'),
            'default'   => 'yes',
            'condition' => ["service_style"=>"style1"],
   
            ]
        );  

      $this->end_controls_section();
      
      $this->start_controls_section('style_section',
			[
				'label' => esc_html__( 'Style Section', 'autrics' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		); 
      $this->add_control('post_text_color',
            [
                'label'    => esc_html__('Title color', 'autrics'),
                'type'     => Controls_Manager::COLOR,
                'selectors'   => [

                    '{{WRAPPER}} .post .entry-title a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .ts-feature-wrapper .feature-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

      $this->add_control('post_text_color_hover',
            [
                'label'     => esc_html__('Title hover', 'autrics'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                '{{WRAPPER}} .post .entry-title a:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ts-feature-wrapper .feature-content h3 a:hover' => 'color: {{VALUE}};',
            
                ],
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), 
            [
                'name'		 => 'autrics_service_title_typography',
                'label'     => esc_html__('Title size', 'autrics'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .ts-service-title',
            ]
      );
        $this->add_group_control(Group_Control_Typography::get_type(), 
            [
            'name'		 => 'autrics_service_post_typography',
            'label'     => esc_html__('Descrition size', 'autrics'),

            'selectors'	 => [
                  '{{WRAPPER}} .ts-service-wrapper .service-content',
                  '{{WRAPPER}} .ts-feature-wrapper .feature-content',
               
                ]
            ]
      );
      
      $this->end_controls_section();  
    } 

    protected function render() {

    $sevice_cat =     'all';
    $settings =            $this->get_settings();
    $post_title_crop =     $settings["post_title_crop"];
    $service_style =       $settings["service_style"];
    $show_desc =           $settings["show_desc"];
    $desc_limit =          $settings["desc_limit"];
    $post_count =          $settings["post_count"];
    $show_icon =           $settings["show_icon"];
    $sevice_cat =          $settings["service_category"];
    $service_single =      $settings["service_single"];
    $show_readmore=        $settings["show_readmore"];
    $show_navigation =      $settings["show_navigation"]=="yes"?true:false;
    $post_order =        isset($settings['post_order'])?$settings['post_order']:'DESC';  
  
   if($service_style=="style1" || $service_style=="style2"){
      $args = array(
         'numberposts'    => $post_count,
         'orderby'        => 'post_date',
         'order'          => $post_order,
         'post_type'      => 'ts_service',
         'post_status'    => 'publish',
         'tax_query'      => [],
       
     );
  
     if($sevice_cat!='all'){
         $args["tax_query"]  = array(
             array(
                 'taxonomy' => 'ts_service_cat',
                 'field'    => 'slug',
                 'terms'    => array($sevice_cat)
             )
         );
     }  
 
     $service_posts = get_posts( $args );
    }elseif($service_style=="style3"){
      
      $args = [
      'post_type'        => 'ts_service',
      'posts_per_page'   => 1,
      'p'                => $service_single,
     
      ];
      $q = get_posts( $args ,ARRAY_A );
   
   } 
   if($service_style=="style4"){
      
    $args = [
    'post_type'        => 'ts_service',
    'posts_per_page'   => 1,
    'p'                => $service_single,
   
    ];

    if(is_array($sevice_cat) && count($sevice_cat)){
      $args['category__in'] = $sevice_cat;
   }

    $q = get_posts( $args ,ARRAY_A );
 
 } 
   
  
    ?>
  
    <?php if($service_style == "style1"): ?>         
        <div data-nav="<?php  echo esc_attr( $show_navigation ); ?>" class="service-carousel owl-carousel">
           <?php  foreach( $service_posts as $recent):   
             setup_postdata( $recent ); 
        
            ?>
            <?php $icon = autrics_meta_option($recent->ID,'autrics_service_icon');  ?>
                  <div class="ts-service-wrapper">
                    <?php if(has_post_thumbnail($recent->ID)): ?>
                        <span class="service-img">
                        <a href="<?php echo get_post_permalink($recent->ID); ?>">
                           <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url( $recent->ID, 'large' ); ?>" alt="thumbnail">
                        </a>   
                        </span> <!-- Service Img end -->
                     <?php endif; ?> 
                     <div class="service-content">
                     <?php if($show_icon=="yes"): ?>
                        <div class="service-icon">
                           <i class="<?php echo esc_attr($icon) ?>"></i>
                        </div> <!-- Service icon end -->
                     <?php endif; ?>  
                        <h3 class="ts-service-title">
                            <a href="<?php echo get_post_permalink($recent->ID); ?>"><?php echo wp_trim_words( wp_kses($recent->post_title,['p']), $post_title_crop, '');  ?>
                            </a>
                        </h3>
                        <?php if($show_desc=="yes"): ?>
                            <p> 
                               <?php 
                                 echo wp_trim_words( wp_kses($recent->post_excerpt,['p']), $desc_limit, ''); 
                                ?>  
                            </p>
                        <?php endif; ?> 
                        <?php if($show_readmore=="yes"): ?>
                           <a href="<?php echo get_post_permalink($recent->ID); ?>" class="readmore"><?php echo esc_html__('Read more', 'autrics');  ?><i class="fa fa-angle-double-right"></i></a>
                        <?php endif; ?> 
     
                     </div> <!-- Service content end -->
               </div> <!-- Service wrapper end -->
               
        <?php endforeach; ?>       
      </div><!-- Row end -->    
    <?php endif; ?>     

    <?php if($service_style == "style2"): ?>   
    <div class="row ts-feature-standard">
    <?php  foreach( $service_posts as $recent):   
             setup_postdata( $recent );
     ?>
            <div class="col-lg-4 col-md-6">
               <?php $icon = autrics_meta_option($recent->ID,'autrics_service_icon');  ?>
                  <div class="ts-feature-wrapper">
                    <div class="feature-single">
                     <span class="feature-icon">
                     <i class="<?php echo esc_attr($icon) ?>"></i>
                     </span><!-- feature icon -->
                    <div class="feature-content">
                        <h3 class="ts-service-title">
                           <a href="<?php echo get_post_permalink($recent->ID); ?>"><?php echo wp_trim_words( wp_kses($recent->post_title,['p']), $post_title_crop, '');  ?>
                           </a>
                        </h3>
                        <?php if($show_desc=="yes"): ?>
                          <p>
                             <?php echo wp_trim_words( wp_kses($recent->post_excerpt,['p']), $desc_limit, '');  ?>  
                           </p>
                        <?php endif; ?> 
                    </div><!-- feature content end -->
                </div><!-- feature single end -->
                </div><!-- feature wrapper end -->
            </div><!-- Col end -->
    <?php endforeach; ?>               
    </div><!-- Content Row End -->
    <?php endif; ?>    

    <?php if($service_style == "style3" && count($q)==1): ?>   
    <?php $icon = autrics_meta_option($q[0]->ID,'autrics_service_icon');  ?>

      <div class="ts-service-wrapper">
               <span class="service-img">
                  <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($q[0]->ID,'large'); ?>" alt="service-img">
               </span> <!-- Service Img end -->
               <div class="service-content">
               <?php if($show_icon == 'yes'): ?>
                     <div class="service-icon">
                     <i class="<?php echo esc_attr($icon) ?>"></i>
                     </div> <!-- Service icon end -->
            <?php endif; ?>
                     <h3 class="ts-service-title">
                        <a href="<?php echo get_post_permalink($q[0]->ID); ?>"><?php echo wp_trim_words( wp_kses($q[0]->post_title,['p']), $post_title_crop, '');  ?>
                        </a>
                     </h3>
                     <?php if($show_desc=="yes"): ?>
                     <p>
                       <?php echo wp_trim_words( wp_kses($q[0]->post_excerpt,['p']), $desc_limit, '');  ?> 
                     </p>
                     <?php endif; ?> 
                     <?php if($show_readmore=="yes"): ?>
                       <a href="<?php echo get_post_permalink($q[0]->ID); ?>" class="readmore"> <?php echo esc_html__('Read more', 'autrics'); ?> <i class="fa fa-angle-double-right"></i></a>
                     <?php endif; ?> 
                    
               </div> <!-- Service content end -->
      </div> <!-- Service wrapper end -->   

     <?php endif; ?> 


     <?php if($service_style == "style4" && count($q)==1): ?>   
    <?php $icon = autrics_meta_option($q[0]->ID,'autrics_service_icon');  ?>

      <div class="ts-service-wrapper ts-service-classic-wrapper">
               <div class="ts-classic-service">
               <span class="service-img">
                  <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($q[0]->ID,'large'); ?>" alt="service-img">
               </span> <!-- Service Img end -->
               <div class="service-content">
               <?php if($show_icon == 'yes'): ?>
            <?php endif; ?>

            <div class="service-category">
                <?php 
                  $terms = get_the_terms( $q[0]->ID, 'ts_service_cat' );
                  $cat = '';
                    if(is_array($terms)):
                        foreach($terms as $term):
                          $cat .= '<a href="'.get_term_link($term->slug, 'ts_service_cat').'">'.$term->name.'</a>';
                        endforeach;
                  endif;
                  echo autrics_kses($cat);
                ?>
            </div>
              <h3 class="ts-service-title">
                <a href="<?php echo get_post_permalink($q[0]->ID); ?>"><?php echo wp_trim_words( wp_kses($q[0]->post_title,['p']), $post_title_crop, '');
                  ?>
                </a>
              </h3>
              <?php if($show_desc=="yes"): ?>
              <p>
                <?php echo wp_trim_words( wp_kses($q[0]->post_excerpt,['p']), $desc_limit, '');  ?> 
              </p>
              <?php endif; ?> 
              <?php if($show_readmore=="yes"): ?>
                <a href="<?php echo get_post_permalink($q[0]->ID); ?>" class="readmore"> <?php echo esc_html__('More Details', 'autrics'); ?> <i class="fa fa-arrow-right"></i></a>
              <?php endif; ?> 
                    
               </div> <!-- Service content end -->
               </div>
      </div> <!-- Service wrapper end -->   

     <?php endif; ?> 
   <?php 
    wp_reset_query();
    }
    
    public function getCategories(){
        $terms = get_terms( array(
            'taxonomy'    => 'ts_service_cat',
            'hide_empty'  => false,
            'number'      => '150', 
        ) );
       
       
        $cat_list = [];
        $cat_list['all']   = ['All'];
        foreach($terms as $post) {
         $cat_list[$post->slug]  = [$post->name];
        }
          
       return $cat_list;
    }

    public function getServices(){
      $service_list = [];
      $args = array(
          'post_type' 		    	=> 'ts_service',
          'suppress_filters' 		=> false,
          'posts_per_page'       => '-1'
       
       );
       
       $posts = get_posts($args);
       foreach ($posts as $postdata) {
          setup_postdata( $postdata );
          $service_list[$postdata->ID] = [$postdata->post_title];
        }
     
      return $service_list;
  }
   
}