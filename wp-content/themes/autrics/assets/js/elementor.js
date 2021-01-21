( function ($, elementor) {
	"use strict";


    var Autrics = {

        init: function () {
            
            var widgets = {
				'autrics-speaker.default': Autrics.Speaker_Image_Popup,
				'autrics-latestnews.default': Autrics.Latest_News,
				'autrics-service.default': Autrics.Service_Post,
				'autrics-quote-carousel.default': Autrics.Quote_Post,
				'autrics-slider.default': Autrics.Owl_Slider,
				'autrics-contentSlider.default': Autrics.Content_Slider,
			};
            $.each(widgets, function (widget, callback) {
                elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
            });
		},
		
		Speaker_Image_Popup: function ($scope) {
			var $container = $scope.find('.ts-image-popup');
		
			$container.magnificPopup({
				type: 'inline',
				closeOnContentClick: false,
				midClick: true,
				callbacks: {
				beforeOpen: function () {
					this.st.mainClass = this.st.el.attr('data-effect');
				}
				},
				zoom: {
				enabled: true,
				duration: 500, // don't foget to change the duration also in CSS
				},
				mainClass: 'mfp-fade',
			});																										
		
		},
		//2nd start

		Latest_News: function ($scope) {
			var $container = $scope.find('.news-carousel');
			var controls= JSON.parse($container.attr('data-controls'));
				
			var navShow = Boolean(controls.show_nav?true:false);
			var autoslide = Boolean(controls.auto_nav_slide?true:false);
     
			$container.owlCarousel({
				items: 3,
				loop: false,
				smartSpeed: 900,
				margin: 30,
				dots: false,
				nav: navShow,
				navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				autoplay: autoslide,
				mouseDrag: false,
				touchDrag: false,
				responsive: {
					0: {
						items: 1,
						
					},
					600: {
						items: 2,
					},
					1000: {
						items: 3,
						mouseDrag: true,
						touchDrag: true,
					},
				}
			 });																									
		
		},

		Service_Post: function ($scope) {
			var $container = $scope.find('.service-carousel');
		
			$container.owlCarousel({
				items: 3,
				loop: false,
				smartSpeed: 900,
				margin: 30,
				dots: false,
				nav: $container.data("nav"),
				navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				autoplay: false,
				mouseDrag: false,
				touchDrag: false,
				responsive: {
				   0: {
					  items: 1,
				   },
				   600: {
					  items: 2,
				   },
				   1000: {
					  items: 3,
					  mouseDrag: true,
					  touchDrag: true,
				   },
				}
			 });																									
		
		},

		//
		Quote_Post: function ($scope) {
			var $container = $scope.find('.testimonial-carousel');
		
			$container.owlCarousel({
				items: 1,
				loop: true,
				smartSpeed: 900,
				dots: true,
				nav: $container.data("nav"),
				autoplay: false,
				mouseDrag: true,
				touchDrag: false,
				responsive: {
					1000: {
					   mouseDrag: true,
					   touchDrag: true,
					},
				 }
			 });


			 var $container_standard = $scope.find('.testimonial-standard');
			 var $quote_slider_count = $scope.find('.testimonial-standard').data('count');
			 $container_standard.owlCarousel({
				items: $quote_slider_count,
				loop: true,
				smartSpeed: 900,
				dots: false,
				margin: 30,
				nav: $container_standard.data("nav"),
				autoplay: false,
				mouseDrag: false,
				touchDrag: false,
				navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				responsive: {
				   0: {
					  	items: 1,
					  	
				   },
				   600: {
					  items: 2,
				   },
				   1000: {
					  items: $quote_slider_count,
					  mouseDrag: true,
					  touchDrag: true,
				   }
				}
			 });
			 
          //
          
			 $(".testimonial-classic").owlCarousel({
				items: 1,
				loop: true,
				smartSpeed: 900,
				dots: true,
				nav: false,
				autoplay: false,
				mouseDrag: false,
				touchDrag: false,
				responsive: {
					1000: {
					   mouseDrag: true,
					   touchDrag: true,
					}
				 }
          });
          
          //
          var $container_slide = $scope.find('.testimonial-slide');
         $container_slide.owlCarousel({
            items: 1,
            loop: true,
            smartSpeed: 900,
            dots: false,
            nav: $container_slide.data("nav"),
            autoplay: false,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			mouseDrag: false,
			touchDrag: false,
			responsive: {
				1000: {
					mouseDrag: true,
					touchDrag: true,
				}
			}
         });
         
		   
		},
		Owl_Slider: function($scope) {
			var $container = $scope.find('.ts-slider-area');
			var controls= JSON.parse($container.attr('data-controls'));
              
         	var navShow = Boolean(controls.show_nav?true:false);
		 	var autoslide = Boolean(controls.auto_nav_slide?true:false);
			var ts_slider_speed = parseInt(controls.ts_slider_speed);
            
			$container.owlCarousel({
				items: 1,
				loop: true,
				smartSpeed: ts_slider_speed,
				dots: false,
				nav: navShow,
				navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				autoplay: autoslide,
				mouseDrag: true,
				responsive: {
					0: {
						nav: false,
						mouseDrag: false,
						touchDrag: false,
					},
					600: {
						nav: false,
						mouseDrag: false,
					},
					1000: {
						nav: navShow,
						mouseDrag: true,
					}
				}
			});	

      },

      

      Content_Slider: function($scope) {
			var $container = $scope.find('.intro-content-carousel');
			$container.owlCarousel({
				items: 1,
				loop: true,
				smartSpeed: 900,
				dots: false,
				nav: true,
				navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				autoplay: false,
				mouseDrag: false,
				touchDrag: false,
				responsive: {
					1000: {
					   mouseDrag: true,
					   touchDrag: true,
					}
				}
			}); 
		},
    };
    $(window).on('elementor/frontend/init', Autrics.init);
}(jQuery, window.elementorFrontend) ); 