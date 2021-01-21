<?php
/**
 * Blog Header
 *
 */
 
$banner_bg	 = $banner_title = $banner_subtitle = '';
 
if ( defined( 'FW' ) ) {
    
    $banner_settings = autrics_option('shop_banner_setting');
    //shop Page settings
    $show = (isset($banner_settings['shop_show_banner'])) ? $banner_settings['shop_show_banner'] : 'yes'; 
    $show_breadcrumb = (isset($banner_settings['shop_show_breadcrumb'])) ? $banner_settings['shop_show_breadcrumb'] : 'yes';

    $banner_title = (isset($banner_settings['shop_banner_title']) && $banner_settings['shop_banner_title'] != '') ? 
                        $banner_settings['shop_banner_title'] : esc_html__('Shop','autrics');
   
    $single_title = (isset($banner_settings['shop_banner_single_title']) && $banner_settings['shop_banner_single_title'] != '') ? 
                        $banner_settings['shop_banner_single_title'] : esc_html__('Product details','autrics');
    $banner_image = ( is_array($banner_settings['shop_banner_image']) && $banner_settings['shop_banner_image']['url'] != '') ? 
                        $banner_settings['shop_banner_image']['url'] : AUTRICS_IMG.'/banner/banner_bg.jpg';
                

}else{
    $banner_image =AUTRICS_IMG.'/banner/banner_bg.jpg';
    $banner_title = esc_html__('Shop','autrics');
    $single_title = esc_html__('Product Details','autrics');
    $show = 'yes';
    $show_breadcrumb = 'yes';
}
if( isset($banner_image) && $banner_image != ''){
    $banner_bg = 'style="background-image:url('.esc_url( $banner_image ).');"';
}

if(isset($show) && $show == 'yes'): ?>

<div id="page-banner-area" class="banner-area bg-overlay <?php echo autrics_option('header_layout_style','one')=="five"?'banner-classic transparent-banner-area':''; ?>" <?php echo wp_kses_post( $banner_bg ); ?>>
   <!-- Subpage title start -->
      <div class="banner-heading text-center">
      
         <h1 class="banner-title">
         <?php 
               if(isset($banner_title) && $banner_title !=''){
                  echo autrics_kses( $banner_title );
               }else if(is_archive()){
                  the_archive_title();
                  // echo autrics_kses( $banner_title );
               }elseif(is_product()){
                  echo autrics_kses( $single_title );
               }else{
                  echo get_the_title();
               }
         ?>
         </h1> 
      
      
         <?php if($show_breadcrumb == 'yes'): ?>
               <?php woocommerce_breadcrumb(); ?>
         <?php endif; ?>
      </div>
</div><!-- Page Banner end -->

<?php endif; ?>