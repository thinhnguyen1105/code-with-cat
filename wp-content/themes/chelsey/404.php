<?php
/**
 * The template for displaying 404 pages (not found) */

get_header(); ?>

	<div id="content" class="clearfix container">
		<div class="row fr_page">
			<section class="error-404 not-found col-sm-12">
				<p class="text-404"><?php echo esc_html('404'); ?></p>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'chelsey' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'chelsey' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- .row -->
	</div><!-- .content -->

<?php get_footer(); ?>
