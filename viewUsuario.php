<?php
  include_once "ControladorUsuario.php";
  include_once "Graficos.php";

  $accion   = $_POST['accion'];
  $userName = $_POST['user'  ];
  $pwd      = $_POST['pwd'   ];
  $email    = $_POST['email' ];

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
            //echo $ctlUsuario->Login($userName, $pwd);
            //$_SESSION['usuario'] = $ctlUsuario->getUser();
            $_SESSION['usuario'] = $ctlUsuario->Login($userName, $pwd);
            break;

        case 1://registrarse
            echo $ctlUsuario->Registrar($userName, $pwd, $email);

            $_SESSION['usuario'] = $ctlUsuario->getUser();
            break;
    }
  }
?>
