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


      //contact button 
   $header_contact_button_show = 'yes';
   $header_contact_button_text = '';
   $header_contact_button_text = '';

   $show_search  = 'yes';
   $show_shopping_cart = 'yes';


   } 

?>

<?php if (defined( 'FW' )): ?>
   <div class="ts-top-bar-2 classic">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-5">
            <?php if ($header_topbar_time!=''): ?>
               <div class="top-bar-event">
                  <i class="icon icon-clock"></i><span><?php echo esc_html($header_topbar_time); ?></span>
               </div> <!-- Top Bar Text End -->
              <?php endif; ?> 
            </div>
            <div class="col-lg-4 col-md-4">
            </div> <!-- Col End -->
            <div class="col-lg-2 col-md-3 text-right">
            <?php if ( count( $header_topbar_social ) ): ?>
               <div class="top-bar-social-icon ml-auto">
                  <ul>
                      <?php foreach ( $header_topbar_social as $social ): ?>
                     <li><a href="<?php echo esc_url($social["url"]); ?>" target="_blank"><i class="<?php echo esc_attr($social["icon_class"]); ?>"></i></a></li>
                      <?php endforeach; ?> 
                
                  </ul>
               </div> <!-- Social End -->
               <?php endif; ?>
            </div><!-- Col End -->
         </div> <!-- Row End -->
         
      </div> <!-- Container End -->
   </div> <!-- Top Bar End -->
<?php endif; ?>

   <header id="ts-header-standard" class="header-default ts-header-standard <?php echo autrics_option('header_nav_sticky_section','no')=="yes"?"navbar-fixed":'' ?> ">

      <div class="ts-logo-area">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-4">
                  <a class="ts-logo" href="<?php echo esc_url( home_url( '/' )); ?>" class="ts-logo">
                  <img src="<?php 
                  echo esc_url(
                     autrics_src(
                        'general_main_logo',
                        AUTRICS_IMG . '/logo/logo.png'
                     )
                  );
                 ?>" alt="<?php bloginfo('name'); ?>">
                  </a>
               </div> <!-- Col End -->
               <div class="col-lg-8">
                  <nav class="navbar navbar-expand-lg navbar-light clearfix">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="<?php echo esc_attr__("Toggle navigation", 'autrics'); ?>">
                        <span class="navbar-toggler-icon"></span>
                     </button><!-- End of Navbar toggler -->
                     <div class="collapse navbar-collapse justify-content-end ts-navbar" id="navbarSupportedContent">
                     <?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>
                     <?php if (defined( 'FW' )): ?>
                       
                      <?php if($show_search == "yes"): ?>
                        <div class="header-cart">
                              <div class="cart-link">
                                 <form action="<?php echo esc_url( home_url( '/' )); ?>">
                                    <span class="header-search-icon"><i class="icon icon-search show"></i></span>
                                    <span class="search-close"><i class="icon icon-cross"></i></span>
                                    <div class="search-box">
                                       <input type="search" name="s" id="search" placeholder="<?php echo esc_html__("Type here and Search...",'autrics'); ?>">
                                    </div>
                                 </form>
                             
                              </div>
                        </div> <!-- End Cart -->
                        <?php endif; ?> 
                        <?php if($show_shopping_cart == "yes" && class_exists( 'WooCommerce' )): ?>
                           <div class="header-cart">
                                 <div class="cart-link">
                                    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'autrics'); ?>">
                                    <span class="icon icon-cart"></span>
                                    <sup><?php echo sprintf(_n('%d item', '%d', WC()->cart->cart_contents_count, 'autrics'), WC()->cart->cart_contents_count);?></sup>
                                    
                                    </a>
                                 </div>
                              </div>
                        <?php endif; ?>      
                     <?php endif; ?> 
                        
                     </div> <!-- End of navbar collapse -->
                                   
                  </nav> <!-- End of Nav -->
               </div> <!-- Col End -->
            </div> <!-- Row End -->
         </div> <!-- Container End -->
      </div> <!-- Logo End -->
   </header>
