
       <div data-controls="<?php echo esc_attr($slide_controls); ?>" class="ts-slider-area ts-slider-classic owl-carousel">
         <?php foreach ($autrics_slider as $key => $value): ?>
         <div class="slider-items slider-overlay" style="background: url(<?php echo is_array($value["autrics_slider_bg_image"])?$value["autrics_slider_bg_image"]["url"]:''; ?>)">
         <div class="container">
            <div class="row align-items-center">
               <div class="<?php echo esc_attr($slider_align=="center"?"col-lg-12":"col-lg-8"); ?> col-md-12">
                  <div class="slider-content mr-auto">
                     <h1 class="slider-classic-title">
                           <small class="top-title">
                           <?php echo esc_html($value["autrics_slider_title_top"]); ?>
                           </small>
                           <?php
                           $title_1 = str_replace(['{', '}'], ['<span>', '</span>'],esc_html($value["autrics_slider_title"])) ; 
                           echo autrics_kses($title_1); 
                        
                           ?>
                     </h1>
                     <p class="slider-desc">  
                        <?php echo esc_html($value["autrics_slider_description"]); ?> 
                     </p>

                     <?php if($value["autrics_button_one_text"]!=''): ?> 
                           <a href="<?php echo esc_url($value["autrics_button_one"]["url"]); ?>" class="btn btn-classic">
                              <?php echo esc_html($value["autrics_button_one_text"]); ?>
                              <?php \Elementor\Icons_Manager::render_icon( $value["autrics_button_one_icon"], [ 'aria-hidden' => 'true' ] ); ?>
                           </a>
                     <?php endif; ?>
                  </div> <!-- Slider Content End -->
               </div> <!-- Col End -->
               <div class="col-lg-4">
                  <div class="slider-image  d-none d-lg-block">
                        <img src="<?php echo is_array($value["autrics_slider_image"])?$value["autrics_slider_image"]["url"]:''; ?>" alt="<?php the_title(); ?>">
                  </div>
               </div>
            </div> <!-- Row ENd -->
         </div> <!-- Container End -->
     

      </div> <!-- 1st Slider -->  
     
         <?php endforeach; ?>
      </div>
      <!-- banner end-->