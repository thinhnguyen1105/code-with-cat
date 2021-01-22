(function($){		
		"use strict";
		
		 $('.parallax').each(function() {
			var $parallaxSection = $(this);
			var parallaxFunc = function(){
				if ($(window).width() >= 768) {
					var offset = $parallaxSection.offset().top;
					var scrollTop = $(window).scrollTop();
					var yPos = -(offset - scrollTop)/2;
					var coords = 'center '+ yPos + 'px';
					$parallaxSection.css( { backgroundPosition: coords});
				} else {
					$parallaxSection.css( {
						backgroundPosition: 'center',
					});
				}
			};
			parallaxFunc(); 
			$(window).on('scroll', function (){
				parallaxFunc();
			});
		});
		
		
		if( $('.item_svg').length > 0){
			$('.item_svg').appear(function() {
				var $svg = $('.item_svg svg').drawsvg({
					stagger: 500,
					duration: 5000,
				});
				$svg.drawsvg('animate');
			});
		}
		
		$(window).on('scroll', function() {
			var scroll_position = $(document).scrollTop();
			if(scroll_position > 500) {
				$(".home #menu_container").addClass("small_header");
				if($('#header-outer').length > 0){
					$('#header-outer').addClass("dark_header_colorFont");
				}
			} else {
				$(".home #menu_container").removeClass("small_header");
				if($('#header-outer').length > 0){
					$('#header-outer').removeClass("dark_header_colorFont");
				}
			}
		});
		
		var isMobile = {
			Android: function() {
				return navigator.userAgent.match(/Android/i);
			},
			BlackBerry: function() {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			iOS: function() {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			Opera: function() {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			Windows: function() {
				return navigator.userAgent.match(/IEMobile/i);
			},
			any: function() {
				return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
			}
		};		
		
		

		var menu_flip_speed = 200,
		recent_work_opacity_speed = 400,
		featured_controllers_opacity_speed = 500,
		featured_bar_animation_speed = 500,
		featured_bar_animation_easing = 'easeOutExpo',
		$mobile_nav_button = $('#mobile_nav'),
		$main_menu = $('.menu_wrap ul.nav').add('#mobile_menu').add('.fr_left_menu ul.nav').add('.menu_wrap ul.menu'),
		$featured = $('#fr_showcase_slider'),
		$featured_controllers_container = $('#featured-controllers'),
		$featured_control_item = $featured_controllers_container.find('li'),
		container_width = $('#container').innerWidth(),
		$footer_widget = $('.footer-widget'),
		$cloned_nav,
		slider_settings,
		sd_slider_autospeed,
		slider,
		$recent_work_thumb = $('#recent-work .thumb'),
		$gallery_slider = $('.post_gallery_slider');		
		
		$main_menu.superfish({ 
			delay:       300,                            // one second delay on mouseout 
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
			speed:       'fast',                          // faster animation speed 
			autoArrows:  true,                           // disable generation of arrow mark-up 
			dropShadows: false                            // disable drop shadows 
		});
		
		
	
		//MOBILE MENU
		
		$cloned_nav = $mobile_nav_button.find('#mobile_menu');
		
		$mobile_nav_button.on('click', function(){
			if ( $(this).hasClass('closed') ){
				$(this).removeClass( 'closed' ).addClass( 'opened' );
				$('#mobile_menu').slideDown( 500 );
			} else {				
				$(this).removeClass( 'opened' ).addClass( 'closed' );
				$('#mobile_menu').slideUp( 500 );
			}
			return false;	
		} );
	
   
	   $('#mobile_menu').find('.menu-item-has-children').each( function(){						
			$(this).append( '<span class="mobile_toogle"></span>' );							
		});
		
		$(".mobile_toogle").on('click', function(event){
			if($(this).hasClass('mobile_toogle_open')){
				$(this).removeClass('mobile_toogle_open')
			}else{
				$(this).addClass('mobile_toogle_open');
			}
			
			if(false == $(this).siblings().is(':visible')) {
				$('.sub-menu').slideUp(280);			
			}
			$(this).prev().slideToggle(280); 		
			event.stopPropagation();		
		});
	
	
		$mobile_nav_button.find('a').on('click', function(event){
			event.stopPropagation();
		} );
		
		//MOBILE MENU
	
		$.fn.clickToggle = function(func1, func2) {
        var funcs = [func1, func2];
        this.data('toggleclicked', 0);
        this.on('click', function() {
            var data = $(this).data();
            var tc = data.toggleclicked;
            $.proxy(funcs[tc], this)();
            data.toggleclicked = (tc + 1) % 2;
            return false;
        });
        return this;
		};
	
		if( $('#menu-switch').length > 0){
			$( "#menu-switch" ).clickToggle(function() {
				$('#menu').animate({right: 0}, 'normal');
			}, function() {
				$('#menu.fr_left_menu').animate({right: '-100%'}, 'slow');
			});
			
			const menu = document.getElementById("menu_icon");
			menu.addEventListener("click", morph);

			function morph() {
			  menu.classList.toggle("open");
			}
		}
		
		if( $('.offscreen-content-toggle').length > 0){
			$('.offscreen-content-toggle').clickToggle(function() {	
				 $('.aside').animate({right:0}, 'slow');
			}, function() {
				 $('.aside').animate({right:-400}, 'slow');
			});
			$('.aside_close').on('click',function(){
				$('.aside').animate({right:-400}, 'slow');
				function morph() {
				}
			});
		}
		
		if( $('#menu-sliding-opener').length > 0){
			$( "#menu-sliding-opener" ).clickToggle(function() {
				$('#menu').animate({left: 90}, 'normal');
			}, function() {
				$('#menu.fr_left_menu').animate({left: '-100%'}, 'normal');
			});
			
			const menuOne = document.querySelector(".frgn-opener-icon");
			function addClassFunOne() {
			  this.classList.toggle("clickMenuOne");
			}
			menuOne.addEventListener("click", addClassFunOne);
		}
		
		// ONE-PAGE MENU SETTINGS
		if( $('.frgn_onepage').length > 0){
		   $("#main-menu").find("a").on('click',function(){
				var elem = $(this).attr("href");
				$('html, body').animate({ scrollTop: $(elem).offset().top - 110 }, 1000);
		   });
		}
		// ONE-PAGE MENU SETTINGS
		
		
		// COUNTER
		$.fn.countTo = function(options) {
			// merge the default plugin settings with the custom options
			options = $.extend({}, $.fn.countTo.defaults, options || {});

			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(options.speed / options.refreshInterval),
				increment = (options.to - options.from) / loops;

			return $(this).delay(1000).each(function() {
				var _this = this,
					loopCount = 0,
					value = options.from,
					interval = setInterval(updateTimer, options.refreshInterval);

				function updateTimer() {
					value += increment;
					loopCount++;
					$(_this).html(value.toFixed(options.decimals));

					if (typeof(options.onUpdate) == 'function') {
						options.onUpdate.call(_this, value);
					}

					if (loopCount >= loops) {
						clearInterval(interval);
						value = options.to;

						if (typeof(options.onComplete) == 'function') {
							options.onComplete.call(_this, value);
						}
					}
				}
			});
		};

		$.fn.countTo.defaults = {
			from: 0,  // the number the element should start at
			to: 100,  // the number the element should end at
			speed: 1000,  // how long it should take to count between the target numbers
			refreshInterval: 100,  // how often the element should be updated
			decimals: 0,  // the number of decimal places to show
			onUpdate: null,  // callback method for every time the element is updated,
			onComplete: null,  // callback method for when the element finishes updating
		};	
	
		if( $('.fucts_counter').length > 0){
				var dataperc;
				$('.fucts_counter').appear(function() {
					$('.fucts_counter').each(function(){
						dataperc = $(this).attr('data-perc'),
						$(this).find('.fucts_count').delay(6000).countTo({
						from: 0,
						to: dataperc,
						speed: 2000,
						refreshInterval: 100
					});
				 });
			});
		}
		// COUNTER
		
		//POP-UP VIDEO
		if( $('.frgn_video_popup_btn_bg').length > 0){
			$('.frgn_video_popup_btn_bg').magnificPopup({
			  type: $(this).attr('data')
			});
		}
		//POP-UP VIDEO
		
	if( $('.frgn_text_stroke').length > 0){
		$('.frgn_text_stroke').each(function() {
			if($(window).width() <= 1024){
				$(this).css({
					'font-size' : $(this).attr('data-tablet'),
					'top' : $(this).attr('data-top-tablet'),
					'left' : $(this).attr('data-left-tablet'),
				});
			}
			if($(window).width() <= 768){
				$(this).css({
					'font-size' : $(this).attr('data-tablet-portrait'),
					'top' : $(this).attr('data-top-portrait'),
					'left' : $(this).attr('data-left-portrait'),
				});
			}
			if($(window).width() <= 637){
				$(this).css({
					'font-size' : $(this).attr('data-mobile-landscape'),
					'top' : $(this).attr('data-top-mobile-landscape'),
					'left' : $(this).attr('data-left-mobile-landscape'),
				});
			}
			if($(window).width() <= 375){
				$(this).css({
					'font-size' : $(this).attr('data-mobile'),
					'top' : $(this).attr('data-top-mobile'),
					'left' : $(this).attr('data-left-mobile'),
				});
			}
		});
	}
			
		if( $('.portfolio_metro').length > 0){
			$('.portfolio_metro .featured_box').each(function(i){
				$(this).css('backgroundImage', 'url('+$(this).find('img').attr('src')+')');
				//$(this).css('height', '200px');
				$(this).find('img').remove();
			});
		}
		
		if( $('.frgn-portfolio-carousel').length > 0){
			$('.frgn-portfolio-carousel .owl-inner').each(function(i){
				$(this).css('backgroundImage', 'url('+$(this).find('img').attr('src')+')');
				$(this).find('img').remove();
			});
			$('.frgn-portfolio-carousel .owl-inner').each(function(i){
				$(this).find('.frgn-title-decorative-letter').text($(this).find('h2 a').text().substr(0,1));
			});
		}
		
		if( $('.frgn-portfolio-hover').length > 0){
			$('.frgn-portfolio-hover .entry-header').each(function(i){
				$(this).find('.frgn-title-decorative-letter').text($(this).find('h2').text().substr(0,1));
			});
		}
		
		if( $('.frgn-interactive-links').length > 0){
			$('.frgn-interactive-links article:first-child').addClass('frgn_active_link');
			$('.frgn-interactive-links article').hover(
				function() {
					//$(this).siblings().animate({opacity: 0.4}, 300);
					if($('.frgn-interactive-links article:first-child').hasClass('frgn_active_link')){
						$('.frgn-interactive-links article:first-child').removeClass('frgn_active_link');
					}
					$(this).find('.featured_box').fadeIn('300');
					$(this).addClass('frgn_active_link');
				},function() {
					//$(this).siblings().animate({opacity: 1}, 300);
					$(this).find('.featured_box').fadeOut('300');
					$(this).removeClass('frgn_active_link');
				}
			);			
		}
		
		if( $(window).width() > 1024){
			if( $('.fr_frgn_parallax_block').add('.frgn_parallax').add('.floating').length > 0){
				(function() {
				skrollr.init({
				forceHeight: false,
				smoothScrolling: false
			  });
			}).call(this);
			}
		}		
		
		if( $('.post_gallery_slider').length > 0){
			$('.post_gallery_slider:visible').find('li>a').attr('data-lightbox','lightbox');
		}
	
	
	$(window).scroll(function() {
		var scroll_position = $(document).scrollTop();
		if($(window).width() < 600 ){
			if(scroll_position > 46 ) {
				$(".mobile_menu_wrap").addClass("mobile_header_top");
				$("#mobile_menu").addClass("mobile_menu_top");
			} else {
				$(".mobile_menu_wrap").removeClass("mobile_header_top");
				$("#mobile_menu").removeClass("mobile_menu_top");
			}
		}
	});	
	
	$('#fr_to_top').on('click', function(){
       $('html, body').animate({scrollTop:0}, 'slow');
   });
   
   
   
   if( $('.team_member').add('.team_member_img').length > 0){
		$('.team_info').find('a').each(function(){
			if($(this).attr('href') == ''){
				 $(this).remove();
			}else{
				$(this).show();
			}
		});
	}
	
	var $container = $('.portfolio_metro');
	 $('.portfolio_metro').packery({
		itemSelector: '.entry',
		columnWidth: $(this).find('article').width(),
		percentPosition: true
	});
	
	
	if($(window).width() > 600){

			if( $('.portfolio_pinterest').length > 0){
					jQuery(window).load(function(){
						$('.portfolio_pinterest').isotope({
						 masonry: {
							columnWidth: $(this).find('article').width(),
							gutter: 5,
							horizontalOrder: true,
							percentPosition: true,
						 },
						 itemSelector:'.entry',
						 percentPosition: true,
						});
						
							$('.portfolio_pinterest .portfolio_metro_item').each(function(i){
							$(this).find('.frgn-title-decorative-letter').text($(this).find('h2 a').text().substr(0,1));
						});	
					});//load				
				}							
			
			$(function() {
				if($(".sticky-sidebar").length > 0){
				var $sidebar   = $(".sticky-sidebar"), 
					$window    = $(window),
					$footer    = $(".nav_wrap"), // use your footer ID here
					offset     = $sidebar.offset(),
					foffset    = $footer.offset(),
					threshold = foffset.top,
					topPadding = 15;

				$window.scroll(function() {
					if ($window.scrollTop() > threshold) {
						$sidebar.stop().animate({
							marginTop: threshold
						});
					} else if ($window.scrollTop() > offset.top) {
						$sidebar.stop().animate({
							marginTop: $window.scrollTop() - offset.top
						});
					} else {
						$sidebar.stop().animate({
							marginTop: 0
						});
					}
				});
				}
			});
		}
	
	// init Isotope
	if( $('.masonry_layout').length > 0){
		jQuery(window).on('load',function(){
			var $grid = $('.masonry_layout').isotope({
				layoutMode: 'masonry',
				masonry: {
					columnWidth: $(this).find('.entry').width(),
					gutter: 40,
				},
				itemSelector: '.entry', 
				percentPosition: true,	
				fitWidth: true			
			});		
			
			// init Infinite Scroll
			if($('.loadmore').length > 0){
			
				// get Isotope instance
				var iso = $grid.data('isotope');
			
				$grid.infiniteScroll({
					path: '#pagination a',
					append: '.masonry_layout .entry',
					loadOnScroll: false,
					button: '.loadmore',
					scrollThreshold: false,
					status: '.page-load-status',
					history: false,
					outlayer: iso,  
				});
				
				var $viewMoreButton = $('.loadmore');		
				$viewMoreButton.on( 'click', function() {		 
				  $grid.infiniteScroll('loadNextPage');			  
				  $grid.infiniteScroll( 'option', {
					loadOnScroll: true,
				  });
				})
			}			
		});
	}            
})(jQuery);