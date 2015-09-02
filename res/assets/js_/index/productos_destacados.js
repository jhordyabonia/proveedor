$(document).ready(function() {
  $('#carrusel').carousel({
    interval: 5000, 
    pause: 'hover'
  });
  $('#carrusel').bind('slide.bs.carousel', function(event) {
    var slideActual = $('#carrusel .active').index();
    switch(slideActual) {
      case 0:
        $('#pag1_li').removeClass('li_active');
        $('#pag2_li').addClass('li_active');
        $('#pag3_li').removeClass('li_active');
        $('#pag1_t').removeClass('t_active');
        $('#pag2_t').addClass('t_active');
        $('#pag3_t').removeClass('t_active');
        break
      case 1:
        $('#pag1_li').removeClass('li_active');
        $('#pag2_li').removeClass('li_active');
        $('#pag3_li').addClass('li_active');
        $('#pag1_t').removeClass('t_active');
        $('#pag2_t').removeClass('t_active');
        $('#pag3_t').addClass('t_active');
        break
      case 2:
        $('#pag1_li').addClass('li_active');
        $('#pag2_li').removeClass('li_active');
        $('#pag3_li').removeClass('li_active');
        $('#pag1_t').addClass('t_active');
        $('#pag2_t').removeClass('t_active');
        $('#pag3_t').removeClass('t_active');
        break
    }
  });
  $('#pag1_t').on('click', function(event) {
    event.preventDefault();
    $('#pag1_li').addClass('li_active')
    $('#pag1_t').addClass('t_active')
    $('#pag1_c').addClass('active');
    $('#pag2_li').removeClass('li_active');
    $('#pag2_t').removeClass('t_active');
    $('#pag2_c').removeClass('active');
    $('#pag3_li').removeClass('li_active');
    $('#pag3_t').removeClass('t_active');
    $('#pag3_c').removeClass('active');
  });
  $('#pag2_t').on('click', function(event) {
    event.preventDefault();
    $('#pag1_li').removeClass('li_active');
    $('#pag1_t').removeClass('t_active');
    $('#pag1_c').removeClass('active');
    $('#pag2_li').addClass('li_active');
    $('#pag2_t').addClass('t_active');
    $('#pag2_c').addClass('active');
    $('#pag3_li').removeClass('li_active');
    $('#pag3_t').removeClass('t_active');
    $('#pag3_c').removeClass('active');
  });
  $('#pag3_t').on('click', function(event) {
    event.preventDefault();
    $('#pag1_li').removeClass('li_active');
    $('#pag1_t').removeClass('t_active');
    $('#pag1_c').removeClass('active');
    $('#pag2_li').removeClass('li_active');
    $('#pag2_t').removeClass('t_active');
    $('#pag2_c').removeClass('active');
    $('#pag3_li').addClass('li_active');
    $('#pag3_t').addClass('t_active');
    $('#pag3_c').addClass('active');
  });
});