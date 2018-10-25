<?php
    include_once "Carta.php";
    class Carta_Jugable extends Carta
    {
        private $idAmbiente;
        private $costoMana;
        private $habilidad;
        private $habilidadEntorno;

        function __construct($idJ, $idA, $c, $h, $hE)
        {
            $this->idAmbiente       = $idA;
            $this->costoMana        = $c;
            $this->habilidad        = $h;
            $this->habilidadEntorno = $hE;
        }


        function getIdAmbiente(){ return $this->idAmbiente; }

        function getCostoMana() { return $this->costoMana; }

        function getHabilidad() { return $this->habilidad; }

        function getHabilidadEntorno(){ return $this->getHabilidadEntorno; }

        //.................................

        function setIdAmbiente($id){ $this->idAmbiente = $id; }

        function setCostoMana($cM) { $this->costoMana = $cM; }

        function setHabilidad($h)  { $this->habilidad = $h; }

        function setHabilidadEntorno($hE){ $this->getHabilidadEntorno = $hE; }
       

    }

?>
