function realizaProceso(valorCaja1, valorCaja2){
    var parametros = {
            "valorCaja1" : valorCaja1,
            "valorCaja2" : valorCaja2
    };
    $.ajax({
            data:  parametros,
            url:   'php/Login.php',
            type:  'post',
            beforeSend: function () {
                    $("#resultado").html("espere por favor...");
            },
            success:  function (response) {
                    $("#resultado").html(response);
            }
    });
}






function LoginVerif()
{
    document.write("<?php echo '<p>hola</p>';?>");
}
function LoginOcultar()
{
    alert("hola");
}