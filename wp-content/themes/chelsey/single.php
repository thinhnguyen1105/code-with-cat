<?php get_header(); ?>

<div id="content" class="clearfix container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(array('entry','post','row', 'single-post')); ?>>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	
	<div id="left_area" class="<?php if ( is_active_sidebar('sidebar')){ echo esc_attr('col-sm-9 col-md-9 blog-main'); }else{ echo esc_attr('col-sm-12 col-md-12 blog-main'); } ?>">
		<div class="fr_single">		

			<?php
				switch ( get_post_format() ) {
					case 'gallery':
						chelsey_gallery_post();
						break;
					case 'audio':
					case 'video':
						echo '<div class="featured_box">'.chelsey_get_first_embed_media(get_the_ID()).'</div>';
						 break;
					case 'image':
						if( has_post_thumbnail() ) {
							echo '<div class="featured_box">'.get_the_post_thumbnail(get_the_ID(),'chelsey-blog-thumb').'</div>';
						}
						break;
					case 'quote':
						break;
					case 'link':
						rima_single_post_link();
						break;
					default:
						if( has_post_thumbnail() ) {
							echo '<div class="featured_box">'.get_the_post_thumbnail(get_the_ID(),'chelsey-blog-thumb').'</div>';
						}
						break;
				}				
			?>			
			
			<?php get_template_part( 'includes/bottom_meta' ); ?>
			<header class="entry-header row meta_info">	
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			
			<?php the_content(); ?>
			
			<div class="col-sm-12 post_meta frgn_share_wrap">
				<div class="fr_shareandcomment fr_right">					
					<div class="frgn_share_links">
						<?php if( function_exists( 'ChelseySharebox' )){ echo ChelseySharebox( get_the_ID() ); } ?>
					</div><!-- end of .fr_share_links -->
				</div>
			</div>
			
			<?php $tag = get_the_tags();
				if ($tag) { ?>
				<p class="fr_tags">
					<?php the_tags('', ' ', ''); ?>
				</p>
			<?php } ?>
			
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
			
				
			<?php endwhile; ?>
			<?php endif; wp_reset_postdata(); ?>			
			
		</div> <!-- end .fr_single -->
		<?php comments_template(); ?> 
	</div> <!-- end #left_area -->
		
	<?php get_sidebar(); ?>
	
	</article><!-- end of article -->	

</div> <!-- end #content -->
<?php get_footer(); ?>