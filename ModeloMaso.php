<?php
    include_once "Maso.php"; //hereda attb de Carta
    include_once "Carta_Ambiente.php";
    include_once "Carta_Criatura.php";
    include_once "Carta_Hechizo.php";
    include_once "Carta_Poder.php";
    include_once "Conexion.php";

    class ModeloMaso
    {
        function CargarTipo($tipo)
        {
            $cn = new Conexion();
            switch ($tipo)
            {
                case 'ambiente':
                    $sql = "select * from cartasx.carta c, cartasx.ambiente a where c.idCarta = a.idAmbiente order by c.idCarta";
                    break;
                case 'criatura':
                case 'hechizo':
                case 'poder':
                    $sql = "select * from carta c, jugable j, ".$tipo." x where c.idCarta = j.idJugable and j.idJugable = x.id order by c.idCarta";
                    break;
                case '*':
                    //$sql = "select * from cartasx.carta c, cartasx.ambiente a where c.idCarta = a.idAmbiente order by c.idCarta";
                    break;
            }
            $rows = $cn->ConsultProcedure($sql);
            $maso = $this->CrearMaso($rows);
            return $maso;
        }

        function CargarClase($clase)
        {
            $cn = new Conexion();
            switch ($clase)
            {
                case 'luz':
                    $sql = "";
                    break;
                case 'obscuridad':
                    $sql = "";
                    break;
                case 'trueno':
                    $sql = "";
                    break;
                case 'naturaleza':
                    $sql = "";
                    break;
            }
            $rows = $cn->ConsultProcedure($sql);
            $maso = $this->CrearMaso($rows);
            return $maso;
        }

        function CrearMaso($rows)
        {
            //echo "<script>alert('begin')</script>";
            $maso = new Maso();

            for ($i=0; $i < count($rows); $i++)
            {
              switch ($rows[$i]['tipo'])
              {
                case 'ambiente':
                  $ataque  = $rows[$i]['ataque'];
                  $defensa = $rows[$i]['defensa'];
                  $carta = new Carta_Ambiente($ataque, $defensa);
                  break;
                case 'criatura':
                  $ataque  = $rows[$i]['ataque'];
                  $defensa = $rows[$i]['defensa'];
                  $carta = new Carta_Criatura($ataque, $defensa);
                  break;
                case 'hechizo':
                  $duracion = $rows[$i]['duracion'];
                  $carta = new Carta_Hechizo($duracion);
                  break;
                case 'poder':
                  $idPoder = $rows[$i]['id'];
                  $carta = new Carta_Poder($idPoder);
                  break;
              }

              if($rows[$i]['tipo'] != 'ambiente')  //ambiente no incluye clase jugable
              {
                   $carta->setIdAmbiente( $rows[$i]['idAmbiente'] );
                   $carta->setCostoMana( $rows[$i]['costoMana'] );
                   $carta->setHabilidad( $rows[$i]['habilidad'] );
                   $carta->setHabilidadEntorno( $rows[$i]['habilidadEntorno'] );
              }

              $carta->setId( $rows[$i]['idCarta'] );
              $carta->setTipo( $rows[$i]['tipo'] );
              $carta->setClase( $rows[$i]['clase'] );
              $carta->setNombre( $rows[$i]['nombre'] );
              $carta->setDescripcion( $rows[$i]['descripcion'] );
              $carta->setCosto(  $rows[$i]['costoOro'] );
              $carta->setImagen( $rows[$i]['imagen'] );

              //echo "<script>alert('".$carta->getHabilidad()."')</script>";
              $maso->AddCarta($carta);
            }
          return $maso;
        }
    }//fin clase
?>
