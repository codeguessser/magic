<?php
   class Conexion
   {

    private $objetoPDO;
    private $opciones;

    function __construct()
    {
        try
        {
            $this->opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            //Objeto PDO, Controlador de BD, IP del servidor o localhost, nombre de la BD, usuario y contraseña
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=cartasx','root','1234',$this->opciones);
            $this->objetoPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "ERROR: " . $e->getMessage();
        }
    }

    function ConsultProcedure($sql)
    {
        $result = null;
        try
        {
            $comando = $this->objetoPDO->prepare($sql);
            $comando->execute();

            $result = array();
            while( $row = $comando->fetch(PDO::FETCH_ASSOC) )
            {
                $result[] = $row;
            }
        }
        catch(PDOException $e)
        {
            echo "<script>alert('Error en la consulta SQL: ".str_replace("'", "\'", $sql , $i)."')</script>";

        }
        return $result;
    }

    function ConsultFunction($sql)
    {
        try
        {
            $comando = $this->objetoPDO->prepare($sql);
            $comando->execute();
            $result = $comando->fetchAll();
        }
        catch(PDOException $e)
        {
            echo "<script>alert('Error en la funcion SQL: ".str_replace("'", "\'", $sql , $i)."')</script>";
        }

        return $result[0][0];
    }

    function ExecuteSql($sql)
    {
        try
        {
            $comando = $this->objetoPDO->prepare($sql);
            $comando->execute();
        }
        catch(Exception $e)
        {
            echo "<script>alert('Error al ejecutar sentencia SQL: ".str_replace("'", "\'", $sql , $i)."')</script>";
        }
    }
}
?>
