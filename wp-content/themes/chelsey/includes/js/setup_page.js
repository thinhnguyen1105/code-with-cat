jQuery(document).ready(function() {	
	var $settings_select = jQuery('select#page_template'),
		$settings_block = jQuery('#concept_blog_page_settings');
		$masonry = jQuery('#masonry_blog');
		
	$settings_select.on('change',function(){
		var this_value = jQuery(this).val();
		$settings_block.find('.inside > div').css('display','none');
		
		switch ( this_value ) {
			case 'page-standart-layout.php':
				$settings_block.find('.blog_page').css('display','block')
				break;
			case 'firs-post-grid-layout.php':
				$settings_block.find('.blog_page').css('display','block')
				break;
			case 'page-color-layout.php':
				$settings_block.find('.blog_color_page').css('display','block')
				break;
			case 'page-flat-layout.php':
				$settings_block.find('.left_menu_page').css('display','block')
				break;
			case 'page-list-layout.php':
				$settings_block.find('.blog_page').css('display','block')
				break;
			case 'page-magazine-style.php':
				$settings_block.find('.left_menu_page').css('display','block')
				break;
			case 'page-photoblog-layout.php':
				$settings_block.find('.left_menu_page').css('display','block')
				break;
			case 'page-masonry-layout.php':
				$settings_block.find('.masonry_page').css('display','block')
				break;
			case 'page-masonry-three-columns.php':
				$settings_block.find('.block_layout').css('display','block')
				break;
			case 'page-gallery.php':
				$settings_block.find('.gallery_page').css('display','block')
				break;
			case 'page-portfolio.php':
				$settings_block.find('.portfolio_gallery').css('display','block')
				break;
			case 'page-portfolio-masonry.php':
				$settings_block.find('.portfolio_gallery').css('display','block')
				break;
			/*case 'page-contact.php':
				$settings_block.find('.contact_page').css('display','block')
				break;*/
			default:
                $settings_block.find('.info').css('display','block');
		}
	});
	
	$settings_select.trigger('change');
});