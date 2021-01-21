<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if(defined('ELEMENTOR_VERSION')):

include_once AUTRICS_EDITOR . '/elementor/manager/controls.php';

class AUTRICS_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;
    

    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     * 
     * @since 1.0
     */

	public function __construct(){

		add_action('elementor/init', array($this, 'AUTRICS_elementor_init'));
        add_action('elementor/controls/controls_registered', array( $this, 'AUTRICS_icon_pack' ), 11 );
        add_action('elementor/controls/controls_registered', array( $this, 'control_image_choose' ), 13 );
        add_action('elementor/controls/controls_registered', array( $this, 'AUTRICS_ajax_select2' ), 13 );
        add_action('elementor/widgets/widgets_registered', array($this, 'AUTRICS_shortcode_elements'));
        add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_enqueue_styles' ) );
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );
        
	}


    /**
     * Enqueue Scripts
     *
     * @return void  
     */ 
    
     public function enqueue_scripts() {
         wp_enqueue_script( 'autrics-main-elementor', AUTRICS_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), AUTRICS_VERSION, true );
    }

    /**
     * Enqueue editor styles
     *
     * @return void
     */

    public function editor_enqueue_styles() {
        
        wp_enqueue_style( 'autrics-icon-elementor', AUTRICS_CSS.'/icofont.css',null, AUTRICS_VERSION );

    }

    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function AUTRICS_elementor_init(){
    
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'autrics-elements',
            [
                'title' =>esc_html__( 'Autrics', 'autrics' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
     */ 

    public function AUTRICS_icon_pack( $controls_manager ) {

        require_once AUTRICS_EDITOR_ELEMENTOR. '/controls/icon.php';

        $controls = array(
            $controls_manager::ICON => 'AUTRICS_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }
    // registering ajax select 2 control
    public function AUTRICS_ajax_select2( $controls_manager ) {
        require_once AUTRICS_EDITOR_ELEMENTOR. '/controls/select2.php';
        $controls_manager->register_control( 'ajaxselect2', new \Control_Ajax_Select2() );
    }
    
    // registering image choose
    public function control_image_choose( $controls_manager ) {
        require_once AUTRICS_EDITOR_ELEMENTOR. '/controls/choose.php';
        $controls_manager->register_control( 'imagechoose', new \Control_Image_Choose() );
    }

    public function AUTRICS_shortcode_elements($widgets_manager){

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/call-to-action.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Call_To_Action_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/title.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Title_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/feature.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Feature_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/process.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Process_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/pricing.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Pricing_Widget());
       
        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/latestnews.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Latestnews_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/services.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Services_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/quote.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Quote_Carousel_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/team-member.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_Team_Member_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/owlslider.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_OwlSlider_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/minislider.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_MiniSlider_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/intro-contact.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_intro_contact_Widget());

        require_once AUTRICS_EDITOR_ELEMENTOR.'/widgets/about-us-tab.php';
        $widgets_manager->register_widget_type(new Elementor\Autrics_about_us_tab_Widget());

  
        
    
    }
    
	public static function AUTRICS_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new AUTRICS_Shortcode();
        }
        return self::$_instance;
    }

}
$AUTRICS_Shortcode = AUTRICS_Shortcode::AUTRICS_get_instance();

endif;