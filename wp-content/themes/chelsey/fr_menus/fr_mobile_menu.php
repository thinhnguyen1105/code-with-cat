<div class="mobile_menu_wrap clearfix">
	<div class="row">
		<div class="col-sm-6">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php $small_logo = (get_option('FRGN_SITE_LOGO_MOBILE') <> '') ? esc_attr(get_option('FRGN_SITE_LOGO_MOBILE')) : get_template_directory_uri() . esc_html__('/images/logo.png', 'chelsey' ); ?>
				<img src="<?php echo esc_url( $small_logo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" id="mobile_logo" />
			</a> <!-- Small logo in menu -->
		</div>
		<div class="col-sm-6">
			<div id="mobile_nav" class="closed">
				<div class="frgn-mobile-menu-opener frgn-mobile-menu-opener-predefined frgn-mobile-menu-opened">								
					<span class="frgn-mobile-menu-icon">
						<span class="frgn-mm-lines">
							<span class="frgn-mm-line frgn-mm-line-1">
							</span><span class="frgn-mm-line frgn-mm-line-2">
							</span><span class="frgn-mm-line frgn-mm-line-3"></span>
						</span>
					</span>
																	
				</div>
			
			<?php			
			if( has_nav_menu( 'primary' ) ) { 
				if(function_exists('wp_megamenu')){
				 	$wpmm_nav_location_settings = get_wpmm_option('primary');
				 	if(!empty($wpmm_nav_location_settings['is_enabled'])){
				 		wp_nav_menu( array( 'theme_location' => 'mobile_navigation', 'container' => false, 'menu_class' => 'nav justify-content-end', 'menu_id' => 'mobile_menu', 'fallback_cb' => false ) );
				 	} else { 
						wp_nav_menu(array('theme_location' => 'mobile_navigation', 'container' => false, 'menu_class' => 'nav justify-content-end', 'menu_id' => 'mobile_menu', )); 
				 	 }
				} else {
					wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav justify-content-end', 'menu_id' => 'mobile_menu', ));
				}
			} 
			?>
			</div>
		</div>
	</div>
</div>