<?php get_header(); ?>

<div id="content" class="clearfix container">
	<div class="row fr_page">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	
	<div id="left_area" class="<?php if ( is_active_sidebar('sidebar')){ echo esc_attr('col-sm-9 col-md-9 blog-main'); }else{ echo esc_attr('col-sm-12 col-md-12 blog-main'); } ?>">
		<div class="fr_single">
		
			<header class="entry-header">				
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
		
			<?php if ( has_post_thumbnail()){ ?>
				<div class="featured_box">
				<?php if(is_sticky()){ ?>
						<span class="fr_post_sticky_wrap"><span class="fr_post_sticky"><?php echo esc_html_e('Featured', 'chelsey');?></span></span>
				<?php } ?>
				<?php the_post_thumbnail('full'); ?>
				</div>
			<?php } ?>
			
			<?php the_content(); ?>				
				
			<?php endwhile; ?>
			<?php endif; wp_reset_postdata(); ?>
			
			<?php wp_link_pages('before=<div class="page-links">&after=</div>&pagelink=<span>%</span>'); ?>
			
			<p><?php edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					wp_kses( 'Edit<span class="screen-reader-text"> "%s"</span>',array('p' => array(),'span' => array(),)),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			); ?></p>
			
		</div> <!-- end .fr_single -->
		<?php if ( comments_open() ){ comments_template(); } ?> 
	</div> <!-- end #left_area -->
		
	<?php get_sidebar(); ?>	
	
	</div>

</div> <!-- end #content -->
<?php 	get_footer(); ?>