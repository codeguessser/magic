<?php
class Graficos
{
  function dibujarMaso($maso)
  {
    //limpia box_cartas
    echo "<script>boxCartasLimpia();</script>";

    $x = 15;
    $y = 40;

    for ($i=0; $i < $maso->getLenght(); $i++)
    {
      $c = $maso->getCarta($i);

      //solucionar problema del salir de la div y se desaparece la info
      $code  ="<div id='carta_".$c->getId()."' class='carta carta_".$c->getTipo()."' onmouseover='seleccionCarta(".$c->getId().")'>";//envia la id (de la div)

      $code .="<p class='fuente_carta nombre_carta'>".$c->getTipo()." ".$c->getNombre()."</p>";
      $code .="<img class='carta_img' src='".$c->getImagen()."'>";
      $code .="<img class='carta_img_clase' src='img/icons/".$c->getClase().".png'>";

      //echo "<script>alert('".$c->getCostoMana()."')</script>";
      switch ($c->getTipo())
      {
        case 'hechizo':
          $code .= "<p class='fuente_carta info_carta'>".$c->getDuracion()." turnos";
        case 'criatura':
        case 'poder':
          $code .= "<p class='fuente_carta info_oculta' id='inf_".$c->getId()."'>".$c->getTipo()."$".$c->getClase()."$".$c->getDescripcion()."$".$c->getCostoMana()."</p>";
          $code .= "<p class='fuente_carta costo_mana'>".$c->getCostoMana()."</p>";
        break;
        case 'ambiente':
          $code .= "<p class='fuente_carta info_oculta' id='inf_".$c->getId()."'>".$c->getTipo()."$".$c->getClase()."$".$c->getDescripcion()."$0</p>";
          $code .= "<p class='fuente_carta costo_mana'>0</p>";
          break;
        }

      //caso particular en poder que tiene duracion como attb
      if ($c->getTipo() == 'criatura')
      {
          $code .= "<p class='fuente_carta info_carta'>+ ".$c->getAtaque()." / + ".$c->getDefensa()."</p>";
      }

      $code .="</div>";
      $code2  ="<script>$('#box_cartas').append('".str_replace("'", "\'", $code )."');</script>";
      echo $code2;

      $code = "<script>";
      $code .= "var carta = document.getElementById('carta_'+ ".$c->getId().");";
      $code .= "carta.style.left=".$x."+'px';";
      $code .= "carta.style.top=".$y."+'px';";
      $code .= "</script>";
      echo $code;

      $x += 140 + 40;  //distancia entre cartas

      if(($i+1)%5 == 0)
      {
          $x=15;
          $y += 260;
      }
    }//for
  }

 }//fin class
?>
