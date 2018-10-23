<?php
    //include_once "Carta_Ambiente.php";
    //include_once "Carta_Jugable.php";
    //include_once "Carta_Criatura.php";
    //include_once "Carta_Hechizo.php";
    //include_once "Carta_Poder.php";
    class Carta
    {
        private $idCarta;
        private $tipo;
        private $clase;
        private $nombre;
        private $descripcion;
        private $costoOro;
        private $imagen;//string ruta

        function __construct($i, $t, $c, $n, $des, $cost, $img)
        {
            $this->idCarta     = $i;
            $this->tipo        = $t;
            $this->clase       = $c;
            $this->nombre      = $n;
            $this->descripcion = $des;
            $this->costoOro    = $cost;
            $this->imagen      = $img;
        }

        function getId()         { return $this->idCarta; }

        function getTipo()       { return $this->tipo; }

        function getClase()      { return $this->clase; }

        function getNombre()     { return $this->nombre; }

        function getDescripcion(){ return $this->descripcion; }

        function getCosto()      { return $this->costo; }

        function getImagen()     { return $this->imagen; }

        //.....................................

        function setId($id)           { $this->idCarta = $id; }

        function setTipo($tipo)       { $this->tipo = $tipo; }

        function setClase($clase)     { $this->clase = $clase ; }

        function setNombre($nombre)   { $this->nombre = $nombre; }

        function setDescripcion($desc){ $this->descripcion = $desc; }

        function setCosto($cos)       { $this->costo = $cos; }

        function setImagen($img)      { $this->imagen = $img; }

    }
?>
