<div class="col-sm-12 post_meta ">	
	<p class="post-meta">	
		<span class="meta"><?php the_category(', ') ?></span>	
		<span class="frgn_sep"></span>
		<span class="meta date_time">
			<?php the_time( get_option( 'date_format' ) ); ?>
		</span>
		<span class="frgn_sep"></span>
		<span class="meta"><?php comments_popup_link(esc_html__('0 Comments','chelsey'), esc_html__('1 Comment','chelsey'), '% '.esc_html__('Comments','chelsey')); ?></span>
	</p>	
	
</div>