
<?php 
      $banner_image    = '';
      $banner_title    = '';
      $banner_subtitle = '';

   if ( defined( 'FW' ) ) { 
      $banner_settings = autrics_option('blog_banner_setting'); 
         
      //image
      $banner_image    = ( is_array($banner_settings['banner_blog_image']) && $banner_settings['banner_blog_image']['url'] != '') ? 
                           $banner_settings['banner_blog_image']['url'] : AUTRICS_IMG.'/banner/blog_banner.jpg';

      //title 
      $banner_title    = (isset($banner_settings['banner_blog_title']) && $banner_settings['banner_blog_title'] != '') ? 
                           $banner_settings['banner_blog_title'] : get_bloginfo( 'name' );
      //show
      $show            = (isset($banner_settings['blog_show_banner'])) ? $banner_settings['blog_show_banner'] : 'yes'; 
      
      //breadcumb 
      $show_breadcrumb =  (isset($banner_settings['blog_show_breadcrumb'])) ? $banner_settings['blog_show_breadcrumb'] : 'yes';

   }else{
      //default
      $banner_image    = AUTRICS_IMG.'/banner/blog_banner.jpg';
      $banner_title    = get_bloginfo( 'name' );
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
                  echo esc_html($banner_title);
                }
               ?> 
               </h1> 
           
            <?php if(isset($show_breadcrumb) && $show_breadcrumb == 'yes'): ?>
                        <?php autrics_get_breadcrumbs( '', 5 ); ?>
            <?php endif; ?>
               </div><!-- Banner Heading end -->
            </div><!-- Col end-->
         </div><!-- Row end-->
      </div><!-- Container end-->
   </div><!-- Banner area end-->
<?php endif; ?>