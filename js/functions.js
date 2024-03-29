jQuery(function ($) {

  //#main-slider
  $(function () {
    $('#main-slider.carousel').carousel({
       interval: 4000
    });

    let slogans = $(".slogan");
    let index = -1;
    function nextSlogan(){
      ++index;
      slogans.eq(index % slogans.length).fadeIn(2000).delay(2000).fadeOut(2000, nextSlogan);
    }
    nextSlogan();
  });



  //Initiat WOW JS
  new WOW().init();

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  });
  $('.scrollup').click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
  });

  // portfolio filter
  $(window).on("load", function () {
    'use strict';
    var $portfolio_selectors = $('.portfolio-filter >li>a');
    var $portfolio = $('.portfolio-items');
    $portfolio.isotope({
      itemSelector: '.portfolio-item',
      layoutMode: 'fitRows'
    });

    $portfolio_selectors.on('click', function () {
      $portfolio_selectors.removeClass('active');
      $(this).addClass('active');
      var selector = $(this).attr('data-filter');
      $portfolio.isotope({ filter: selector });
      return false;
    });
  });

});
