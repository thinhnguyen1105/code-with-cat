<?php
/**
 * The header template for the theme
 */
?>
<!DOCTYPE html>
 <html <?php language_attributes(); ?>> 

      <head>
         <meta charset="<?php bloginfo( 'charset' ); ?>">
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
         <?php wp_head(); ?>
      </head>

      <body <?php body_class(); ?> >
	<?php 
             
         $header_style = "three"; 
            
         if (defined( 'FW' )):
            $header_style             = autrics_option('header_layout_style', 'three');
            $page_override_header     = autrics_meta_option(get_the_ID(),'page_header_override');
            $page_header_layout_style = autrics_meta_option(get_the_ID(),'page_header_layout_style','three');
        
            if($page_override_header=='yes'):
               $header_style = $page_header_layout_style;
            endif;  

         endif;
         get_template_part( 'template-parts/headers/header', $header_style );
        
           
	?>