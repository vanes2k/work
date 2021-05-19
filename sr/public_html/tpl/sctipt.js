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
        autoplayTimeout: 3000,
        mouseDrag: true,
        autoplay: true,
       
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

function initRecall(){
    var data = $('#reCallForm').serialize();
    var url = $('#reCallForm').attr('action');
    $('#reCallForm').hide();
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: data,
        success: function (res) {
            if (JSON.parse(res).code == 0) {
               /// $('#reCallForm').show();
                $('#recallInfo').addClass('has-text-danger').text('Отметьте капчу')
            } else {
                $('#recallInfo').html('Ваша заявка принята на обработку!<br>Скоро наш менеджер свяжется с вами')
            }
        },
        error: function (response) {
            console.log(response);
            $('#reCallForm').show();
            $('#recallInfo').addClass('has-text-danger').text('Произошла ошибка! Повторите позднее!')
        }
    });
}
$(document).ready(function() {

    // Check for click events on the navbar burger icon
    $(".navbar-burger").click(function() {
  
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
  
    });
  });