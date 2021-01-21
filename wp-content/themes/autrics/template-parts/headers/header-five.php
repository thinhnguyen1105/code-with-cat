<?php 

if ( defined( 'FW' ) ) { 
   $header_topbar_settings =             autrics_option('header_top_bar_settings');
   $header_contact_setting =             autrics_option("header_contact_settings");
   $header_contact_button =              autrics_option('header_contact_button_settings');


   //topbar
   $header_topbar_time =                $header_topbar_settings["header_topbar_title"];
   $header_topbar_social =              $header_topbar_settings["header_topbar_social_links"];

   // header contact
   $header_phone_icon =                 $header_contact_setting["header_contact_icon"];
   $header_phone_title =                $header_contact_setting["header_contact_title"];
   $header_phone_number =               $header_contact_setting["header_contact_number"];
   $header_mail_icon =                  $header_contact_setting["header_contact_mail_icon"];
   $header_mail_title =                 $header_contact_setting["header_contact_mail_title"];
   $header_mail =                       $header_contact_setting["header_contact_mail"];
   $header_phone_number_link =          $header_contact_setting["header_contact_number_link"];
   $header_mail_link =                  $header_contact_setting["header_contact_mail_link"];

   
   //contact button 
   $header_contact_button_show =        $header_contact_button["header_contact_btn_show"];
   $header_contact_button_text =        $header_contact_button["header_contact_btn_title"];
   $header_contact_button_url =         $header_contact_button["header_contact_btn_url"];
 
    // search / cart
    $show_search = autrics_option('header_nav_search_section','no');
    $show_shopping_cart = autrics_option('header_nav_shopping_cart_section','no');
  
   }else{
   //default   
   $header_topbar_time = " ";
   $header_topbar_social = [];
   $header_phone_title = '';
   $header_phone_number = '';
   $header_mail_title = '';
   $header_mail = '';
   $header_phone_icon = '';
   $header_mail_icon = '';
   $header_phone_number_link = '';
   $header_mail_link = '';
      //contact button 
   $header_contact_button_show = 'yes';
   $header_contact_button_text = '';
   $header_contact_button_text = '';
  //search , cart
   $show_search  = 'no';
   $show_shopping_cart = 'no';

   } 

?>

   <div class="ts-top-bar-2 standard header-classic-topbar">
      <div class="container">
      <?php if (defined( 'FW' )): ?>
         <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-12">
               <ul class="top-contact-info">
                  <?php if( is_array($header_contact_setting) ):  ?>     
                     
                           
                     <li>
                     <div class="top-info-wrapper">
                        <?php if($header_mail!=''): ?>
                           <span class="top-classic-icon"><i class="<?php echo esc_attr($header_mail_icon); ?>"></i></span>
                        <?php endif; ?>
                           <?php if ($header_mail_link != '') { ?>
                                 <span class="info-subtitle">
                                    <a href="<?php echo esc_url($header_mail_link); ?>"><?php echo esc_html($header_mail); ?></a>
                                 </span>
                           <?php } else { ?>
                                 <span class="info-subtitle">
                                    <?php echo esc_html($header_mail); ?>
                                 </span>
                           <?php } ?>

                        </div>
                     </li> <!-- Li End -->
                     <li>
                        <div class="top-info-wrapper active">
                           <?php if($header_phone_number!=''): ?>
                              <span class="top-classic-icon"><i class="<?php echo esc_attr($header_phone_icon); ?>"></i></span>
                           <?php endif; ?>
                       
                           <?php if ($header_phone_number_link != '') { ?>
                                 <span class="info-subtitle">
                                    <a href="<?php echo esc_url($header_phone_number_link); ?>"><?php echo esc_html($header_phone_number); ?></a>
                                 </span>
                           <?php } else { ?>
                                 <span class="info-subtitle">
                                    <?php echo esc_html($header_phone_number); ?>
                                 </span>
                           <?php } ?>

                        </div>
                     </li> <!-- li End -->
                     <?php endif; ?>   
                     <!-- Li End -->
                  </ul>
                  <!-- Contact info End -->
            </div>
           
            <div class="col-lg-3 col-md-6 col-sm-12">
              <?php if ( count( $header_topbar_social ) ): ?>
               <div class="top-bar-social-icon  pull-right">
                  <ul>
                     <?php foreach ( $header_topbar_social as $social ): ?>
                         <li><a href="<?php echo esc_url($social["url"]); ?>" target="_blank"><i class="<?php echo esc_attr($social["icon_class"]); ?>"></i></a></li>
                     <?php endforeach; ?> 
                
                  </ul>
               </div> <!-- Social End -->
               <?php endif; ?>
            </div><!-- Col End -->
         </div> <!-- Row End -->
       <?php endif; ?>  
      </div> <!-- Container End -->
   </div> <!-- Top Bar End -->


   <header id="ts-header-transparent" class="header-default ts-header-transparent header-classic <?php echo autrics_option('header_nav_sticky_section','no')=="yes"?"navbar-fixed":'' ?> ">
      <div class="ts-logo-area">
         <div class="container">
            <div class="row align-items-center justify-content-between">
               <div class="col-lg-3 col-sm-12 align-self-center">
               <a class="ts-logo" href="<?php echo esc_url( home_url( '/' )); ?>" class="ts-logo">
                  <img src="<?php 
                  echo esc_url(
                     autrics_src(
                        'general_dark_logo',
                        AUTRICS_IMG . '/logo/logo2.png'
                     )
                  );
                 ?>" alt="<?php bloginfo('name'); ?>">
                  </a>
               </div> <!-- Col End -->

               <div class="col-lg-7 col-sm-12">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="<?php echo esc_attr__("Toggle navigation", 'autrics'); ?>">
                        <span class="navbar-toggler-icon"></span>
                     </button><!-- End of Navbar toggler -->
                     <div class="collapse navbar-collapse ts-navbar justify-content-lg-center" id="navbarSupportedContent">
                     <?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>
                     </div> <!-- End of navbar collapse -->

                     <?php if($show_shopping_cart == "yes" && class_exists( 'WooCommerce' )): ?>
                     <div class="header-cart">
                           <div class="cart-link">
                              <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'autrics'); ?>">
                              </a>
                           </div>
                     </div>
                     <?php endif; ?> 
                  </nav> <!-- End of Nav -->
               </div> <!-- Col End -->

               <?php if($header_contact_button_show=='yes' && is_array($header_contact_button) ): ?>
                  <div class="col-lg-2 text-right d-none d-lg-block">
                     <div class="menu-btn">
                        <a href="<?php echo esc_url($header_contact_button_url); ?>" class="btn btn-classic"><?php echo esc_html($header_contact_button_text); ?></a>
                     </div> 
                     
                  </div>
               <?php endif; ?>
            </div> <!-- Row End -->
         </div> <!-- Container End -->
      </div> <!-- Logo End -->

   </header> <!-- End of Header area-->