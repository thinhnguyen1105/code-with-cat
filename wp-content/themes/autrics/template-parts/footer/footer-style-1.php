  <?php

   $footer_bg                 = '';
   $back_to_top               = '';
   $footer_padding_top        = '';
   $style_footer_padding_top  = '';
   $footer_copyright_color    = '';
   
   if (defined( 'FW' )): 
    
      $footer_bg                 = autrics_option("footer_bg_color");
      $back_to_top               = autrics_option("back_to_top");
      $footer_padding_top        = autrics_option("footer_padding_top");
      $style_footer_padding_top  = "style='padding-top:{$footer_padding_top}'";
      $footer_copyright_color    = autrics_option("footer_copyright_color");

      if( $footer_bg!= '' ):
         $footer_bg = "style='background:{$footer_bg}'";
      endif;

      if( $footer_copyright_color!= '' ):
         $footer_copyright_color = "style='background:{$footer_copyright_color}'";
      endif;

   endif;
   ?>
  
   <footer <?php echo  wp_kses_post($style_footer_padding_top); ?> class="footer" id="footer">
              <?php if( is_active_sidebar('footer-left') || is_active_sidebar('footer-left-middle') || is_active_sidebar('footer-right-middle') || is_active_sidebar('footer-right') ): ?> 
               <div class="footer-main" <?php echo wp_kses_post($footer_bg); ?> >
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-3 col-md-6 footer-widget footer-about">
                     
                        <?php   dynamic_sidebar( 'footer-left' ); ?>
                        </div> <!-- Col End -->
                        <!-- About us end-->
                        <div class="col-lg-3 col-md-6 footer-widget widget-service">
                           <?php dynamic_sidebar('footer-left-middle'); ?>
                        </div> <!-- Col End -->
                        <div class="col-lg-3 col-md-6 footer-widget news-widget">
                        <?php dynamic_sidebar('footer-right-middle'); ?>
                        </div> <!-- Col End -->
                        <div class="col-lg-3 col-md-6 footer-widget">
                        <?php   dynamic_sidebar( 'footer-right' ); ?>
                        </div> <!-- Col End -->
                     </div><!-- Content row end-->
                  </div><!-- Container end-->
               </div><!-- Footer Main-->
            <?php endif; ?>
  
      <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-12">
                     <div class="copyright-info">
                     <span <?php echo  esc_attr($footer_copyright_color); ?> ><?php 
                        $copyright_text = autrics_option('footer_copyright', '&copy; 2019, Autrics. All rights reserved');
                        echo autrics_kses($copyright_text);                                
                    ?></span>
                     </div>
                  </div>
               <?php if ( defined( 'FW' ) ): ?>
                  <div class="col-lg-6 col-md-12">
                    <?php if ( has_nav_menu( 'footermenu' ) ) : ?>
                         <div class="footer-menu">
                              <?php
                         
                                // footer Nav
                                wp_nav_menu( array(
                                    'theme_location' => 'footermenu',
                                    'depth'          => 1,
                                    'menu_class'   => 'nav unstyled',
                                 
                                ) );
                         
                               ?>
                
                           </div> <!-- Footer menu end -->
                     <?php endif; ?>   
                  </div> <!-- Col End -->
                  <?php endif; ?> 
               </div><!-- Row end-->
               
            </div><!-- Container end-->
            <?php if($back_to_top=="yes"): ?>
            <div class="back-to-top" id="back-to-top" data-spy="affix" data-offset-top="10" style="display: block;">
               <button class="back-btn" title="<?php echo esc_attr__("Back to Top",'autrics'); ?>">
                  <i class="fa fa-angle-double-up"></i><!-- icon end-->
               </button><!-- button end-->
            </div><!-- Back to top -->
            <?php endif; ?>
      </div><!-- Copyright end-->
   </footer> <!-- Footer End -->
      