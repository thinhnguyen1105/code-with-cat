<?php
/**
 * the template for displaying all pages.
 */

   get_header(); 
   get_template_part( 'template-parts/banner/content', 'banner-page' );
 
   $blog_sidebar = autrics_option('blog_sidebar',3); 
   $column = ($blog_sidebar == 1 ) || !is_active_sidebar('sidebar-1') ? 'col-md-8 mx-auto' : 'col-lg-8 col-md-12';
?>
<div id="main-content" class="main-container"  role="main">
    <div class="container">
        <div class="row">
        <?php if($blog_sidebar == 2){
				get_sidebar();
			  }  ?>
            <div class="<?php echo esc_attr($column);?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php get_template_part( 'template-parts/blog/contents/content', 'page' ); ?>
						</div> <!-- .entry-content -->
						<footer class="entry-footer">
							<?php
					   		if ( is_user_logged_in() ) {
                     ?> 
								<p>
                           <?php 
                                 edit_post_link( 
                                    esc_html__( 'Edit', 'autrics' ), 
                                    '<span class="meta-edit">', 
                                    '</span>'
                                 );
                              ?>
								</p>
						 <?php
                   	}
							?>
						</footer> <!-- .entry-footer -->
					</article>

					<?php comments_template(); ?>
				<?php endwhile; ?>
            </div> <!-- .col-md-8 -->

            <?php if($blog_sidebar == 3){
			    	get_sidebar();
			  }  ?>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!--#main-content -->
<?php get_footer(); ?>