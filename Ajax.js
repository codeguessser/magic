function AjxConsulta(urlphp,objeto,valor,accion)
{ //objeto html(incluyendo si es id o clase), sql, 2 (case 2 de Conexion.php)
    //alert(valor);
    var parametros;

    if(urlphp == 'ControladorUsuario.php')
    {
      parametros =
      { //<--Array de datos
          "user"  : $("#user").val(),
          "pwd" : $("#pwd").val(),
          "email" : $("#email").val(),
          "accion": accion
      };
    }
    else
    {
      parametros =
          { //<--Array de datos
              "objeto" : objeto,
              "valor"  : valor,
              "accion" : accion
          };
    }
    $.ajax(
      {
        data:  parametros,
        url:   urlphp, //<--clase que realiza la consulta
        type:  'post',

        beforeSend: function ()
        {
        },
        success: function (response)
        { //Acciones despues de ejecutar
            $(objeto).html(response);
        }
    });
}
//

function closeTest()
{
    document.getElementById('Oculta').style.display ='none';
}
