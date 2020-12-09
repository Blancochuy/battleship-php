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

/*Funcion para crear las cordenadas de las naves*/
function setNaves()
{
    for ($i = 0; $i < 5; $i++)
    {

    }
}
?>
