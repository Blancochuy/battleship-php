<?php
$tablero1 = array_fill(0, 10, array_fill(0, 10, 0));
$tablero2 = array_fill(0, 10, array_fill(0, 10, 0));
$jugador=rand(1,2);
$tablero1 = setNaves($tablero1);
$tablero2 = setNaves($tablero2);

/*Funcion para imprimir tableros en modo consola*/
function printTablero($tablero)
{
	echo "\n";
	for ($i = 0; $i < 10; $i++)
	{
		for ($j = 0; $j < 10; $j++)
		{
			if($tablero[$i][$j] == 0)
			{
				echo"🌊";
			}
			elseif($tablero[$i][$j] == 1)
			{
				echo "🚢";
			}
			elseif($tablero[$i][$j] == 2)
			{
				echo "💥";
			}
			else
			{
				echo"💦";
			}
			echo "";
		}
		echo "\n";
	}

}
/*Imprimir tablero del rival*/
function printTableroRival($tablero)
{
	echo "\n";
	for ($i = 0; $i < 10; $i++)
	{
		for ($j = 0; $j < 10; $j++)
		{
			if($tablero[$i][$j] == 0 or $tablero[$i][$j] == 1)
			{
				echo"🌊";
			}
			elseif($tablero[$i][$j] == 2)
			{
				echo "💥";
			}
			else
			{
				echo"💦";
			}
			echo "";
		}
		echo "\n";
	}

}
//primer turno de jugador random

/*while hasta que alguien gane el juego*/
// while (hayNave($tablero1) or hayNave($tablero2))
// {
//   if($jugador==2)
//   {
// 	echo "Jugador 2 tirando";
// 	printTableroRival($tablero1);
//   	echo "\n";
//   	$x = readline("Cordenada X: ");
//   	$y = readline("Cordenada Y: ");
//   	$x = $x-1;
//   	$y = $y-1;
//     if($x>9 or $x<0 or $y>9 or $y<0)
//     {
//       echo "El jugador 2 pierde por introducir una cordenada invalida";
//       break;
//     }
//   	if (hit($tablero1, $x, $y))
//   	{
//   		$tablero1[$x][$y] = 2;
//   		printTableroRival($tablero1);
//       if(!hayNave($tablero1))
//         echo "Gana el jugador 2, ya no hay mas naves";
//   	}
//   	else
//   	{
//   		if($tablero1[$x][$y] == 0)
//   		{
//   			$tablero1[$x][$y] = 3;
//   		}
//   		printTableroRival($tablero1);
//       $jugador=1;
//   	}
//   }
//   else
//   {
// 	echo "Jugador 1 tirando";
// 	printTableroRival($tablero2);
//     echo "\n";
//   	$x = readline("Cordenada X: ");
//   	$y = readline("Cordenada Y: ");
//   	$x = $x-1;
//   	$y = $y-1;
//     if($x>9 or $x<0 or $y>9 or $y<0)
//     {
//       echo "El jugador 1 pierde por introducir una cordenada invalida";
//       break;
//     }
//   	if (hit($tablero2, $x, $y))
//   	{
//   		$tablero2[$x][$y] = 2;
//   		printTableroRival($tablero2);
//       if(!hayNave($tablero1))
//         echo "Gana el jugador 2, ya no hay mas naves";
//   	}
//   	else
//   	{
//   		if($tablero2[$x][$y] == 0)
//   		{
//   			$tablero2[$x][$y] = 3;
//   		}
//   		printTableroRival($tablero2);
//       $jugador=2;
//   	}
//   }
// }

