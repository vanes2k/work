if ($('.slider-main').length == 1) {
    var sliderMain = tns({
        container: '.slider-main',
        items: 1,
        mode: 'gallery',
        center: true,
        gutter: 0,
        controls: false,
        nav: true,
        navPosition: 'bottom',
        autoplayButtonOutput: false,
        slideBy: 1,
        autoplayTimeout: 3000,
        mouseDrag: true,
        autoplay: true,
    });
}
if ($('.slider-main').length == 1) {
    var sliderMain = tns({
        container: '.vkwall',
        items: 3,
        center: true,
        gutter: 0,
        controls: false,
        nav: false,
        navPosition: 'bottom',
        autoplayButtonOutput: false,
        slideBy: 1,
        autoplayTimeout: 1500,
        mouseDrag: true,
        autoplay: true,
    });
}
if ($('.slider-price').length == 1) {
    var sliderMain = tns({
        container: '.slider-price',
        items: 1,
        center: true,
        gutter: 0,
        controls: false,
        nav: false,
        navPosition: 'bottom',
        autoplayButtonOutput: false,
        slideBy: 1,
        autoplayTimeout: 1500,
        mouseDrag: true,
        autoplay: true,
    });
}
lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    albumLabel: "Изображение %1 из %2"
})
$(document).ready(function () {

    // Check for click events on the navbar burger icon
    $(".navbar-burger").click(function () {

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
        $('.logo-image').toggleClass('is-mobile')

    });
});
/**
 * Обратный звонок
 */
function reCallInit() {
    if ($('#forNameRecall > .control > input').val().length > 2) {
        if ($('#forTelRecall > .control > input').val().length > 5) {
            $('#reCallForm').hide();
            $('#recallInfo').html('Обработка запроса...')
            var data = $('#reCallForm').serialize();
            var url = $('#reCallForm').attr('action');
            $.ajax({
                url: url,
                type: "POST",
                dataType: "html",
                data: data,
                success: function (res) {
                    if (JSON.parse(res).code == 0) {
                        $('#reCallForm').show();
                        $('#recallInfo').addClass('has-text-danger').text('Отметьте капчу')
                    } else {
                        $('#recallInfo').html('Ваша заявка принята на обработку!<br>Скоро наш менеджер свяжется с вами<br><br><a onclick="closeRecall()" class="button is-warning is-fullwidth ">Закрыть</a>')
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#recallInfo').addClass('has-text-danger').text('Произошла ошибка! Повторите позднее!')
                }
            });
        } else {
            $('#forTelRecall').children('.help').text('Введите телефон')
            $('#forTelRecall > .control > input').addClass('is-danger')
        }
    } else {
        $('#forNameRecall').children('.help').text('Введите имя')
        $('#forNameRecall > .control > input').addClass('is-danger')
    }
}
function openRecall() {
    $('#reCall').addClass('is-active');
}
function closeRecall() {
    $('#reCall').removeClass('is-active');
}