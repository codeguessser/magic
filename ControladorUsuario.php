<?php
    include_once "ModeloUsuario.php";
    class ControladorUsuario
    {
        private $modUsuario;
        private $usuario;
        private $response;
        private $response2;

        function __construct()
        {
            $this->modUsuario = new ModeloUsuario();
            //$response = array();
        }
        //Enviamos el usuario
        function getUsuario(){ return $this->usuario; }

        function Login($userName, $pwd)
        {
            if($this->modUsuario->Usuario_Login($userName, $pwd))
            {
                    //asignamos usuario a el attb usuario
                    $user = $this->modUsuario->Usuario_Cargar($userName); //obtenemos usuario para uso
                    $this->usuario  = $user;

                    //Campo 0 son parametros de ECHO, campo 2 es Objeto
                    $this->sendMessage("<script>AccederJuego('".$userName."', '".$user->getCoins()."');</script>");
                    //$this->response  = "<script>AccederJuego('".$userName."', '".$user->getCoins()."');</script>";
                    //$this->response2 = $this->usuario;
              }
              else
              {
                    $this->sendMessage("Error en el user o en la password");
                    //$this->usuario = null;
                    //$this->response = "Error en el user o en la password";
              }
                //return $this->response; //manda respuestas a mostrar

                return $user;
        }

        function Registrar($userName, $pwd, $email)
        {
            if($this->modUsuario->Usuario_Registrar($userName, $pwd, $email))
            {
                $user  = $this->modUsuario->Usuario_Cargar($userName); //obtenemos usuario para uso
                $this->usuario  = $user;
                $this->response = "<script>AccederJuego('".$userName."', '".$usuario->getCoins()."');</script>";
            }
            else
            {
                $this->response = "Ya existe un USER con ese nombre";
            }
            return $this->response; //manda respuestas a mostrar
        }

        //Esto manda mensaje de salida
        function sendMessage($msg)
        {
          echo $msg;
        }

      }
?>
