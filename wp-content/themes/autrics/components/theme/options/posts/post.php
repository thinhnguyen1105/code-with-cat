<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
	'settings-featured-video' => array(
		'title'		 => esc_html__( 'Featured video', 'autrics' ),
		'type'		 => 'box',
		'priority'	 => 'default',
		'context'	 => 'side',
		'options'	 => array(
			'featured_video'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Video URL', 'autrics' ),
				'desc'	 => esc_html__( 'Paste a video link from Youtube, Vimeo, Dailymotion, Facebook or Twitter it will be embedded in the post and the thumb used as the featured image of this post. 
				You need to choose "Video Format" as post format to use "Featured Video".', 'autrics' ),
			)
		),
	),


);
