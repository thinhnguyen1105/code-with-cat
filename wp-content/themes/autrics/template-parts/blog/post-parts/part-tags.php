<?php 
	
	
	$tag_list = get_the_tag_list( '', ' ' );

	
	if ( $tag_list ) {
	   echo '<div class="post-tags pull-left">';
		 	echo '<strong>' . esc_html__( 'Tags: ', 'autrics' ) . '</strong>';
			echo autrics_kses( $tag_list );
		echo '</div>';
	}