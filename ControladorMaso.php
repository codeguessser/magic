<?php
    session_start();
    include_once "ModeloMaso.php";
    include_once "Graficos.php";

    $accion = $_POST['accion'];
    $valor  = $_POST['valor'];

    $ctlMaso = new ControladorMaso();
    switch ($accion)
    {
        case 0://carga todas las cartas de cierto tipo
          //el segundo parametro es para agregar nuevas condiciones a la consulta sql de cartas
          $ctlMaso->CargarMaso($valor, "");//en este caso quiero la consulta por default
          break;
        case 1://carga todas las cartas del jugador
          $idUser = $_SESSION['usuario']->getId();
          $ctlMaso->CargarCartasJugador($idUser);
          break;
    }

    class ControladorMaso
    {
        private $modMaso;

        function __construct()
        {
            $this->modMaso = new ModeloMaso();
        }

        function CargarMaso($valor)
        {
            $maso = $this->modMaso->CargarTipo($valor, "");
            $graficos = new Graficos();
            $graficos->dibujarMaso($maso);
        }

        function CargarCartasJugador($idUser)
        {
          $maso = $this->modMaso->CartasJugador($idUser);
        }
    }//fin clase
?>
