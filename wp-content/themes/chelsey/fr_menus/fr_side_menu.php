<!--MENU-->
<?php get_template_part( 'fr_menus/fr_mobile_menu' ); ?>
<div id="header-outer">
	<div class="fr_left">
		<a href="<?php echo esc_url( home_url() ); ?>">
			<?php $small_logo = (get_option('FR_SITE_LOGO_SMALL') <> '') ? esc_attr(get_option('FR_SITE_LOGO_SMALL')) : get_template_directory_uri() . '/images/logo2.png'; ?>
			<img src="<?php echo esc_attr($small_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" id="logo" data-lightlogo="<?php echo esc_attr(get_template_directory_uri() . '/images/light_logo.png');?>" data-darklogo="<?php echo esc_attr($small_logo); ?>" />
		</a> <!-- Small logo in menu -->
	</div>
	<div class="fr_right">
		<div id="menu-switch">
			<svg id="menu_icon" viewBox="0 0 800 600">
				<path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" class="top_bar" />
				<path d="M300,320 L540,320" class="middle_bar" />
				<path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" class="bottom_bar" transform="translate(480, 320) scale(1, -1) translate(-480, -318)" />
			</svg>
		</div>
	</div>
</div>
<div id="menu" class="clearfix fr_left_menu <?php echo esc_attr(get_option('FR_LEFT_MENU_COLOR'))?>">		
		<div class="fr_menu_inner"> 
			<nav id="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav', 'fallback_cb' => false ) ); ?>
			</nav>
		</div> <!-- end .fr_menu_inner -->		
</div> <!-- end #menu -->
<!--MENU-->