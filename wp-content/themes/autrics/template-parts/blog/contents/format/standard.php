<div class="post-media post-image">
   <?php if(has_post_thumbnail()): ?>   
      <a href="<?php echo esc_url(get_the_permalink()); ?>">
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt=" <?php the_title(); ?>">
      </a>
              <?php 
                  $date_style = autrics_option('blog_date_style','classic');
                  if ( $date_style == "creative" ) :
                        autrics_post_meta_date();
                  endif;
               ?>
</div>
   <?php endif; ?>

<div class="post-body clearfix">
      <div class="entry-header">
        <?php autrics_post_meta(); ?>
  
      </div>
      <h2 class="entry-title">
         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <?php if ( is_sticky() ) {
					echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Sticky', 'autrics' ) . ' </sup>';
           }
       ?>
      <div class="post-content">
         <div class="entry-content">
           <?php autrics_excerpt( 40, null ); ?>
         </div>
        <?php
            if(!is_single()):
         
              printf('<div class="post-footer readmore-btn-area"><a class="readmore" href="%1$s">Continue <i class="icon icon-arrow-right"></i></a></div>',
              get_the_permalink()
                );
            endif; 
        ?>
      </div>
  
</div>
<!-- post-body end-->