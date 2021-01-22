<?php
/*The template for displaying posts in the Standart post format.*/
?>
	<div class="post-content clearfix">	

		<?php if(is_sticky()){ ?>
			<span class="fr_post_sticky_wrap"><span class="fr_post_sticky"><i class="pe-7s-star"></i></span></span>
		<?php } ?>
			
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="featured_box">
			<?php the_post_thumbnail('chelsey-blog-thumb'); ?>
		</div> 	<!-- end .featured_box -->
		<?php } ?>		
		
		<div class="inner_content">	
			<?php get_template_part( 'includes/bottom_meta' ); ?>
			<header class="entry-header row meta_info">				
				<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php else : ?>
				<h2 class="main_title">
					<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<?php endif; // is_single() ?>
			</header><!-- .entry-header -->			
			
			<div class="entry_content">
				<p><?php echo chelsey_excerpt(57); ?></p>				
			</div> <!-- end .entry_content -->					
			
			<div class="frgn_btn_holder left"><a href="<?php esc_url( the_permalink() ); ?>"><span><?php esc_html_e('Read more', 'chelsey'); ?></span></a></div>	
			
		</div> <!-- end of .inner_content -->	
	
	</div> <!-- end of .post-content -->
	

