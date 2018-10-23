<?php
    include_once "Usuario.php";
    include_once "Conexion.php";

    class ModeloUsuario
    {
        function Usuario_Crear($userName, $pwd, $email, $coins)
        {
            $cn = new Conexion();
            $sql  = "INSERT INTO usuario (userName, passwd, email, coins) VALUES";
            $sql .= "('". $userName ."', '". $pwd ."','". $email ."', 0)";
            $cn->ExecuteSql($sql);
            //obtengo id
            $id  = $cn->ConsultFunction("SELECT idUsuario FROM usuario where userName = '".$userName."'");
            //carga las cartas iniciales del jugador (todos los jugadores tienen las mismas)
            $cn->ExecuteSql("call cartasx.cartas_iniciales(".$id.");");
        }

        function Usuario_Existe($userName)
        {
            $cn = new Conexion();
            $sql = "select user_existe('$userName')";
            $result = $cn->ConsultFunction($sql);

            return $result;
        }

        function Usuario_Registrar($userName, $pwd, $email)
        {
            $result = 0;
            if($this->Usuario_Existe($userName) == 0)
            {
                $this->Usuario_Crear($userName, $pwd, $email, 0);
                $result = 1;
            }
            return $result;
        }

        function Usuario_Login($userName, $pwd)
        {
            $cn = new Conexion();
            $result = $cn->ConsultFunction("SELECT user_login('".$userName."', '".$pwd."')");

            return $result;
        }

        function Usuario_Cargar($userName)
        {
            $cn = new Conexion();
            $datos  = $cn->ConsultProcedure("SELECT * FROM usuario where userName = '".$userName."'");

            $id       = $datos[0]["idUsuario"];
            $userName = $datos[0]["userName"];
            $passwd   = $datos[0]["passwd"];
            $email    = $datos[0]["email"];
            //$emblema  = $datos[0]["emblema"];
            $coins    = $datos[0]["coins"];

            $usuario = new Usuario($id, $userName, $passwd, $email, 0);

            return $usuario;
        }
    }
?>
