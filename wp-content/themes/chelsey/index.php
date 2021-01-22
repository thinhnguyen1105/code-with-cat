<?php get_header(); 
$chelsey_classes = array(esc_attr('entry'), esc_attr('post'), esc_attr('clearfix'));  
?>
<div id="content" class="clearfix blog_page_wrap">

	<div id="blog_wrapper" class="container clearfix">
		<div id="blog-content" class="row">
			<div id="left_area" class="<?php if ( is_active_sidebar('sidebar')){ echo esc_attr('col-sm-12 col-md-12 col-lg-9 blog-main'); }else{ echo esc_attr('col-sm-12 col-md-12 blog-main'); } ?>">	
			
				<div id="blog_page" class="responsive">
					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class($chelsey_classes ); ?>>				
						<?php get_template_part( 'content', get_post_format() ); ?>						
					</article><!-- end .post-->
									
					<?php endwhile; ?>			
					
				</div> <!-- end #blog_page -->
				<div class="page-nav clearfix">			
					<?php chelsey_pagination(); ?>
				</div> <!-- end .entry -->
					<?php else : ?>
						<?php get_template_part('includes/no-results'); ?>
					<?php endif; wp_reset_postdata(); ?>
					
				</div> <!-- end #left_area -->
			
				<?php if ( is_active_sidebar('sidebar')) get_sidebar(); ?>
		
		</div> <!-- end #blog-content -->
	</div> <!-- end #blog_wrapper -->

<?php 	get_footer(); ?>