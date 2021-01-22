<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
		
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<div id="wrapper">
		
		<?php if ( get_option('FRGN_ENABLE_SPINNER') == esc_html__('on', 'chelsey' ) ){ ?> 
		<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
				  <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
				</svg>
		</div>
		<?php } ?>
		
		<!--MENU-->
		<?php
			$chelsey_menus_style = get_option('chelsey_menus_style');
			if ( $chelsey_menus_style == esc_html__('Side Menu', 'chelsey') ){
				get_template_part( 'fr_menus/fr_side_menu' );
			} else if ( $chelsey_menus_style == esc_html__('Vertical Menu', 'chelsey') ){
				get_template_part( 'fr_menus/fr_vertical_menu' );
			} else {
				get_template_part( 'fr_menus/fr_classic_menu' );
			}			
		?>
		<!--MENU-->
		
	