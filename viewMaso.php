<?php
  session_start();
  include_once "ControladorMaso.php";
  include_once "Graficos.php";

  $accion = $_POST['accion'];
  $valor  = $_POST['valor'];

  $ctlMaso = new ControladorMaso();
  $graficos = new Graficos();

  switch ($accion)
  {
    case 0://carga todas las cartas de cierto tipo
      //el segundo parametro es para agregar nuevas condiciones a la consulta sql de cartas
      $maso = $ctlMaso->CargarMaso($valor, "");//en este caso quiero la consulta por default

      $graficos->dibujarMaso($maso);
      break;

    case 1://carga todas las cartas del jugador
      $idUser = $_SESSION['usuario']->getIdUsuario();

      $maso = $ctlMaso->CargarCartasJugador($idUser);

      $graficos->dibujarMaso($maso);
      break;
  }
?>
