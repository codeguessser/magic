function AccederJuego(user, coins){
    document.getElementById('form_game').style.display ='';
    $("#p_coins").html(coins);
    $("#p_user").html(user);
    $("#div_login").empty();//elimina el contenido
    $("#div_login").hide();//oculta la div contenedora
}
