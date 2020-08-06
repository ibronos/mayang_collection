/*!
    * Start Bootstrap - Creative v6.0.3 (https://startbootstrap.com/themes/creative)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-creative/blob/master/LICENSE)
    */
    (function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 72)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 75
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-scrolled");
      $("shop-nav").addClass("text-white");
    } else {
      $("#mainNav").removeClass("navbar-scrolled");
    }
  };

  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

  // Magnific popup calls
  $('#portfolio').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
  });

  $('#single-product-cart').click(function() {
    // $('#cartModal').modal('show');
    $("#mySidenav").removeClass("closeSideNav");
    $("#mySidenav").addClass("showSideNav");
  });

 $('#openNav').click(function() {
   document.getElementById("mySidenav").style.width = "250px";
  });

 $('#closeNav').click(function() {
    $("#mySidenav").removeClass("showSideNav");
    $("#mySidenav").addClass("closeSideNav");
 });


// woocommerce checkout
 $('.woocommerce-billing-fields input').addClass('form-control'); 
 $('.woocommerce-billing-fields p').addClass('d-flex justify-content-between');
 $('.create-account input[type=text]').addClass('form-control');
 $('.create-account input[type=password]').addClass('form-control');
 $('.create-account p').addClass('d-flex justify-content-between');
 $('#order_comments_field').addClass('d-flex justify-content-between');
 $('.shipping_address p').addClass('d-flex justify-content-between');
 $('.shipping_address input').addClass('form-control'); 
 $('#order_comments_field textarea').attr('cols', '20');
 $('#order_comments_field textarea').addClass('form-control'); 
 $('#ambil-outlet input').addClass('form-control'); 

 // woocommerce address
 $('.woocommerce-address-fields input').addClass('form-control'); 
 $('.woocommerce-address-fields p').addClass('d-flex justify-content-between');


// woocommerce pagination
$('.woocommerce-pagination .page-numbers').addClass('pagination');
$('.woocommerce-pagination li').addClass('page-item');
$('.woocommerce-pagination a').addClass('page-link');
$('.woocommerce-pagination span').addClass('page-link bg-primary text-white');

//yith
$('table.wishlist_table').addClass('table');

//archive filter
$("#all").on("click", function(){
    $("#min_price").val("0");
    $("#max_price").val("9999999999");
    $("#filter-submit").click();
});
$("#min_0").on("click", function(){
    $("#min_price").val("0");
    $("#max_price").val("100000");
    $("#filter-submit").click();
});
$("#min_100").on("click", function(){
    $("#min_price").val("100000");
    $("#max_price").val("149000");
    $("#filter-submit").click();
});
$("#min_150").on("click", function(){
    $("#min_price").val("150000");
    $("#max_price").val("199000");
    $("#filter-submit").click();
});
$("#min_200").on("click", function(){
    $("#min_price").val("200000");
    $("#max_price").val("249000");
    $("#filter-submit").click();

});
$("#min_250").on("click", function(){
    $("#min_price").val("250000");
    $("#max_price").val("349000");
    $("#filter-submit").click();
});
$("#min_350").on("click", function(){
    $("#min_price").val("350000");
    $("#max_price").val("499000");
    $("#filter-submit").click();
});
$("#min_450").on("click", function(){
    $("#min_price").val("450000");
    $("#max_price").val("999000");
    $("#filter-submit").click();
});
$("#min_1000").on("click", function(){
    $("#min_price").val("1000000");
    $("#max_price").val("9999999999999");
    $("#filter-submit").click();
});

})(jQuery); // End of use strict
