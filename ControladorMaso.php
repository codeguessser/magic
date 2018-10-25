<?php
    include_once "ModeloMaso.php";
    class ControladorMaso
    {
        private $modMaso;
        private $maso;

        function __construct()
        {
            $this->modMaso = new ModeloMaso();
        }

        function CargarMaso($valor)
        {
            $ms = $this->modMaso->CargarTipo($valor, "");
            $this->maso = $ms;
            return $this->maso;
        }

        function CargarCartasJugador($idUser)
        {
          echo "<script>alert('ingresa')</script>";
          $ms = $this->modMaso->CartasJugador($idUser);
          $this->maso = $ms;
          return $this->maso;
        }
    }//fin clase
?>
