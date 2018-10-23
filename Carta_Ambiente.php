<?php
    include_once "Carta.php";
    class Carta_Ambiente extends Carta
    {
        private $ataque;
        private $defensa;

        function __construct($ata, $def)
        {
            $this->ataque     = $ata;
            $this->defensa    = $def;
        }

        function getAtaque(){ return $this->ataque; }

        function getDefensa(){ return $this->defensa; }

        //.......................................

        function setAtaque($ata)       { $this->ataque = $ata; }

        function setDefensa($def)      { $this->defensa = $def; }
    }
?>
