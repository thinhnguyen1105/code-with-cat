<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Autrics_Team_Member_Widget extends Widget_Base {

    public function get_name() {
        return 'autrics-team';
    }

    public function get_title() {
        return esc_html__( 'Autrics Team', 'autrics' );
    }

    public function get_icon() {
        return 'eicon-lock-user';
    }

    public function get_categories() {
        return ['autrics-elements'];
    }

    protected function _register_controls() {
        
            $this->start_controls_section('section_tab_style',
                  [
                     'label' => esc_html__('Autrics team', 'autrics'),
                  ]
               );

         
            $this->add_control('team_style',
               [
                  'label'     => esc_html__( 'Team Style', 'autrics' ),
                  'type'      => Custom_Controls_Manager::IMAGECHOOSE,
                  'default'   => 'style1',
                  'options'   => [
                     'style1' => [

                              'title'      =>   esc_html__( ' Style 1 ', 'autrics' ),
                              'imagelarge' => AUTRICS_IMG. '/style/team/style1.png',
                              'imagesmall' => AUTRICS_IMG. '/style/team/style1.png',
                              'width'      => '30%',

                     ],
                     'style2' => [

                              'title'      => esc_html__( ' Style 2', 'autrics' ),
                              'imagelarge' => AUTRICS_IMG. '/style/team/style2.png',
                              'imagesmall' => AUTRICS_IMG. '/style/team/style2.png',
                              'width' => '30%',

                     ],  
                     'style3' => [

                              'title'      => esc_html__( ' Style 3', 'autrics' ),
                              'imagelarge' => AUTRICS_IMG. '/style/team/style3.png',
                              'imagesmall' => AUTRICS_IMG. '/style/team/style3.png',
                              'width' => '30%',

                     ],  
                  
               
                  ],
               ]
            );
        
            $this->add_control('show_rating',
               [
                  'label'     => esc_html__('Show Rating', 'autrics'),
                  'type'      => Controls_Manager::SWITCHER,
                  'label_on'  => esc_html__('Yes', 'autrics'),
                  'label_off' => esc_html__('No', 'autrics'),
                  'default'   => 'yes',
                  'condition' => ["team_style"=>"style1"],
               
               ]
               );    
            
            $this->add_control('team_member_rating',
              [
                  'label'         =>esc_html__( 'Rating', 'autrics' ),
                  'type'          => Controls_Manager::NUMBER,
                  'label_block'   => true,
                  'condition'     => ["show_rating"=>"yes"],
            
              ]
            );
            
            $this->add_control('team_member_name',
               [
                    'label'		  	=> esc_html__( 'Name', 'autrics' ),
                    'type'			   => Controls_Manager::TEXT,
                    'label_block'	=> true,
                    'placeholder'	=> esc_html__( 'Jhon Wick', 'autrics' ),
                    'default'	      => esc_html__( 'Jhon Wick', 'autrics' ),
                   
              ]
            );

            $this->add_control('team_member_designation',
               [
                    'label'			  => esc_html__( 'Designation', 'autrics' ),
                    'type'			     => Controls_Manager::TEXT,
                    'label_block'	  => true,
                    'placeholder'	  => esc_html__( 'Lead Painter', 'autrics' ),
                    'default'	        => esc_html__( 'Lead Painter', 'autrics' ),
                   
               ]
            );

            $this->add_control('team_member_image',
               [
                    'label'         =>esc_html__( 'Choose Image', 'autrics' ),
                    'type'          => Controls_Manager::MEDIA,
                    'default'       => [
                    'url'           => Utils::get_placeholder_image_src(),
                    ],
                    'label_block'   => true,
                   
               ]
             );

             $this->add_control(
               'experience_title',
               [
                  'label' => esc_html__( 'Experience Title', 'autrics' ),
                  'type' => Controls_Manager::TEXT,
                  'default' => esc_html__( 'Years of Experience', 'autrics' ),
                  'placeholder' => esc_html__( 'Years of Experience', 'autrics' ),
                  'label_block' => true,
                  'condition' => ["team_style"=>"style1"],
               ]
            );

        

             $this->add_control('team_member_exp',
               [
                    'label'			=> esc_html__( 'Year of Experience', 'autrics' ),
                    'type'		   	=> Controls_Manager::NUMBER,
                    'label_block'	=> true,
                    'placeholder'	=> esc_html__( '5', 'autrics' ),
                    'default'	      => esc_html__( '2', 'autrics' ),
                    'condition'     => ["team_style"=>"style1"],
                   
              ]
            );

            $this->add_control(
               'project_title',
               [
                  'label' => esc_html__( 'Project Title', 'autrics' ),
                  'type' => Controls_Manager::TEXT,
                  'default' => esc_html__( 'Projects Done', 'autrics' ),
                  'label_block' => true,
                  'condition' => ["team_style"=>"style1"],
               ]
            );

            $this->add_control('team_member_projects',
               [
                    'label'			=> esc_html__( 'Number of Project', 'autrics' ),
                    'type'		    	=> Controls_Manager::NUMBER,
                    'label_block'	=> true,
                    'placeholder'	=> esc_html__( '5', 'autrics' ),
                    'default'	      => esc_html__( '2', 'autrics' ),
                    'condition'     => ["team_style"=>"style1"],
                   
               ]
            );
           
            $this->add_control('team_member_phone', 
               [
                    'label'			=> esc_html__( 'Phone', 'autrics' ),
                    'type'		    	=> Controls_Manager::TEXT,
                    'label_block'	=> true,
                    'placeholder'	=> esc_html__( '5555555-555', 'autrics' ),
                    'default'	      => esc_html__( '99977788-2255', 'autrics' ),
                    'condition'     => ["team_style"=>"style2"],
               ]
            );

            $this->add_control('team_member_mail', 
              [
                    'label'			=> esc_html__( 'Mail', 'autrics' ),
                    'type'			   => Controls_Manager::TEXT,
                    'label_block'	=> true,
                    'placeholder'	=> esc_html__( 'robert@autrics.com', 'autrics' ),
                    'default'	      => esc_html__( 'robert@autrics.com', 'autrics' ),
                    'condition'     => ["team_style"=>"style2"],
                   
                ]
            );
        
        $repeater = new \Elementor\Repeater();

      $repeater->add_control('social_list_title',
         [
				'label'         => esc_html__( 'Title', 'autrics' ),
				'type'          => \Elementor\Controls_Manager::TEXT,
				'default'       => esc_html__( 'Site Title' , 'autrics' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control('social_list_url',
			[
				'label'      => esc_html__( 'Url', 'autrics' ),
				'type'       => \Elementor\Controls_Manager::URL,
				
			]
        );

        $repeater->add_control('social_list_icon',
			[
				'label'    => esc_html__( 'Icon', 'autrics' ),
				'type'     => \Elementor\Controls_Manager::ICON,
				
			]
		);

		$this->add_control('social_list',
			[
				'label'    => esc_html__( 'Social List', 'autrics' ),
				'type'     => \Elementor\Controls_Manager::REPEATER,
				'fields'   => $repeater->get_controls(),
				'default'  => [
					[
						'social_list_title' => esc_html__( 'Title #1', 'autrics' ),
					
					],
				
				],
				'title_field' => '{{{ social_list_title }}}',
			]
		);

      
        $this->end_controls_section();

       

    }

    protected function render( ) {
     
        $settings                =        $this->get_settings();
        $team_member_name        =        $settings['team_member_name'];
        $team_member_designation =        $settings['team_member_designation'];
        $team_member_image       =        $settings['team_member_image'];
        $team_member_rating      =        $settings['team_member_rating'];
        $team_member_exp         =        $settings['team_member_exp'];
        $experience_title         =       $settings['experience_title'];
        $project_title         =          $settings['project_title'];
        $team_member_projects    =        $settings['team_member_projects'];
        $team_member_phone       =        $settings['team_member_phone'];
        $team_member_mail        =        $settings['team_member_mail'];
        $autrics_team_social     =        $settings['social_list'];
        $show_rating             =        $settings["show_rating"];
        $style                   =        $settings['team_style'];
        $show_rating             =        $settings["show_rating"];
         
    
        ?>

        <?php if($style=="style1"): ?> 

        <div class="ts-team-info">
                    <?php if(is_array($team_member_image) && $team_member_image["url"]!='' ): ?>
                       <img src="<?php echo esc_url($team_member_image["url"]); ?>" alt=" <?php echo esc_html($team_member_name) ; ?>" class="img-fluid">
                     <?php endif; ?> 
                   <div class="team-content">
                        <div class="team-details">
                           <h3 class="team-name">
                              <?php echo esc_html($team_member_name) ; ?>
                           </h3>
									<p>  <?php echo esc_html($team_member_designation) ; ?> </p>
                           <?php if($show_rating=="yes"): ?>
                           <span class="team-rating">
                              <i class="fa fa-star"><span><?php echo esc_html($team_member_rating ) ; ?> </span></i>
                           </span>
                          <?php endif; ?>
                        </div>
                        <div class="team-text">
                            
                           <p><?php echo esc_html($experience_title); ?><span><?php echo esc_html($team_member_exp!=''?$team_member_exp:'0'); ?></span></p>
                           <p><?php echo esc_html($project_title); ?><span><?php echo esc_html($team_member_projects!=''?$team_member_projects:'0' ); ?></span></p>

                        </div>
                  </div> <!-- Post Body End -->
         </div> <!-- Latest Post End -->

        <?php endif; ?> 

        <?php if($style=="style2"): ?> 
            <div class="ts-team-classic">
                <div class="ts-team-info">
                    <div class="team-img">
                        <?php if(is_array($team_member_image) && $team_member_image["url"]!='' ): ?>
                        <img class="img-fluid" src="<?php echo esc_url($team_member_image["url"]); ?>" alt=" <?php echo esc_html($team_member_name) ; ?>">
                        <?php endif; ?>
                        <ul class="team-social unstyled">
                        <?php foreach($autrics_team_social as $value): ?>
                        
                        <li><a href="<?php echo esc_url($value["social_list_url"]["url"]);?>"><i class="<?php echo esc_attr( $value["social_list_icon"] );?>"></i></a></li>
               
                       <?php endforeach; ?>
                        </ul><!-- Team social end -->
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">
                        <?php echo esc_html($team_member_name) ; ?>
                        <span><?php echo esc_html($team_member_designation) ; ?></span>
                        </h3>
                        <?php if($team_member_phone!=''): ?>
                        <p>Mail - <?php echo esc_html($team_member_phone); ?></p>
                         <?php endif; ?>
                         <?php if($team_member_mail!=''): ?>
                        <p>Phone - <?php echo esc_html($team_member_mail); ?></p>
                        <?php endif; ?>
                    </div><!-- Team content end -->
               </div><!-- Team info end -->
         </div>
      <?php endif; ?> 

      <?php if($style == "style3"): ?>
      <div class="ts-team-standard">
         <div class="ts-team-info">
            <div class="team-img">
            <?php if(is_array($team_member_image) && $team_member_image["url"]!='' ): ?>
               <img class="img-fluid" src="<?php echo esc_url($team_member_image["url"]); ?>" alt=" <?php echo esc_html($team_member_name) ; ?>">
            <?php endif; ?>
               <ul class="team-social unstyled">
               <?php foreach($autrics_team_social as $value): ?>
                     <li><a href="<?php echo esc_url($value["social_list_url"]["url"]);?>"><i class="<?php echo esc_attr( $value["social_list_icon"] );?>"></i></a></li>
                  <?php endforeach; ?>
               </ul>
               <!-- Team social end -->
            </div>
            <div class="team-content">
               <h3 class="team-name">
               <?php echo esc_html($team_member_name) ; ?>
               </h3>
            </div>
            <!-- Team content end -->
         </div>
      </div>
      <?php endif; ?>
          
     
     <?php
    }

    protected function _content_template() { }
}