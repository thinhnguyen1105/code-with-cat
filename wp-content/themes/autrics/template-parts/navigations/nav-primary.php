
	<?php
	wp_nav_menu([
		'menu'            => 'primary',
		'theme_location'  => 'primary',
		'container'       => 'div',
		'container_id'    => 'primary-nav',
		'menu_id'         => 'main-menu',
		'menu_class'      => 'navbar-nav',
		'depth'           => 2,
      'walker'          => new autrics_navwalker(),
      'fallback_cb'     => 'autrics_navwalker::fallback',
   ]);
   
  
	?>
  




