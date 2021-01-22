<?php 
/*
Archives
*/
?>

<?php 
$chelsey_page_setup = array();
$chelsey_page_setup = maybe_unserialize( get_post_meta($post->ID,'chelsey_page_setup',true) );

$chelsey_fullwidth_page = isset( $chelsey_page_setup['chelsey_fullwidth_page'] ) ? (bool) $chelsey_page_setup['chelsey_fullwidth_page'] : false;

$chelsey_blog_cats = isset( $chelsey_page_setup['chelsey_categories'] ) ? (array) $chelsey_page_setup['chelsey_categories'] : array();

$chelsey_posts_num = isset( $chelsey_page_setup['chelsey_posts_num'] ) ? (int) $chelsey_page_setup['chelsey_posts_num'] : 5;
?>

<?php get_header(); ?>

<div id="content" class="clearfix blog_page_wrap <?php if ( $chelsey_fullwidth_page ) echo esc_html__(' fullwidth', 'chelsey' ); ?>">
<?php 
$chelsey_class_full = array(esc_html__('entry', 'chelsey' ), esc_html__('post', 'chelsey' ), esc_html__('col-sm-12', 'chelsey' ), esc_html__('clearfix', 'chelsey' ));
$chelsey_classes = array(esc_html__('entry', 'chelsey' ), esc_html__('post', 'chelsey' ), esc_html__('clearfix', 'chelsey' )); 
?>

	<div id="blog_wrapper" class="container clearfix">
		<div class="row" id="blog-content">
			<div id="left_area" class="col-sm-9 col-md-9 blog-main">	
			
			<div class="archive_box">
				<h2><?php echo get_the_archive_title();?> 
					<?php if(is_category()){
					echo esc_html__(':','chelsey');  ?>
					<span>
						<?php $chelsey_countcat = get_category(get_query_var('cat') , false);
							$chelsey_count = $chelsey_countcat->count;
							echo wp_kses_post($chelsey_count); esc_html_e(' Posts','chelsey'); ?>
					</span>
					<?php } ?>
				</h2>
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
	</div> <!-- end #blog_wrapper -->
	
</div> <!-- end #blog_wrapper -->
</div> <!-- end #content -->
	
<?php get_footer(); ?>