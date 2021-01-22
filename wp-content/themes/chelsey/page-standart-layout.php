
<?php 
/*
Template Name: Blog Layout
*/
?>


<?php 
$chelsey_page_setup = array();
$chelsey_page_setup = maybe_unserialize( get_post_meta($post->ID,'chelsey_page_setup',true) );

$chelsey_fullwidth_page = isset( $chelsey_page_setup['chelsey_fullwidth_page'] ) ? (bool) $chelsey_page_setup['chelsey_fullwidth_page'] : false;

$chelsey_blog_cats = isset( $chelsey_page_setup['chelsey_categories'] ) ? (array) $chelsey_page_setup['chelsey_categories'] : array();

$chelsey_posts_num = isset( $chelsey_page_setup['chelsey_posts_num'] ) ? (int) $chelsey_page_setup['chelsey_posts_num'] : 5;
?>

<?php get_header(); 
$chelsey_classes = array(esc_attr('entry'), esc_attr('post'), esc_attr('clearfix'));   
?>
<div id="content" class="clearfix blog_page_wrap <?php if ( $chelsey_fullwidth_page ) echo esc_attr( 'fullwidth' ); ?>">

	<div id="blog_wrapper" class="container clearfix">
		<div id="blog-content" class="row <?php echo esc_attr(rwmb_meta( 'chelsey_post_sidebar' )) ?>">
			<div id="left_area" class="col-sm-9 col-md-9 blog-main <?php if(rwmb_meta( 'chelsey_post_sidebar' ) == 'sidebar-left') echo esc_attr('order-2') ?>">	
			
		<div id="blog_page" class="responsive">
			<?php $chelsey_cat_query = ''; 
			if ( !empty($chelsey_blog_cats) ) $chelsey_cat_query = '&cat=' . implode(",", $chelsey_blog_cats); ?>
			<?php 
				$chelsey_page_paged = is_front_page() ? get_query_var( 'page' ) : get_query_var( 'paged' );
			?>
			<?php query_posts("showposts=$chelsey_posts_num&paged=" . $chelsey_page_paged . $chelsey_cat_query); ?>
			
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
		
		<?php if ( !$chelsey_fullwidth_page ) get_sidebar(); ?>
		
	</div> <!-- end #blog-content -->
</div> <!-- end #blog_wrapper -->
</div> <!-- end #content -->
<?php get_footer(); ?>