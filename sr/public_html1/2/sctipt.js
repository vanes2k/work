function preEnd(){
    $('.preloader').animate({'top':'-100%'},{
        duration: 1500,
        complete:function(){
        $('.preloader').remove();
    }})
}
$(document).ready(function () {
    preEnd();
});
if ($('.slider1').length == 1) {
    var sliderMain = tns({
        container: '.slider1',
        items: 1,
      
        center: true,
        controls: false,
        nav: false,
        autoplayButtonOutput: false,
        slideBy: 1,
        autoplayTimeout: 1500,
        mouseDrag: true,
        autoplay: true,
        autoWidth: true
    });
}
var anchors = document.querySelectorAll('a[href*="#"]')

for (let anchor of anchors) {
  anchor.addEventListener('click', function (e) {
    e.preventDefault()
    
    var blockID = anchor.getAttribute('href').substr(1)
    
    document.getElementById(blockID).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    })
  })
}