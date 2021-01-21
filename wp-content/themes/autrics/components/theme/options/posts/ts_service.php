<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }


$options = array(
  
    
    'autrics_service' => array(
        'type' => 'tab',
        'options' => array(
            array(
                'type'    => 'tab',
                'options' => array(

                'autrics_service_icon' => array(
                    'label'        => esc_html__('Service Icon', 'autrics'),
                    'type'         => 'new-icon',
                    'preview_size' => 'medium',
                    'modal_size'   => 'medium',
                    'desc'         => esc_html__('Select your service Logo', 'autrics'),
                   
                ),
                'autrics_service_banner_override' => [
                  'type'			 => 'switch',
                  'label'			 => esc_html__( 'Banner override?', 'autrics' ),
                  'desc'          => esc_html__('Override the banner', 'autrics'),
                  'value'         => 'no',
                  'left-choice'	 => [
                      'value'	 => 'yes',
                      'label'	 => esc_html__( 'Yes', 'autrics' ),
                  ],
                  'right-choice'	 => [
                      'value'	 => 'no',
                      'label'	 => esc_html__( 'No', 'autrics' ),
                  ],
              ],

                'autrics_service_show_banner' => [
                  'type'			 => 'switch',
                  'label'			 => esc_html__( 'Show banner?', 'autrics' ),
                  'desc'          => esc_html__('Show or hide the banner', 'autrics'),
                  'value'         => 'yes',
                  'left-choice'	 => [
                      'value'	 => 'yes',
                      'label'	 => esc_html__( 'Yes', 'autrics' ),
                  ],
                  'right-choice'	 => [
                      'value'	 => 'no',
                      'label'	 => esc_html__( 'No', 'autrics' ),
                  ],
              ],
              'autrics_service_show_breadcrumb' => [
                  'type'		   	 => 'switch',
                  'label'		   	 => esc_html__( 'Show Breadcrumb?', 'autrics' ),
                  'desc'             => esc_html__('Show or hide the Breadcrumb', 'autrics'),
                  'value'            => 'yes',
                  'left-choice'	 => [
                      'value'	 => 'yes',
                      'label'	 => esc_html__( 'Yes', 'autrics' ),
                  ],
                  'right-choice'	 => [
                      'value'	 => 'no',
                      'label'	 => esc_html__( 'No', 'autrics' ),
                  ],
              ],
              'autrics_banner_service_title'	 => [
                  'type'	 => 'text',
                  'label'	 => esc_html__( 'Banner title', 'autrics' ),
                  'value'   => esc_html__( 'Welcome Autrics Service', 'autrics' ),
              ],
             
              'autrics_banner_service_image'	 =>array(
                  'type'         => 'upload',
                  'label'        => esc_html__('Image', 'autrics'),
                  'desc'         => esc_html__('Banner Service image', 'autrics'),
                  'images_only'  => true,
                  'files_ext'    => array( 'PNG', 'JPEG', 'JPG','GIF'),
                        
               
              )
                       

            ),
                  
            )
        ),
        'title' => esc_html__('Service Details', 'autrics'),
 
    
        
    ),
  
    
);