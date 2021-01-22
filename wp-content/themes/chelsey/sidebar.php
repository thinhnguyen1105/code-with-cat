<?php if ( is_active_sidebar( esc_html__('sidebar', 'chelsey') ) ){ ?>
	<div id="sidebar" class="col-sm-3 col-md-3 blog-sidebar">
		<?php dynamic_sidebar( esc_html__('sidebar', 'chelsey') ); ?>
	</div> <!-- end #sidebar -->
<?php } ?>