<?php
session_start();
include 'game.php';
if (!isset($_COOKIE['$tablero1']))
{
  $_COOKIE['tablero1'] = $tablero1;
}
if (!isset($_COOKIE['$tablero2']))
{
  $_COOKIE['tablero2'] = $tablero2;
}
if (!isset($_SESSION['jugador']))
{
  $_SESSION['jugador'] = $jugador;
}

printTableroHtml($_COOKIE['tablero1']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BattleShip 🚢</title>
  </head>
  <?php
  if($jugador == 1)
  {
  ?>
  <form class="" action="tableros.php" method="post">
    <p>cordenada x:</p>
    <input type="number" name="x" max="10" min="1" required>
    <p>cordenada y:</p>
    <input type="number" name="y" max="10" min="1" required>
    <br>
    <input type="submit" name="disparo">
  </form>
<?php
  }

  if (isset($_POST['disparo']))
  {
    $x = $_POST['x'];
    $y = $_POST['y'];
    if ($_SESSION['jugador'] == 1)
    {
      disparar($_COOKIE['tablero2'], $x, $y, 1);
    }
    else
    {
      disparar($_COOKIE['tablero1'], $x, $y, 2);
    }
  }

?>
  <body>

    <?php
    if(isset($_POST['iniciar']))
    {
       printTableroHtml($_COOKIE['tablero1']);

       printTableroRivalHtml($_COOKIE['tablero2']);
    }
    function printTableroRivalHtml($tablero)
    {
      echo "<h2>Tablero Rival</h2>";
      echo "<table border='1.5' style='float: left; margin:5px;'>";
      for ($i = 0; $i < 10; $i++)
      {
          echo'<tr>';
          for ($j = 0; $j < 10; $j++)
          {
            if($tablero[$i][$j] == 0 or $tablero[$i][$j] == 1)
            {
              echo '<td>'.🌊.'</td>';
            }
            elseif($tablero[$i][$j] == 2)
            {
              echo '<td>'.💥.'</td>';
            }
            else
            {
              echo '<td>'.💦.'</td>';
            }

          }
         echo '</tr>';

      }
      echo"</table>";

    }
    function printTableroHtml($tablero)
    {

      echo "<h2>Mi Tablero</h2>";
      echo "<table border='1.5' style='float: left; margin:5px;'>";
            for ($i = 0; $i < 10; $i++)
            {
                echo'<tr>';
                for ($j = 0; $j < 10; $j++)
                {
                  if($tablero[$i][$j] == 0)
                  {
                    echo '<td>'.🌊.'</td>';
                  }
                  elseif($tablero[$i][$j] == 1)
                  {
                    echo '<td>'.🚢.'</td>';
                  }
                  elseif($tablero[$i][$j] == 2)
                  {
                    echo '<td>'.💥.'</td>';
                  }
                  else
                  {
                    echo '<td>'.💦.'</td>';
                  }

                }
               echo '</tr>';

            }
    echo"</table>";

    }
     ?>
  </body>
</html>
<?php
function disparar($tablero, $x, $y, $jugador)
{
    if($jugador==2)
    {
  	  echo "Jugador 2 tirando";
    	echo "\n";
      // if($x>10 or $x<1 or $y>10 or $y<1)
      // {
      //   echo "El jugador 2 pierde por introducir una cordenada invalida";
      // }

    	if (hit($tablero, $x, $y))
    	{
    		$tablero[$x][$y] = 2;
        printTableroRivalHtml($tablero);
        if(!hayNave($tablero))
          echo "Gana el jugador 2, ya no hay mas naves";
    	}
    	else
    	{
    		if($tablero[$x][$y] == 0)
    		{
    			$tablero[$x][$y] = 3;
          printTableroHtml($tablero);
    		}
        $jugador=1;
    	}
    }
  }
    // else
    // {
  	// echo "Jugador 1 tirando";
    //   echo "\n";
    //   if($x>9 or $x<0 or $y>9 or $y<0)
    //   {
    //     echo "El jugador 1 pierde por introducir una cordenada invalida";
    //     break;
    //   }
    // 	if (hit($tablero, $x, $y))
    // 	{
    // 		$tablero[$x][$y] = 2;
    //     if(!hayNave($tablero))
    //       echo "Gana el jugador 2, ya no hay mas naves";
    // 	}
    // 	else
    // 	{
    // 		if($tablero[$x][$y] == 0)
    // 		{
    // 			$tablero[$x][$y] = 3;
    // 		}
    //     $jugador=2;
    // 	}
    // }


 ?>
