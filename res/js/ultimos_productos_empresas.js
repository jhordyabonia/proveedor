$(document).ready(function(){$('#ultimosTabs a').click(function(e){e.preventDefault();$(this).tab('show');});$('#sol_ticker').totemticker({row_height:'148px',mousestop:true,interval:"2000",});$('#pub_ticker').totemticker({row_height:'148px',mousestop:true,interval:"2400",});$('#reg_ticker').totemticker({row_height:'148px',mousestop:true,interval:"2800",});});$(window).load(function(){$('.seccionTresElem').css('display','block');});