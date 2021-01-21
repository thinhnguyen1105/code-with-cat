
       <div data-controls="<?php echo esc_attr($slide_controls); ?>" class="ts-slider-area owl-carousel">
         <?php foreach ($autrics_slider as $key => $value): ?>
         <div class="slider-items slider-overlay" style="background: url(<?php echo is_array($value["autrics_slider_bg_image"])?$value["autrics_slider_bg_image"]["url"]:''; ?>)">
         <div class="container">
            <div class="row align-items-center">
               <div class="<?php echo esc_attr($slider_align=="center"?"col-lg-12":"col-lg-8"); ?> col-md-12">
                  <div class="slider-content ">
                     <h1>
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
                           <a href="<?php echo esc_url($value["autrics_button_one"]["url"]); ?>" class="btn btn-primary"><?php echo esc_html($value["autrics_button_one_text"]); ?></a>
                     <?php endif; ?>
                  </div> <!-- Slider Content End -->
               </div> <!-- Col End -->
            </div> <!-- Row ENd -->
         </div> <!-- Container End -->
     

      </div> <!-- 1st Slider -->  
     
         <?php endforeach; ?>
      </div>
      <!-- banner end-->