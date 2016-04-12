$('.multiple-items').slick({
  arrows: false,
  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 1,
  swipeToSlide: true,
  removeBarsOnMobile : true, // false will show top navigation bar on mobile devices
  centerPadding: '15px',
  customPaging: '15px',
});
$('.slider_producto').slick({
  arrows: false,
  infinite: false,
  slidesToShow: 2,
  slidesToScroll: 1,
  swipeToSlide: true,
  removeBarsOnMobile : true, // false will show top navigation bar on mobile devices
});

$('.swipebox').swipebox();
$('.swipebox-video').swipebox();