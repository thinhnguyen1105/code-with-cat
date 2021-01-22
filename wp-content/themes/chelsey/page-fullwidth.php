<?php 
/*
Template Name: Full Width Page
*/
?>
<?php get_header();?>
<div id="content" class="clearfix custom_page">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr('clearfix')); ?>>
					<div class="post-content clearfix">
					<?php the_content(); ?>
				</div>
			</article><!-- end of article -->
		<?php endwhile; ?>
		<?php endif; wp_reset_postdata(); ?>
		<?php edit_post_link( esc_html__( 'Edit', 'chelsey' ), '<span class="edit-link">', '</span>' ); ?>
<?php get_footer(); ?>