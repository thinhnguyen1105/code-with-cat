<?php 
/*
Archives
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix blog_page_wrap">
<?php $chelsey_classes = array(esc_attr('entry'), esc_attr('post'), esc_attr('clearfix')); ?>

	<div id="blog_wrapper" class="container clearfix">
		<div class="row" id="blog-content">
			<div id="left_area" class="col-sm-9 col-md-9 blog-main">	
			
				<div class="archive_box">
					<h2><?php printf( __( 'Search Results for: %s', 'chelsey' ), get_search_query() ); ?></h2>
				</div>
				
				<div id="blog_page" class="responsive default">				
					
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
		<?php get_sidebar(); ?>
		</div> <!-- end #blog-content -->
	
	</div> <!-- end #blog_wrapper -->
</div> <!-- end #content -->
	
<?php get_footer(); ?>