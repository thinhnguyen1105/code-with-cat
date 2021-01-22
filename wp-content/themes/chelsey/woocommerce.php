<?php get_header(); ?>
<div id="content" class="clearfix custom_page">
	<div class="content_inner container">
		<div class="row">
			<div id="woocommerce_content" class="<?php if ( is_active_sidebar('woocommers_widgets')){ echo esc_attr('col-sm-12 col-md-12 col-lg-9 blog-main'); }else{ echo esc_attr('col-sm-12 col-md-12 blog-main'); } ?>">
				<?php woocommerce_content(); ?>
			</div>
			<?php if ( is_active_sidebar('woocommers_widgets')){ ?>
				<div id="sidebar" class="col-sm-3">
					<?php dynamic_sidebar('woocommers_widgets'); ?>
				</div>
			<?php } ?>
		</div>
	</div>		
</div> <!-- end #content -->
<?php get_footer(); ?>