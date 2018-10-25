<?php
    class Usuario{
        private $idUsuario;
        private $userName;
        private $passwd;
        private $email;
        private $coins;
        function __construct($i, $u, $p, $e, $c)
        {
            $this->idUsuario = $i;
            $this->userName  = $u;
            $this->passwd    = $p;
            $this->email     = $e;
            $this->coins     = $c;
        }

        function getCoins()         { return $this->coins; }

        function setCoins($new_coin){ $this->coins = $new_coin; }

        function getUserName()      { return $this->userName; }

        function getIdUsuario()     { return $this->idUsuario; }
    }
?>
