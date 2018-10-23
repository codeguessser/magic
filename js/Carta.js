function boxCartasLimpia()
{
  $('#box_cartas').empty();
  $('#box_cartas').append("<div id='box_info'></div>");
}

function seleccionCarta(idCarta)
{
  info = $("#inf_"+idCarta).html();
  arrInfo = info.split("$");
  clas = arrInfo[0];
  tipo = arrInfo[1];
  desc = arrInfo[2];
  $('#box_info').empty();

  code  ="<p class='fuente_box_info' id='info_tipo'>Tipo : "+tipo+"</p>";
  code +="<p class='fuente_box_info' id='info_desc'>"+desc+"</p>";

  $('#box_info').append(code);

  var coo = $('#carta_'+idCarta).offset();
  $('#box_info').offset({top:coo.top+20,left:coo.left+5});
  $('#box_info').css({"visibility":"visible"});
}
