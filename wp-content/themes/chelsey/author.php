<?php 
/*
Archives
*/
?>

<?php 
$monni_page_setup = array();
$monni_page_setup = maybe_unserialize( get_post_meta($post->ID,'monni_page_setup',true) );

$monni_fullwidth_page = isset( $monni_page_setup['monni_fullwidth_page'] ) ? (bool) $monni_page_setup['monni_fullwidth_page'] : false;

$monni_blog_cats = isset( $monni_page_setup['monni_categories'] ) ? (array) $monni_page_setup['monni_categories'] : array();

$monni_posts_num = isset( $monni_page_setup['monni_posts_num'] ) ? (int) $monni_page_setup['monni_posts_num'] : 5;
?>

<?php get_header(); ?>

<div id="content" class="clearfix blog_page_wrap <?php if ( $monni_fullwidth_page ) echo esc_html__(' fullwidth', 'chelsey' ); ?>">
<?php if ( $monni_fullwidth_page ){
	$monni_width = esc_html__('col-sm-12 col-md-9 col-lg-9', 'chelsey' );
} else {
	$monni_width = esc_html__('col-sm-9 col-md-9', 'chelsey' );
}
$monni_class_full = array(esc_html__('entry', 'chelsey' ), esc_html__('post', 'chelsey' ), esc_html__('col-sm-12', 'chelsey' ), esc_html__('clearfix', 'chelsey' ));
$monni_classes = array(esc_html__('entry', 'chelsey' ), esc_html__('post', 'chelsey' ), esc_html__('clearfix', 'chelsey' )); 
?>

	<div id="blog_wrapper" class="container clearfix">
		<div class="row" id="blog-content">
			<div id="left_area" class="<?php echo esc_attr( $monni_width ); ?> blog-main">	
			
			<div class="archive_box">
				<?php $monni_curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
				<h2><?php echo esc_html__('Posts by author: ','chelsey'); ?>
					<span><?php echo wp_kses_post($monni_curauth->nickname); ?></span>
				</h2>
			</div>
			
			<div id="blog_page" class="responsive default">				
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<article id="post-<?php the_ID(); ?>" <?php post_class($monni_classes ); ?>>
						<?php get_template_part( 'content', get_post_format() ); ?>	
					</article><!-- end .post-->
					
				<?php endwhile; ?>
				
				
			</div> <!-- end #blog_page -->
			
			<div class="page-nav clearfix">
				 <?php monni_pagination(); ?>
			</div> <!-- end .entry -->
			<?php else : ?>
				<?php get_template_part('includes/no-results'); ?>
			<?php endif; wp_reset_postdata(); ?>
			
		</div> <!-- end #left_area -->
		<?php if ( !$monni_fullwidth_page ) get_sidebar(); ?>
	</div> <!-- end #blog_wrapper -->
	
</div> <!-- end #blog_wrapper -->
</div> <!-- end #content -->
	
<?php get_footer(); ?>