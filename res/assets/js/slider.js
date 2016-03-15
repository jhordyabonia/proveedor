$('.multiple-items').slick({
  arrows: false,
  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 1,
  swipeToSlide: true,
  centerPadding: '15px',
  customPaging: '15px',
});
$('.slider_producto').slick({
  arrows: false,
  infinite: false,
  slidesToShow: 2,
  slidesToScroll: 1,
  swipeToSlide: true,
});

autoPlayYouTubeModal();

//FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
function autoPlayYouTubeModal() {
    var trigger = $("body").find('[data-toggle="modal"]');
    trigger.click(function () {
        var theModal = $(this).data("target"),
            videoSRC = $(this).attr("data-idvideo"),
            videoSRCauto = "http://www.youtube.com/embed/" + videoSRC + "?autoplay=1";
        $(theModal + ' iframe').attr('src', videoSRCauto);
        $(theModal + ' button.close').click(function () {
            $(theModal + ' iframe').attr('src', videoSRCauto);
        });
    });
}