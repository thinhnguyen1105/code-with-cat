<?php
/*
 * Template Name: Portfolio Post Type
 * Template Post Type: post
 */
?>
 
 <?php get_header(); 

?>

<div id="content" class="container">
	<article class="entry post clearfix row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	
	<div id="left_area" class="col-xs-12 col-sm-12 col-md-12 frgn_single_portfolio">
		<div class="fr_single ">			
		
			<header class="entry-header row meta_info">				
				<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php else : ?>
				<h2 class="main_title">
					<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<?php endif; // is_single() ?>
			</header><!-- .entry-header -->
			
			<?php the_content(); ?>
			
			<div class="nav_wrap">
				<div class="navigation">
					<div class="prev_post">
						<span><?php previous_post_link('%link', 'Previous'); ?></span>
					</div> <!-- end prev_post -->
					<div class="portfolio_btn">
						<a href="<?php echo esc_url( home_url() ); ?>"><i class="fa fa-th"></i></a>
					</div>
					<div class="next_post">
						<span><?php next_post_link('%link', 'Next'); ?></span>
					</div> <!-- end next_post -->
				</div> <!--end .navigation -->
			</div> <!--end .nav_wrap -->
			
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
			
			<?php wp_link_pages(); ?>
			
			
		</div> <!-- end .fr_single -->
		<?php if ( comments_open() ){ comments_template(); } ?> 
	</div> <!-- end #left_area -->
	
	</article><!-- end of article -->	

<?php get_footer(); ?>