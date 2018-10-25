<?php header("Content-type: text/css"); ?>
*
{
    padding:0;
    margin:0;
    outline: 0;
}
html, body {
    height:100%;
    outline: 0;
    background-color: rgb(0, 0, 0);
    /*scroll stilo*/
    scrollbar-face-color: #6685CA;
    scrollbar-highlight-color: #6685CA;
    scrollbar-shadow-color: #6685CA;
    scrollbar-3dlight-color:#FFFFFF;
    scrollbar-arrow-color:#FFFFFF;
    scrollbar-track-color:#E5E5E5;
}
/*Form Juego________________________________________*/
#form_game
{
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgb(45, 159, 187);
    /*left:25px;
    top: 20px;
    */
}
/*Div Oculta (para pruevas y almacenado de consultas) */
#Oculta
{
    background-color: black;
    border:solid;
    color:green;
    position: absolute;
    bottom: 0px;
    width: 500px;
    height: 100px;
    z-index: 1;
    left: 0px;
}
/*LOGIN_____________________________________________*/
#div_login
{
    opacity:0.9;
    border-radius: 30px;
    position: absolute;
    width: 300px;
    height: 340px;
    background-color: white;
    top:200px;
    left:600px;
}
/*
#h_login {
    position: absolute;
    left: 90px;
    top:20px;
    color:rgb(138, 138, 138);;
}
.textbox {
    font-family: Arial, Helvetica, sans-serif;
    background-color: rgb(138, 138, 138);;
    border-style:solid;
    border-radius: 25px;
    width: 240px;
    height: 30px;
    font-size: 14px;
    color:white;
}


#email {
    position: absolute;
    top:90px;
    left:20px;
}
#user {
    position: absolute;
    top:140px;
    left:20px;
}
#pwd {
    position: absolute;
    top:160px;
    left:20px;
}

#btn_Login {
    position: absolute;
    width: 300px;
    height: 60px;
    bottom: 60px;
    color:rgb(138, 138, 138);
    background-color: white;
    font-size: 20px;
    border-left-style: none;
    border-left-style:none;
    border-top-style: solid;
    border-bottom-style: none;
}
#btn_Registrarse {
    position: absolute;
    width: 300px;
    height: 60px;
    bottom: 0px;
    color:rgb(138, 138, 138);
    background-color: white;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    font-size: 20px;
    border-left-style: none;
    border-left-style:none;
    border-top-style: solid;
    border-bottom-style: none;
}
#resultado {
    position: absolute;
    bottom: 130px;
    left:20px;
}
*/

/*BANNER___________________________________________*/
#banner_info {
    position: absolute;
    background-color: rgb(18, 176, 214);
    width: 100%;
    height: 60px;
}

#icon_user {
    position: absolute;
    left:600px;
    width:50px;
    height: 30px;
}
#p_user {
    position: absolute;
    left:660px;
    top:10px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 30;
    color:gainsboro;
}
#p_coins {
    position: absolute;
    left:460px;
    top:15px;
    color: white;
}
#icon_coin {
    position: absolute;
    left:430px;
    width:25px;
    height: 25px;
    top:10px;
}
#icon_sobres {
    position: absolute;
    left:18px;
    width:50px;
    height: 50px;
    top:5px;
}
#p_sobre {
    position: absolute;
    left:80px;
    top:10px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 30;
}

/*Divs Partida_____________________________________*/
#box_partida {
    position: absolute;
    top:0px;
    right: 0px;
    background-color: white;
    width: 200px;
    height: 91px;
    border-radius: 15px;
}
.btn_tipo1 {
    width: 200px;
    height: 30px;
    bottom: 60px;
    color:black;
    background-color: rgb(59, 196, 228);
    font-size: 15px;
    border-radius: 15px;
    border-left-style: none;
    border-left-style:none;
    border-top-style: solid;
    border-bottom-style: none;
}
/*Divs Mazos_____________________________________*/
#box_Mazos {
    position: absolute;
    right: -15px;
    background-color:  rgb(45, 159, 187);
    width: 150px;
    height: 550px;
    bottom: 0px;
}
.btn_tipo2 {
    width: 140px;
    height: 30px;
    bottom: 60px;
    color:white;
    background-color: rgb(45, 159, 187);
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
    border-left-color: rgb(45, 159, 187);
    border-right-color: rgb(45, 159, 187);
    border-top-style: none;
    border-bottom-style: groove;
    border-bottom-color: white;
}
/*Estos son los botones de seleccion de tipo de Carta: criatura poder hechizo ambiente*/
.btnt
{
    position: absolute;
    width: 100px;
    height: 30px;
    font-size: 16px;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    color: rgb(109, 109, 109);
    border-top-left-radius: 10px;
    background-color: rgb(21, 220, 255);
    border-color: rgb(21, 220, 255);
}
#btnt_cri
{
  top: 160px;
  left: 20px;
}
#btnt_hec
{
  top: 160px;
  left: 120px;
}
#btnt_pod {
  top: 160px;
  left: 220px;
}
#btnt_amb
{
  top: 160px;
  left: 320px;
}

/*Divs BOX Cartas_____________________________________
Aca se guardan todas las cartas que se ven cuando seleccionas un tipo de carta
*/
#box_cartas
{
    position: absolute;
    background-color: rgb(18, 176, 214);
    width: 940px;
    height: 400px;
    bottom: 0px;
    border-radius: 20px;
    /*Overflow es el scroll automatico*/
    overflow: auto;
}



/*Carta y sus componentes internos y externos
Box info es lo que te aparece cuando te paras encima de la carta, muestra la info*/
#box_info
{
  position: absolute;
  opacity:0.6;
  background-color: rgb(254, 254, 254);
  /*border-radius: 10px;*/
  width: 150px;
  height: 180px;
  z-index: 1;
  visibility: hidden;
}

.fuente_box_info
{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 15px;
  color: rgb(0, 0, 0);
}

#info_tipo {}/* en caso de modificar */
#info_desc
{
  position:relative;
  text-align: center;
  top:20px;
}

/*Oculta los datos para mostrar cuando se selecciona*/
.info_oculta
{
  visibility: hidden;
}

.icon_tipo
{
    width:50px;
    height: 50px;
}
/*Carta: Componentes internos-----------------------*/
.carta
{
  position: absolute;
  width: 160px;
  height: 220px;
  border-radius: 10px;
  border-
  border-style: inset;
}
.carta.carta_ambiente
{
    background-color: rgb(255, 255, 255);
}
.carta.carta_poder
{
    background-color: rgb(255, 255, 255);
}
.carta.carta_criatura
{
    background-color: rgb(255, 255, 255);
}
.carta.carta_hechizo
{
    background-color: rgb(255, 255, 255);
}

.fuente_carta
{
  font-size: 10px;
  font-family: Arial, Helvetica, sans-serif;
  color: rgb(0, 0, 0);
}
.fuente_carta.nombre_carta
{
    position: absolute;
    top: 4px;
    left: 10px;
}
.fuente_carta.info_carta
{
    position: absolute;
    bottom: 5px;
    right: 15px;
}
.fuente_carta.costo_mana
{
  position: absolute;
  bottom: 5px;
  left: 15px;
}
.carta_img
{
    position: absolute;
    left: 5px;
    top:20px;
    width: 150px;
    height: 180px;
}
.carta_img_clase
{
    position: absolute;
    left: 60px;
    bottom: -5px;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    z-index: 2;
}
