<?php
    include_once "Carta_Jugable.php";
    class Carta_Hechizo extends Carta_Jugable
    {
        private $duracion;

        function __construct($dur)
        {
            $this->duracion  = $dur;
        }

        function getDuracion(){ return $this->duracion; }

        //.................................

        function setDuracion($dur){ $this->duracion = $dur; }

    }

?>
