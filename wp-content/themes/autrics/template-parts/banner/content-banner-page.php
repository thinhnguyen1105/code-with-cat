<?php 
      $banner_image	= '';
      $banner_title  = '';

     if ( defined( 'FW' ) ) { 
      
      $banner_settings = autrics_option('page_banner_setting'); 
      $banner_image    = autrics_meta_option( get_the_ID(), 'header_image' );
        //title
      if(autrics_meta_option( get_the_ID(), 'header_title' ) != ''){
         $banner_title  = autrics_meta_option( get_the_ID(), 'header_title' );
      }elseif($banner_settings['banner_page_title'] != ''){
         $banner_title = $banner_settings['banner_page_title'];
      }
      
      //image
      if(is_array($banner_image) && $banner_image['url'] != '' ){
         $banner_image = $banner_image['url'];
      }elseif( is_array($banner_settings['banner_page_image']) && $banner_settings['banner_page_image']['url'] != ''){
            $banner_image = $banner_settings['banner_page_image']['url'];
      }else{
         $banner_image = AUTRICS_IMG.'/banner/banner-bg1.jpg';
      }
      
      $show = (isset($banner_settings['page_show_banner'])) ? $banner_settings['page_show_banner'] : 'yes'; 
      // breadcumb
      $show_breadcrumb =  (isset($banner_settings['page_show_breadcrumb'])) ? $banner_settings['page_show_breadcrumb'] : 'yes';

   
     }else{
      //default
      $banner_image     = AUTRICS_IMG.'/banner/about_banner.jpg';
      $banner_title     = get_the_title();
      $show             = 'yes';
      $show_breadcrumb  = 'no';
   }
   if( $banner_image != ''){
      $banner_image = 'style="background-image:url('.esc_url( $banner_image ).');"';
   }
   ?>

<?php if(isset($show) && $show == 'yes'): ?>
<div class="banner-area banner-area-classic bg-overlay <?php echo autrics_option('header_layout_style','one')=="four"||"five"?'banner-classic transparent-banner-area':''; ?> " id="banner-area" <?php echo wp_kses_post($banner_image); ?> >
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="banner-heading">
               <?php if($banner_title!=''): ?>
               <h1 class="banner-title">
               <?php echo esc_html($banner_title);  ?> 
               </h1> 
            <?php endif; ?> 
            <?php if(isset($show_breadcrumb) && $show_breadcrumb == 'yes'): ?>
                     <?php autrics_get_breadcrumbs('  '); ?>
            <?php endif; ?>
               </div><!-- Banner Heading end -->
            </div><!-- Col end-->
         </div><!-- Row end-->
      </div><!-- Container end-->
   </div><!-- Banner area end-->
<?php endif; ?>