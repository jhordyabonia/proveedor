$(document).ready(function() {
  //activar funcionalidad de tabs
  $('#ultimosTabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
  //totem ticker
  $('#sol_ticker').totemticker({
    row_height: '148px',
    mousestop: true,
    interval: "2000",
  });
  $('#pub_ticker').totemticker({
    row_height: '148px',
    mousestop: true,
    interval: "2400",
  });
  $('#reg_ticker').totemticker({
    row_height: '148px',
    mousestop: true,
    interval: "2800",
  });
});

$(window).load(function() {
  //mostrar tres-tabs solo cuando la pagina este cargada 100%
  $('.seccionTresElem').css('display', 'block');
});