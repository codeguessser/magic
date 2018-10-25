<?php
    include_once "Carta_Jugable.php";
    class Carta_Poder extends Carta_Jugable
    {
        private $idPoder;

        function __construct($id)
        {
            $this->idPoder = $id;
        }

    }

?>
