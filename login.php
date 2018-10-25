<html>
    <head>
        <title>Titulo</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="Ajax.js"></script>

        <script type="text/javascript" src="js/Form.js"></script>
        <script type="text/javascript" src="js/Carta.js"></script>

        <link rel="stylesheet" type="text/css" href="/css/estilo.php" />
    </head>
    <body background="imgd/login.jpg">
        <div id="form_game">
            <div id="Oculta">
            <input class="tfd" id="tfd" type="button" href="javascript:;" onclick="closeTest()" value="X">
                <h4 id=test1>consola de pruevas</h4>
                <h4 id="h_test">></h4>
            </div>

            <div id="banner_info">
                <img id="icon_sobres" src="img/icons/sobres.jpg">
                <img id="icon_coin" src="img/icons/coin.jpg">
                <img id="icon_user" src="img/icons/sobres.jpgz">
                <p id="p_sobre">sobres</p>
                <p id="p_coins">0</p>
                <p id="p_user">username</p>
            </div>

            <div id="box_derecha">
            </div>

            <div id="box_partida">
                <input class="btn_tipo1" id="btn_combateAleatorio" type="button" href="javascript:;" onclick="AjxConsulta('Usuario.php','#test1','',2);return false;" value="Combate Aleatorio"/>
                <input class="btn_tipo1" id="btn_nombreAleatorio" type="button" href="javascript:;" onclick="" value="Nombre Aleatorio"/>
                <input class="btn_tipo1" id="btn_buscarOponente" type="button" href="javascript:;" onclick="" value="Buscar Oponente"/>
            </div>

            <div id="box_Mazos">
                <input class="btn_tipo2" id="btn_todasCartas" type="button" href="javascript:;" onclick="AjxConsulta('viewMaso.php','#test1','',1);return false;" value="Todas mis cartas"/>
                <input class="btn_tipo2" id="btn_misCartas" type="button" href="javascript:;" onclick="" value="Mazo de Batalla"/>
            </div>

            <div id="box_imgTipos">
                <img class="icon_tipo" id="icon_tipo1" src="img/icons/t_1.jpg">
                <img class="icon_tipo" id="icon_tipo2" src="img/icons/t_2.jpg">
                <img class="icon_tipo" id="icon_tipo3" src="img/icons/t_3.jpg">
                <img class="icon_tipo" id="icon_tipo4" src="img/icons/t_4.jpg">
                <img class="icon_tipo" id="icon_tipo5" src="img/icons/bestia.jpg">
            </div>

            <div id='box_select_tip'>
                <input id="btnt_cri" class="btnt" type="button" href="javascript:;" onclick="AjxConsulta('viewMaso.php','#test1','criatura',0);return false;" value="criaturas"/>
                <input id="btnt_hec" class="btnt" type="button" href="javascript:;" onclick="AjxConsulta('viewMaso.php','#test1','hechizo',0);return false;" value="hechizos"/>
                <input id="btnt_pod" class="btnt" type="button" href="javascript:;" onclick="AjxConsulta('viewMaso.php','#test1','poder',0);return false;" value="poderes"/>
                <input id="btnt_amb" class="btnt" type="button" href="javascript:;" onclick="AjxConsulta('viewMaso.php','#test1','ambiente',0);return false;" value="ambientes"/>
            </div>
            <div id="box_cartas">
              <div id="box_info"></div>
              </div>
            </div>
        </div>

        <div id='div_login'>
            <h2 id="h_login">LOGIN</h2>

            <p id="p_nombreUser">Nombre de usuario</p>
            <input class="textbox" id="user" type="text">
            <p id="p_pwdUser">Password</p>
            <input type="password" class="textbox" id="pwd" type="text">
             <input type="checkbox" id='chk_cuenta' value="Bike">Registrarse<br>


            <p id="p_emailr">Email</p>
            <input class="textbox" id="email" type="text">

            <input id="btn_Login" type="button" href="javascript:;" onclick="AjxConsulta('viewUsuario.php','#resultado','',0);return false;" value="Iniciar Sesion"/>
            <input id="btn_Registrarse" type="button" href="javascript:;" onclick="AjxConsulta('viewUsuario.php','#resultado','',1);return false;" value="Registrarse"/>
            <p id="resultado"></p>



        </div>
        <script>
            //Este script oculta el Form_Game para mostrar solo el login
            document.getElementById('form_game').style.display ='none';
        </script>
    </body>
</html>
