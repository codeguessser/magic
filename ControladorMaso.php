<?php
    include_once "ModeloMaso.php";
    include_once "Graficos.php";

    $accion = $_POST['accion'];
    $valor  = $_POST['valor'];

    $ctlMaso = new ControladorMaso();
    switch ($accion)
    {
        case 0://carga todas las cartas de cierto tipo
          $ctlMaso->CargarMaso($valor);
          break;
        case 1://carga todas las cartas del jugador
          //$ctlMaso->CargarMaso($valor);
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
            $maso = $this->modMaso->CargarTipo($valor);
            $graficos = new Graficos();
            $graficos->dibujarMaso($maso);
        }
        /*
        function CargarMaso($valor)
        {
            $maso = $this->modMaso->CargarTipo($valor);
            $graficos = new Graficos();
            $graficos->dibujarMaso($maso);
        }
        */
    }//fin clase
?>
