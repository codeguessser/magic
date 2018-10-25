<?php
    include_once "ModeloUsuario.php";
    session_start();

    $accion = $_POST['accion'];
    $userName = $_POST['user'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    if($userName == "" or $pwd == "" or $email == "")
    {
        echo "No puede dejar vacio los cuadros";
    }
    else if(strlen($userName) > 20 or strlen($pwd) > 20)
    {
        echo "El user o el password no pueden superar los 20 caracteres";
    }
    else
    {
        $ctlUsuario = new ControladorUsuario;
        switch ($accion)
        {
            case 0://login
                $ctlUsuario->Login($userName, $pwd);
                break;

            case 1://registrarse
                $ctlUsuario->Registrar($userName, $pwd, $email);
                break;
        }
    }
    class ControladorUsuario
    {
        private $modUsuario;

        function __construct()
        {
            $this->modUsuario = new ModeloUsuario();
        }

        function Login($userName, $pwd)
        {
            if($this->modUsuario->Usuario_Login($userName, $pwd))
                {
                    $usuario  = $this->modUsuario->Usuario_Cargar($userName); //obtenemos usuario para uso
                    $_SESSION['usuario'] = $usuario;
                    echo "<script>AccederJuego('".$userName."', '".$usuario->getCoins()."');</script>";//EJECUTA METODO:Objetos.js
                }
                else
                {
                    echo "Error en el user o en la password";//RETORNO A AJAX
                }
        }

        function Registrar($userName, $pwd, $email)
        {
            if($this->modUsuario->Usuario_Registrar($userName, $pwd, $email))
            {
                $usuario  = $this->modUsuario->Usuario_Cargar($userName); //obtenemos usuario para uso
                $_SESSION['usuario'] = $usuario;
                echo "<script>AccederJuego('".$userName."', '".$usuario->getCoins()."');</script>";//EJECUTA METODO:Objetos.js
            }
            else
            {
                echo "Ya existe un USER con ese nombre";//RETORNO A AJAX
            }
        }
    }
    /*
    para agregar un emblema al usuario solo hay que agregar en los metodos $emblema
    */
?>
