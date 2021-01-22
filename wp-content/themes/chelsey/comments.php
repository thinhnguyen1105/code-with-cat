<?php
/* The template for displaying Comments */
if ( post_password_required() )
	return;
?>

<div id="comment-wrap" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php comments_number(esc_html__('0 Comments','chelsey'), esc_html__('1 Comment','chelsey'), '% '.esc_html__('Comments','chelsey') );?>
		</h3>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => wp_kses( 'ul',array('h4' => array(),)),
					'short_ping'  => true,
					'avatar_size' => 74,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php esc_html__( 'Comment navigation', 'chelsey' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'chelsey' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'chelsey' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html__( 'Comments are closed.' , 'chelsey' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
	
	<?php
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
	
		$fields = array(
			'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="' . esc_attr__('Name', 'chelsey') . ' *" /></p>',
			'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="' . esc_attr__('Email', 'chelsey') . ' *"/></p>',
			'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_attr__('Website', 'chelsey') . '" /></p>',
		);
	
		$form_args = array(
		  'title_reply'       => esc_html__( 'Post a Reply', 'chelsey' ),
		  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'chelsey' ),
		  'label_submit'      => esc_html__( 'Submit Comment', 'chelsey' ),
		  'fields' => $fields,
		  'comment_field' => '<div id="respond-textarea"><textarea id="comment" name="comment" aria-required="true" cols="58" rows="6" tabindex="4" placeholder="' . esc_attr__('Your Comment', 'chelsey') . ' *"></textarea></div>',
		)		
	?>
	
	<?php comment_form($form_args); ?>

</div><!-- #comments -->