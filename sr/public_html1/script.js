$(function() {
    $('#before-load').find('i').fadeOut().end().delay(100).fadeOut('slow');
});
    




$("#card1").flip({
      axis: 'y',
      trigger: 'hover'
});    

$("#card2").flip({
      axis: 'y',
      trigger: 'hover'
});    

$("#card3").flip({
      axis: 'y',
      trigger: 'hover'
});    

$("#card4").flip({
      axis: 'y',
      trigger: 'hover'
});    

$("#card5").flip({
      axis: 'y',
      trigger: 'hover'
});    

$("#card6").flip({
      axis: 'y',
      trigger: 'hover'
});    




$(document).ready(function(){   
      $(window).scroll(function () {
          if ($(this).scrollTop() > 0) {
              $('#scroll_btn ').fadeIn();
          } else {
              $('#scroll_btn ').fadeOut();
          }
      });
      $('#scroll_btn ').click(function () {
          $('body,html').animate({
              scrollTop: 0
          }, 1100);
          return false;
      });
});

   
   

$(window).scroll(function(){
        if ($(window).scrollTop() > 80) {
            $('header').addClass('scroll');
            $('.logo').addClass('logo_resize');
        }
        else {
            $('header').removeClass('scroll');
            $('.logo').removeClass('logo_resize');
            
        }
});      

  
  



$('.hamburger').mouseover(function(event) {
    $('sidebar').animate({
        right: '0px'
    }, 200);
});
$('.first_section').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});
    
$('.second_section').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});    
    
$('.third_section').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});    
$('.fourth_section').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});
    
$('.fifth_section').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});    
$('footer').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});    
$('.flex_section').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});     
$('.flex_section2').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});     
$('.map1').mouseover(function(event){
    $('sidebar').animate({
        right: '-300px'
    }, 200);
});         



jQuery("body").on('click', '[href*="#"]', function(e){
      var fixed_offset = 100;
      jQuery('html,body').stop().animate({ scrollTop: jQuery(this.hash).offset().top - fixed_offset }, 1000);
      e.preventDefault();
    });


$(document).ready(function(){
//        $('.slider1').slick({
//            dots: true,
//            slidesToShow: 1,
//            slidesToScroll: 1,
//            autoplay: true,
//            autoplaySpeed: 2000,
//        });      

        $('.slider3').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
        });  

//        $('.container3').slick({
//                infinite: true,
//                slidesToShow: 3,
//                slidesToScroll: 3
//        }); 

});

       


$('video').addEventListener('click',function(){
  video.play();
},false);


