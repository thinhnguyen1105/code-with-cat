<?php
get_header();
get_template_part( 'template-parts/banner/content', 'banner-shop' ); 

  ?>
<div class="woo-xs-content">
	<div class="container">
		<div class="row">

			<div id="content" class="<?php echo esc_attr($sidebar = is_active_sidebar( 'sidebar-woo' ) == true && !is_product() ? 'col-md-9' : 'col-md-12');  ?>">
				<div class="main-content-inner wooshop clearfix">
					<?php if ( have_posts() ) : ?>
						<?php woocommerce_content(); ?>
					<?php endif; ?>
				</div> <!-- close .col-sm-12 -->
			</div><!--/.row -->
			<?php
			if ( is_active_sidebar( 'sidebar-woo' )  && !is_product()) {
				get_sidebar( 'woo' );
			}
			?>
		</div><!--/.row -->
	</div><!--/.row -->
</div><!--/.row -->


<?php get_footer(); ?>