$(document).ready(function () {
  'use strict';
  /* ========================================================================
    Testimonial Carousel
   ========================================================================== */
  var testimonialCarousel = $("#testimonial-carousel");
  testimonialCarousel.owlCarousel({
    autoPlay : 3000,
    stopOnHover : true,
    slideSpeed  :  1000,
    paginationSpeed : 500,
    goToFirstSpeed : 2000,
    singleItem : true,
    responsive : true,
    addClassActive : true,
    navigation: false
  });

  var testimonialCarouselHeader = $("#testimonial-carousel-header");
  testimonialCarouselHeader.owlCarousel({
    autoPlay : 3000,
    stopOnHover : true,
    slideSpeed  :  1000,
    paginationSpeed : 500,
    goToFirstSpeed : 2000,
    singleItem : true,
    responsive : true,
    addClassActive : true,
    navigation: false
  });

  $('#test').scrollToFixed();
  $('.res-nav_click').click(function(){
    $('.main-nav').slideToggle();
      return false    
   });

  $(".back-to-top").on('click', function() {
    var target = $(this).data('rel');
    var $target = $(target);
    $('html, body').stop().animate({
        'scrollTop': $target.offset().top
    }, 900, 'swing');
  });

});

window.onscroll = function () {
    if (pageYOffset >= 200) {
        $('.back-to-top').show();
    } else {
        $('.back-to-top').hide();
    }
};

$(window).load(function(){
  
  
  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 375,
      columns = null;

  var $containerdautu = $('.dautuContainer'),
      $bodydautu = $('body'),
      colWdautu = 375,
      columnsdautu = null;

  
  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });

  $containerdautu.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colWdautu
    }
  });
  
  
  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    var currentColumnsdautu = Math.floor( ( $bodydautu.width() -30 ) / colWdautu );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }
    if ( currentColumnsdautu !== columnsdautu ) {
      // set new column count
      columnsdautu = currentColumnsdautu;
      // apply width to container manually, then trigger relayout
      $containerdautu.width( columnsdautu * colWdautu )
        .isotope('reLayout');
    }
    
  }).smartresize(); // trigger resize to set container width
  
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
      
            filter: selector,
         });
         return false;
    });

   $('.dautuFilter a').click(function(){
        $('.dautuFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $containerdautu.isotope({
      
            filter: selector,
         });
         return false;
    });

  $( "#macr-about-macr-tap" ).trigger( "click" );
  $( "#macr-dautu-tap" ).trigger( "click" );

  $('.main-nav li a').bind('click',function(event){
      var $anchor = $(this);
      
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top - 102
      }, 1500,'easeInOutExpo');
      /*
      if you don't want to use the easing effects:
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
      }, 1000);
      */
      event.preventDefault();
    });

    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    function validateContactForm() {
      var validateResult = true;
      if ($('#contactName').val().trim().length == 0){
        validateResult = false;
      }else if($('#contactPhone').val().trim().length == 0){
        validateResult = false;
      }else if($('#contactMail').val().trim().length == 0){
        validateResult = false;
      }else if(!isEmail($('#contactMail').val())){
        validateResult = false;
      }else if($('#contactMessage').val().trim().length == 0){
        validateResult = false;
      }else if($('#captcha').val().trim().length == 0){
        validateResult = false;
      }
      return validateResult;
    }

    $('.contact-input').keyup(function(){
        if(validateContactForm()){
          $('#btn-submit-contact').removeClass("not-active");
        }else{
          $('#btn-submit-contact').addClass("not-active");
        } 
    });

    function resetForm() {
      $('#contactName').val('');
      $('#contactPhone').val('');
      $('#contactMail').val('');
      $('#contactMessage').val('');
	  $('#captcha').val('');
    }

    $("#form-contact").submit(function(event){
        event.preventDefault();
        $('#btn-submit-contact').addClass("not-active");
        $('.result-contact-message').hide();

        if(validateContactForm()){
  			  var serializedData = $(this).serialize();
  			  var request = $.ajax({url: "php/ContactSender.php",
      			type: "post",
      			data: serializedData,
      			success:function(data){
      				if(data.indexOf('conctact_form_code_success') >= 0){
      				    $('.result-contact-message').text('Cảm ơn Bạn đã liên lạc với chúng tôi!');
      					  $('.result-contact-message').show();
      					  $('#btn-submit-contact').removeClass("not-active");
      					  $("#captcha_code").attr('src','php/captcha_code.php');
      					  resetForm();
      				}else{
        					$('.result-contact-message').text('Bạn đã nhập sai mã xác nhận!');
        					$('.result-contact-message').show();
        					$("#captcha_code").attr('src','php/captcha_code.php');
      				}
      			}
    		  });
        }else{
            $('.result-contact-message').text('Bạn vui lòng nhập đủ thông tin!');
            $('.result-contact-message').show();
        }
    });
    
    $('.input-btn-captcha').click(function() {
      $("#captcha_code").attr('src','php/captcha_code.php');
    });
  
});
