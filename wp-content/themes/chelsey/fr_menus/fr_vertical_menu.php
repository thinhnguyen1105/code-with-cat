<?php get_template_part( 'fr_menus/fr_mobile_menu' ); ?>

<aside class="frgn-vertical-menu-area frgn-vertical-alignment-top">
    <div class="frgn-vertical-menu-area-inner">
        <div class="frgn-vertical-area-background"></div>
        <div class="frgn-vertical-menu-nav-holder-outer ps" style="height: 359px;">
            <div class="frgn-vertical-menu-nav-holder">
                <div class="frgn-vertical-menu-holder-nav-inner">
                    <nav class="frgn-fullscreen-menu">
					</nav>

                </div>
            </div>
      </div>        
	
	<div class="frgn-logo-wrapper">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
				<?php $dark_logo = (get_option('FRGN_SITE_LOGO_SMALL') <> '') ? esc_attr(get_option('FRGN_SITE_LOGO_SMALL')) : get_template_directory_uri() . esc_html__('/images/light_logo.png', 'chelsey' ); ?>
				<img src="<?php echo esc_url( $dark_logo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="dark_logo" />
			</a> <!-- Small logo in menu -->	
	</div>

        <div class="frgn-vertical-menu-holder">
            <div class="frgn-vertical-menu-table">
                <div class="frgn-vertical-menu-table-cell">
                    <div class="frgn-vertical-menu-opener">
                        <a href="#" class="frgn-vertical-sliding-opener frgn-vertical-sliding-opener-predefined" id="menu-sliding-opener">
                            <span class="frgn-vertical-sliding-close-icon">
								<i class="frgn-icon-ion-icon ion-ios-close-empty "></i>
							</span>
                            <span class="frgn-vertical-sliding-opener-icon">
								<div class="frgn-opener-icon">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
							</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<div id="menu" class="clearfix fr_left_menu frgn-aside-menu <?php echo esc_attr(get_option('FR_LEFT_MENU_COLOR'))?>">		
		<div class="fr_menu_inner"> 
			<nav id="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav', 'fallback_cb' => false ) ); ?>
			</nav>
		</div> <!-- end .fr_menu_inner -->		
</div> <!-- end #menu -->