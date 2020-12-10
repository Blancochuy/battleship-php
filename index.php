<?php
$submarine1_j1 = [1,3,1,4];
$submarine2_j1 = [3,8,3,9];
$frigate_j1 = [5,1,7,1];
$crusier_j1 = [0,1,0,4];
$battleship_j1 = [5,2,9,2];

$submarine1_j2 = [];
$submarine2_j2 = [];
$frigate_j2 = [];
$crusier_j2 = [];
$battleship_j2 = [];

$tablero1 = array_fill(0, 10, array_fill(0, 10, 0));
$tablero2 = array_fill(0, 10, array_fill(0, 10, 0));
/*Funcion para acomodar naves en cualquier tablero*/
function acomodarNaves($tablero, $nave)
{
        /*acomodo de naves*/
    if ($nave[0] == $nave[2])
    {
      #va vertical
      for($i=$nave[1]; ($i-1)<$nave[3]; $i++)
        $tablero [$nave[0]][$i]=1;

    }
    else
    {
      #va horizontal
      for($i=$nave[0]; ($i-1)<$nave[2]; $i++)
        $tablero [$i][$nave[1]]=1;

    }
        return $tablero;
}

$tablero1 = acomodarNaves($tablero1,$battleship_j1);
//funciones para elegir horizontal o vertical en el acomodo de las naves
function horizontal($tamano,$tablero)
{
  if ($tamano == 2)
  {
    $random_x = rand(0,8);
    $random_y = rand(0,9);
  }
  elseif ($tamano == 3)
  {
    $random_x = rand(0,7);
    $random_y = rand(0,9);
  }
  elseif ($tamano == 4)
  {
    $random_x = rand(0,6);
    $random_y = rand(0,9);
  }
  else
  {
    $random_x = rand(0,5);
    $random_y = rand(0,9);
  }
}
function vertical($tamano, $tablero)
{
  if ($tamano == 2)
  {
    $random_x = rand(0,9);
    $random_y = rand(0,8);
  }
  elseif ($tamano == 3)
  {
    $random_x = rand(0,9);
    $random_y = rand(0,7);
  }
  elseif ($tamano == 4)
  {
    $random_x = rand(0,9);
    $random_y = rand(0,6);
  }
  else
  {
    $random_x = rand(0,9);
    $random_y = rand(0,5);
  }
}
/*Funcion para crear las cordenadas de las naves*/
function setNaves($tablero)
{
    for ($i = 0; $i < 5; $i++)
    {
      $random = rand(0,1); // 0 = vertical , 1 = horizontal
      //if para submarinos
      if ($i == 0 or $i == 1)
      {
        if ($random == 0)
        {
          $tablero=vertical(2,$tablero);
        }
        else
        {
          $tablero=horizontal(2,$tablero);
        }
      }
      //if para frigate
      elseif($i == 2)
      {
        if ($random == 0)
        {
          $tablero=vertical(3,$tablero);
        }
        else
        {
          $tablero=horizontal(3,$tablero);
        }
      }
      //if para crusier
      elseif($i == 3)
      {
        if ($random == 0)
        {
          $tablero=vertical(4,$tablero);
        }
        else
        {
          $tablero=horizontal(4,$tablero);
        }
      }
      //if para battleship
      else
      {
        if ($random == 0)
        {
          $tablero=vertical(5,$tablero);
        }
        else
        {
          $tablero=horizontal(5,$tablero);
        }
      }
    }

    return $tablero;
}
/*funcion para revisar si existe una nave en esa casilla*/
function hayNave()
{
  $check = 0;
  for ($i = 0; $i < 10; $i++)
  {
      for ($j = 0; $j < 10; $j++)
      {
           if ($tablero1[$i][$j] == 1)
           {
               $check = 1;
           }
      }
  }

  if ($check = 1)
  {
      return true;
  }
  else
  {
      return false;
  }
}
?>
