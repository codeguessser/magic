<?php
    //secuencia(Carta)
    include_once "Carta.php";
    include_once "Carta_Ambiente.php";
    include_once "Carta_Criatura.php";
    include_once "Carta_Hechizo.php";
    include_once "Carta_Poder.php";

    class Maso
    {
        private $listaCartas; //array Cartas

        function __construct()
        {
            $this->listaCartas = array();
        }


        function getCarta($index){ return $this->listaCartas[$index]; }

        function getLenght(){ return count($this->listaCartas); }

        function AddCarta($carta){ array_push($this->listaCartas, $carta); }
        
    }
?>
