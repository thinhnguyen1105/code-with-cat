
<?php 
      $banner_image    = '';
      $banner_title    = ''; 
      $banner_subtitle = '';

   if ( defined( 'FW' ) ) { 
      $banner_settings = autrics_option('service_banner_setting'); 
   
      //image
      $banner_image    = ( is_array($banner_settings['banner_service_image']) && $banner_settings['banner_service_image']['url'] != '') ? 
                           $banner_settings['banner_service_image']['url'] : AUTRICS_IMG.'/banner/blog_banner.jpg';

      //title 
      $banner_title    = (isset($banner_settings['banner_service_title']) && $banner_settings['banner_service_title'] != '') ? 
                           $banner_settings['banner_service_title'] : get_the_title();
      //show
      $show            = (isset($banner_settings['service_show_banner'])) ? $banner_settings['service_show_banner'] : 'yes'; 
      
      //breadcumb 
      $show_breadcrumb =  (isset($banner_settings['service_show_breadcrumb'])) ? $banner_settings['service_show_breadcrumb'] : 'yes';

      // override banner 
      $banner_override = autrics_meta_option(get_the_ID(),'autrics_service_banner_override','no');
      if(is_singular('ts_service')){
         $banner_title = get_the_title();
      }
      if($banner_override == 'yes'):
         $show = autrics_meta_option(get_the_ID(),'autrics_service_show_banner','yes');
         $show_breadcrumb = autrics_meta_option(get_the_ID(),'autrics_service_show_breadcrumb','yes');
         $banner_title_override = autrics_meta_option(get_the_ID(),'autrics_banner_service_title','');
         $banner_service_image = autrics_meta_option(get_the_ID(),'autrics_banner_service_image',[]);
         $banner_title = $banner_title_override==''?$banner_title:$banner_title_override;
         if(isset($banner_service_image['url'])):
            $banner_image  =  $banner_service_image['url'];
         endif;   
        
      endif;   

     
     
           

   }else{
      //default
      $banner_image    = AUTRICS_IMG.'/banner/blog_banner.jpg';
      $banner_title    = esc_html__('Service Details','autrics');
      $show            = 'yes';
      $show_breadcrumb = 'no';
      
   }
   if( isset($banner_image) && $banner_image != ''){
      $banner_image = 'style="background-image:url('.esc_url( $banner_image ).');"';
   }
   ?>

   <?php if(isset($show) && $show == 'yes'): ?>


<div class="banner-area bg-overlay <?php echo autrics_option('header_layout_style','three')=="four"?'transparent-banner-area':''; ?> " id="banner-area" <?php echo wp_kses_post( $banner_image ); ?> >
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="banner-heading">
             
               <h1 class="banner-title">
               <?php 
                if(is_archive()){
                  the_archive_title();
                 }else{
                  $autrics_title = str_replace(['[', ']'], ['<span>', '</span>'],$banner_title ); 
                  echo wp_kses_post( $autrics_title);
                }
               ?> 
               </h1> 
           
            <?php if(isset($show_breadcrumb) && $show_breadcrumb == 'yes'): ?>
                        <?php autrics_get_breadcrumbs('  '); ?>
            <?php endif; ?>
               </div><!-- Banner Heading end -->
            </div><!-- Col end-->
         </div><!-- Row end-->
      </div><!-- Container end-->
   </div><!-- Banner area end-->
<?php endif; ?>