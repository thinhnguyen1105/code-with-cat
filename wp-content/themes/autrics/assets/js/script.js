jQuery( document ).ready( function($){

   "use strict";

          /**-------------------------------------------------
     *Fixed HEader
     *----------------------------------------------------**/
    $(window).on('scroll', function () {

      /**Fixed header**/
      if ($(window).scrollTop() > 250) {
         $('.navbar-fixed').addClass('sticky fade_down_effect');
      } else {
         $('.navbar-fixed').removeClass('sticky fade_down_effect');
      }
});

   /* ---------------------------------------------
      Popup
   ------------------------------------------------ */
 
    if ($('.popup-btn').length > 0) {
      $('.popup-btn').magnificPopup({
         disableOn: 500,
         type: 'iframe',
         mainClass: 'mfp-fade',
         removalDelay: 160,
         preloader: false,
    
         fixedContentPos: false
      });
    }

    /* ---------------------------------------------
      Menu Toggle 
   ------------------------------------------------ */

   $('.dropdown > a').on('click', function(e) {
      e.preventDefault();
      location.href = this.href;
      return false;
   });
   let target = $('.navbar-nav');
   if (target.length > 0) {
      target.find('.menu-item-has-children').append('<span class="navbar-toggle fa fa-angle-down"></span>');
      target.find('.navbar-toggle').on('click', function () {
         $(this).siblings('.dropdown-menu').slideToggle()
      })   
   }

   


  /* ---------------------------------------------
      Site Search 
   ------------------------------------------------ */


   $(".search-close").on("click", function () {
    $(".cart-link i.icon-search").addClass("show");
    $(".cart-link form .search-box").removeClass("show");
    $(".cart-link i.icon-cross").removeClass("show");
    $(".cart-link .cross-icon").removeClass("show");
 });

 $(".header-search-icon").on("click", function () {
    $(".cart-link i.icon-search").removeClass("show");
    $(".cart-link form .search-box").addClass("show");
    $(".cart-link i.icon-cross").addClass("show");
    $(".cart-link .cross-icon").addClass("show");
 });

    /* ---------------------------------------------
      Back to top 
   ------------------------------------------------ */

   $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
         $('#back-to-top').fadeIn();
      } else {
         $('#back-to-top').fadeOut();
      }
   });

   /* ---------------------------------------------
      Back to top 
   ------------------------------------------------ */
   $('#back-to-top').on('click', function () {
      $('#back-to-top').tooltip('hide');
      $('body,html').animate({
         scrollTop: 0
      }, 800);
      return false;
   });

   $('#back-to-top').tooltip('hide');

   $('.contactMe select').select2({
      placeholder: 'Select Me',
      theme: "flat",
      placeholder: 'Select an option...',
      minimumResultsForSearch: -1

   });

    /*==========================================================
                        Preloader
      ======================================================================*/
      $(window).on('load', function () {
         
         setTimeout(() => {
            $('#preloader').addClass('loaded');
         }, 1000);
         
         });
         
      // preloader close
      $('.preloader-cancel-btn').on('click', function (e) {
         e.preventDefault();
         if (!($('#preloader').hasClass('loaded'))) {
            $('#preloader').addClass('loaded');
         }
      });
} );




