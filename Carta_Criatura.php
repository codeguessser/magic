<?php
    include_once "Carta_Jugable.php";
    class Carta_Criatura extends Carta_Jugable
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

        //.............................................

        function setAtaque($ata)       { $this->ataque = $ata; }

        function setDefensa($def)      { $this->defensa = $def; }

    }

?>
