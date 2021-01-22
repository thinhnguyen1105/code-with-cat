<?php get_template_part( 'fr_menus/fr_mobile_menu' ); ?>

<div class="menu_wrap <?php if ( get_option('FRGN_ENABLE_ONE_PAGE_MENU') == esc_html__('on', 'chelsey')) echo esc_attr('frgn_onepage'); ?>">
	<div id="menu" class="clearfix container-fluid">		
		<div class="row">
		
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
				<?php $dark_logo = (get_option('FRGN_SITE_LOGO_SMALL') <> '') ? esc_attr(get_option('FRGN_SITE_LOGO_SMALL')) : get_template_directory_uri() . esc_html__('/images/logo.png', 'chelsey' ); ?>
				<img src="<?php echo esc_url( $dark_logo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="dark_logo" />
			</a> <!-- Small logo in menu -->	

				<?php if(function_exists('wp_megamenu')){ ?>
					<nav id="main-menu" class="navbar-static-top">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav>
				<?php } else { ?>
					<nav id="main-menu" class="navbar-static-top">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'chelsey', 'menu_class' => 'nav justify-content-end', 'chelsey', 'fallback_cb' => false ) ); ?>
					</nav>
				<?php } ?>
		
			<?php if ( is_active_sidebar('header-area')){ ?>
				<div id="aside_btn" >
					<svg id="menu_icon" viewBox="0 0 800 600" class="offscreen-content-toggle" stroke="#000">
						<path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" class="top_bar" />
						<path d="M300,320 L540,320" class="middle_bar" />
						<path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" class="bottom_bar" transform="translate(480, 320) scale(1, -1) translate(-480, -318)" />
					</svg>
				</div>
			<?php } ?>
		
		</div>
	</div> <!-- end #menu -->
</div> <!-- end .menu_wrap -->

<?php if ( is_active_sidebar('header-area')){ ?>
	<div class="aside">
		<div class="aside_logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php $small_logo = (get_option('FRGN_SITE_LOGO_SMALL') <> '') ? esc_attr(get_option('FRGN_SITE_LOGO_SMALL')) : get_template_directory_uri() . esc_html__('/images/light_logo.png', 'chelsey' ); ?>
				<img src="<?php echo esc_url( $small_logo ); ?>" alt="<?php esc_attr('logo','chelsey'); ?>" />
			</a> <!-- Small logo in menu -->
			<div class="aside_close">
			</div>
		</div>
		<?php if ( function_exists('chelsey_widgets') ) { ?>
			<div class="aside_inner">
				<?php dynamic_sidebar( esc_html__('header-area', 'chelsey') ); ?>
			</div>
		<?php } ?>
	</div>
<?php } ?>
<!--MENU-->