//funciones para elegir horizontal o vertical en el acomodo de las naves
function horizontal($tamano,$tablero)
{
	$bandera=true;
	$random_x = 0;
	$random_y = 0;
	if ($tamano == 2)
	{
		while ($bandera ==false)
		{
			$random_x = rand(0,8);
			$random_y = rand(0,9);
			$bandera=false;
			for($i=$random_x; ($i)<($random_x+$tamano); $i++)
			{
				if($tablero [$i][$random_y]==1)
				{
					$bandera=true;
					break;
				}
			}
		}
	}
	elseif ($tamano == 3)
	{
		while ($bandera != false)
		{
			$random_x = rand(0,7);
			$random_y = rand(0,9);
			$bandera=false;
			for($i=$random_x; ($i)<($random_x+$tamano); $i++)
			{
				if($tablero [$i][$random_y]==1)
				{
					$bandera=true;
					break;
				}
			}
		}
	}
	elseif ($tamano == 4)
	{
		while ($bandera != false)
		{
			$random_x = rand(0,6);
			$random_y = rand(0,9);
			$bandera=false;
			for($i=$random_x; ($i)<($random_x+$tamano); $i++)
			{
				if($tablero [$i][$random_y]==1)
				{
					$bandera=true;
					break;
				}
			}
		}
	}
	else
	{
		while ($bandera != false)
		{
			$random_x = rand(0,5);
			$random_y = rand(0,9);
			$bandera=false;
			for($i=$random_x; ($i)<($random_x+$tamano); $i++)
			{
				if($tablero [$i][$random_y]==1)
				{
					$bandera=true;
					break;
				}
			}
		}
	}

	for($i=$random_x; ($i)<($random_x+$tamano); $i++)
		$tablero [$i][$random_y]=1;

	return $tablero;
}

function vertical($tamano, $tablero)
{
	$bandera=true;
	$random_x = 0;
	$random_y = 0;
	if ($tamano == 2)
	{
		while ($bandera != false)
		{
			$random_x = rand(0,9);
			$random_y = rand(0,8);
			$bandera=false;
			for($i=$random_y; ($i)<($random_y+$tamano); $i++)
			{
				if($tablero [$random_x][$i]==1)
				{
					$bandera=true;
					break;
				}
			}
		}
	}
	elseif ($tamano == 3)
	{
		while ($bandera != false)
		{
			$random_x = rand(0,9);
			$random_y = rand(0,7);
			$bandera=false;
			for($i=$random_y; ($i)<($random_y+$tamano); $i++)
			{
				if($tablero [$random_x][$i]==1)
				{
					$bandera=true;
					break;
				}
			}
		}
	}
	elseif ($tamano == 4)
	{
		while ($bandera != false)
		{
			$random_x = rand(0,9);
			$random_y = rand(0,6);
			$bandera=false;
			for($i=$random_y; ($i)<($random_y+$tamano); $i++)
			{
				if($tablero [$random_x][$i]==1)
				{
					$bandera=true;
					break;
				}
			}
		}
	}
	else
	{
		while ($bandera != false)
		{
			$random_x = rand(0,9);
			$random_y = rand(0,5);
			$bandera=false;
			for($i=$random_y; ($i)<($random_y+$tamano); $i++)
			{
				if($tablero [$random_x][$i]==1)
				{
					$bandera=true;
					break;
				}
			}
		}
	}

	for($i=$random_y; ($i)<($random_y+$tamano); $i++)
		$tablero [$random_x][$i]=1;



	return $tablero;
}
/*Funcion para crear las cordenadas de las naves*/
function setNaves($tablero)
{
		for ($i = 0; $i < 5; $i++)
		{
			$random = rand(0,1); // 0 = vertical , 1 = horizontal
			//if para Patrullero
			if ($i == 0)
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
			//if para Destructor y Submarino
			elseif($i == 1)
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
			//if para Acorazado
			elseif($i == 2 or $i == 3)
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
			//if para Portaaviones
			else
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
		}

		return $tablero;
}

/*funcion para revisar si existe una nave en esa casilla*/
function hayNave($tablero)
{
	$check = 0;
	for ($i = 0; $i < 10; $i++)
	{
			for ($j = 0; $j < 10; $j++)
			{
					 if ($tablero[$i][$j] == 1)
					 {
							 $check = 1;
							 break;
					 }
			}
			if($check==1)
				break;
	}

	if ($check == 1)
	{
			return true;
	}
	else
	{
			return false;
	}
}
function hit($tablero, $x, $y)
{
	if ($tablero[$x][$y] == 1)
	{
		echo"Le diste";
		return true;
	}
	else
	{
		echo "suerte a la proxima";
		return false;
	}
}
?>
