<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Autrics_Latestnews_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'autrics-latestnews';
    }

    public function get_title() {
        return esc_html__( 'Latest News', 'autrics' );
    }

    public function get_icon() { 
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'autrics-elements' ];
    }

    protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' =>esc_html__( 'Latest Post', 'autrics' ),
			]
        );
      
      $this->add_control(
         'post_count',
                     [
                        'label'         => esc_html__( 'Post count', 'autrics' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => '3',

                     ]
        );
    
      $this->add_control(
			'post_orderby',
			[
				'label' => esc_html__( 'Post order', 'autrics' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC'  => esc_html__( 'Desc', 'autrics' ),
					'ASC' => esc_html__( 'Asc', 'autrics' ),
					
				],
			]
      );
      $this->add_control('post_category',
         [
            'label'     => esc_html__( 'Category', 'autrics' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'multiple'  => true,
            'default'   => [],
            'options'   => $this->getCategories(),
         
         ]
      ); 

      $this->add_control(
         'post_title_crop',
         [
           'label'         => esc_html__( 'Title limit', 'autrics' ),
           'type'          => Controls_Manager::NUMBER,
           'default'       => '3',
           
         ]
       ); 
       
      $this->add_control(
         'show_desc',
         [
             'label'       => esc_html__('Show desc', 'autrics'),
             'type'        => Controls_Manager::SWITCHER,
             'label_on'    => esc_html__('Yes', 'autrics'),
             'label_off'   => esc_html__('No', 'autrics'),
             'default'     => 'yes',
            
         ]
      ); 
      $this->add_control(
            'desc_limit',
            [
              'label'         => esc_html__( 'Description limit', 'autrics' ),
              'type'          => Controls_Manager::NUMBER,
              'default'       => '10',
              'condition'     => [ 'show_desc' => ['yes'] ],
              
            ]
          );   
    
      $this->add_control(
            'show_date',
            [
                'label'       => esc_html__('Show Date', 'autrics'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__('Yes', 'autrics'),
                'label_off'   => esc_html__('No', 'autrics'),
                'default'     => 'yes',
            ]
        ); 
      $this->add_control(
         'show_author',
               [
                  'label'        => esc_html__('Show Author', 'autrics'),
                  'type'         => Controls_Manager::SWITCHER,
                  'label_on'     => esc_html__('Yes', 'autrics'),
                  'label_off'    => esc_html__('No', 'autrics'),
                  'default'      => 'no',
         
               ]
         );

      $this->add_control(
         'show_readmore',
                  [
                     'label'      => esc_html__('Show Readmore', 'autrics'),
                     'type'       => Controls_Manager::SWITCHER,
                     'label_on'   => esc_html__('Yes', 'autrics'),
                     'label_off'  => esc_html__('No', 'autrics'),
                     'default'    => 'yes',
            
                  ]
            );   

       $this->add_control(
           'show_navigation',
                    [
                    'label'        => esc_html__('Show Navigation', 'autrics'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Yes', 'autrics'),
                    'label_off'    => esc_html__('No', 'autrics'),
                    'default'      => 'yes',
            
                    ]
            );  
            $this->add_control(
               'auto_nav_slide',
               [
                   'label'       => esc_html__('Auto play', 'autrics'),
                   'type'        => Controls_Manager::SWITCHER,
                   'label_on'    => esc_html__('Yes', 'autrics'),
                   'label_off'   => esc_html__('No', 'autrics'),
                   'default'     => 'yes',
                  
               ]
            );    

      $this->end_controls_section();
      
      $this->start_controls_section(
			'style_section',
			[
				'label'      => esc_html__( 'Style Section', 'autrics' ),
				'tab'        => Controls_Manager::TAB_STYLE,
			]
		); 
      $this->add_control(
         'post_text_color',
         [
             'label'       => esc_html__('Title color', 'autrics'),
             'type'        => Controls_Manager::COLOR,
             'selectors'   => [
                  '{{WRAPPER}} .post .entry-title a' => 'color: {{VALUE}};',
             ],
         ]
        );

      $this->add_control('post_text_color_hover',
         [
             'label'          => esc_html__('Title hover', 'autrics'),
             'type'           => Controls_Manager::COLOR,
              'selectors'     => [
               '{{WRAPPER}} .post .entry-title a:hover' => 'color: {{VALUE}};',
           
             ],
         ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(),
          [
		   	'name'		 => 'autrics_latest_post_typography',
			   'selectors'	 => [
                '{{WRAPPER}} .ts-latest-post',
              
                ]
			]
		);
      $this->end_controls_section();  
    } 

    protected function render() {
     
         $settings         =       $this->get_settings();
         $post_title_crop  =       $settings["post_title_crop"];
         $post_orderby    =         $settings['post_orderby'];
         $show_desc        =       $settings["show_desc"];
         $desc_limit       =       $settings["desc_limit"];
         $post_count       =       $settings["post_count"];
         $show_date        =       $settings["show_date"];
         $show_author      =       $settings["show_author"];
         $show_readmore    =       $settings["show_readmore"];
         $show_navigation  =       $settings["show_navigation"]=="yes"?true:false;
         $auto_nav_slide    =         $settings['auto_nav_slide'];
         $post_category   = $settings["post_category"];

        

         $slide_controls = [
            'show_nav'=>$show_navigation, 
            'auto_nav_slide'=>$auto_nav_slide, 
         
            ];
         $slide_controls = \json_encode($slide_controls); 

         $args = array(
            'numberposts'      => $post_count,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true
         );
         $args['order'] = $post_orderby;

         if(is_array($post_category) && count($post_category)){
            $args['category__in'] = $post_category;
         }

         $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
  
    ?>
        <div  data-controls="<?php echo esc_attr($slide_controls); ?>" class="news-carousel owl-carousel">
        <?php  foreach( $recent_posts as $recent):   ?>
           <div class="ts-latest-post">
                   <?php if(has_post_thumbnail($recent['ID'])): ?>
                        <div class="post-media post-image">
                            <a href="<?php echo esc_url( get_permalink($recent["ID"]) ); ?>"><img src="<?php echo get_the_post_thumbnail_url( $recent['ID'], 'large' ); ?>" class="img-fluid" alt="<?php echo get_author_posts_url( $recent['post_author']); ?>"></a>
                        </div>
                  <?php endif; ?>
                     <div class="post-body">
                         <?php if($show_date=='yes'): ?>
                        <div class="post-date">
                            <span class="day"> <?php echo date('d', strtotime($recent["post_date"])); ?></span>
                           <span class="month"><?php echo date('M', strtotime($recent["post_date"])); ?></span>
                        </div> <!-- Post Date End -->
                        <?php endif; ?> 
                       
                        <div class="post-info">
                           <div class="post-meta">
                           <?php if($show_author=='yes'): ?> 
                           <i class="icon icon-user"></i> 
                              <span class="post-author">By <a href="<?php echo get_author_posts_url( $recent['post_author']); ?>"><?php echo get_the_author(); ?></a></span>
                           <?php endif; ?>  
                            </div>
                        </div> <!-- Post Info End -->
                       
                        <h3 class="post-title">
                           <a href="<?php echo get_post_permalink($recent["ID"]); ?>"><?php echo wp_trim_words( wp_kses($recent["post_title"],['p']), $post_title_crop, '');  ?> </a>
                        </h3>
                        <div class="post-text">
                        
                        <?php if($show_desc=="yes"): ?>
                          <p> <?php echo wp_trim_words( autrics_kses($recent["post_content"],['p']), $desc_limit, '');  ?>   </p>
                        <?php endif; ?> 
                         
                        </div>
                        <?php if($show_readmore=="yes"): ?>
                        <a href="<?php echo get_post_permalink($recent["ID"]); ?>" class="readmore"><?php echo esc_html__('Read More', 'autrics'); ?> <i class="fa fa-angle-double-right"></i></a>
                        <?php endif; ?> 
                     </div> <!-- Post Body End -->
                   </div> <!-- Latest Post End -->
           <?php endforeach; ?>       
       </div><!-- Row end -->      
   <?php 
    wp_reset_query();
    }

   public function getCategories(){
      
      $terms = get_terms( array(
                  'taxonomy'    => 'category',
                  'hide_empty'  => false,
                  'posts_per_page' => -1, 
          ) );

      
      $cat_list = [];
    
      foreach($terms as $post) {
     
          $cat_list[$post->term_id]  = [$post->name];
      }
      
      return $cat_list;

  } 
  
}