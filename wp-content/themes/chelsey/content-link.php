<?php
/*The template for displaying posts in the Quote post format.*/
global $more;
?>

	<div class="post-content">
		
		<?php 
			$more = 0;
			the_content('');
		?>
		
		<div class="frgn_post_mark"><i class="pe-7s-link"></i></div>		
	</div> <!-- end of .post-content -->