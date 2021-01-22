<?php
/*The template for displaying posts in the Quote post format.*/
global $more;
?>

	<div class="post-content">
		
		<a href="<?php esc_url( the_permalink() );?>" rel="bookmark">
		<?php 
			$more = 0;
			the_content('');
		?>
		</a>
		
		
	</div> <!-- end of .post-content -->