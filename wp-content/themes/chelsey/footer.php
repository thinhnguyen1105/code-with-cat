				<div id="footer">
					<div class="frgn_to_top_holder"><a href="#" id="fr_to_top"><i class="pe-7s-angle-up"></i></a></div>
					<div class="container clearfix">
						<div class="row">	
							<?php
								$chelsey_footer_sidebars = array('footer-area-1','footer-area-2','footer-area-3');
								if ( is_active_sidebar( $chelsey_footer_sidebars[0] ) || is_active_sidebar( $chelsey_footer_sidebars[1] ) || is_active_sidebar( $chelsey_footer_sidebars[2] ) ) {
									foreach ( $chelsey_footer_sidebars as $key => $footer_sidebar ){
										if ( is_active_sidebar( $footer_sidebar ) ) {
											echo '<div class="footer-widget col-sm-4' . (  2 == $key ? ' last' : '' ) . '">';
											dynamic_sidebar( $footer_sidebar );
											echo '</div>';
										}
									}
								}
							?>								
						</div><!-- end .container -->
						<div class="row" id="copyright">
							<div class="col-sm text-center"><?php echo esc_html(get_option('FRGN_FOOTER_TEXT')); ?></div>
						</div>
					</div><!-- end .container -->
				</div> <!-- end #footer -->
			</div> <!-- end #content -->
		</div> <!-- end #wrapper -->
	</div> <!-- end #container -->

	<?php wp_footer(); ?>
</body>
</html>