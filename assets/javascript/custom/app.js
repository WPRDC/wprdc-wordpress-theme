const FADE_TIME = 600;

$('.orbit')
    .on('mouseover', function (e) {
        $(this).find('.orbit-slide.is-active')
            .find('.panel-shade').fadeIn(FADE_TIME);
        $(this).find('.orbit-slide.is-active')
            .find('.showcase-text-container').fadeIn(FADE_TIME);
    });
$('.orbit')
    .on('mouseleave', function (e) {
        $(this).find('.orbit-slide.is-active')
            .find('.panel-shade').fadeOut(FADE_TIME);
        $(this).find('.orbit-slide.is-active')
            .find('.showcase-text-container').fadeOut(FADE_TIME);
    });

$(document).ready(function(){
    $('.panel-shade').hide();
});
console.log("i started");