<?php
session_start();
include 'game.php';
if (!isset($_SESSION['$tablero1']))
{
  $_SESSION['$tablero1'] = $tablero1;
}
if (!isset($_SESSION['$tablero2']))
{
  $_SESSION['$tablero2'] = $tablero2;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BattleShip 🚢</title>
  </head>
  <body>
<h1>BattleShip</h1>
<p>Al hacer clikc en el botón de iniciar, comenzara el juego</p>

<form class="" action="index.php" method="post">
<input type="submit" name="iniciar" value="iniciar">
</form>
<br>



<?php
if(isset($_POST['iniciar']))
{
   printTableroHtml($tablero1);

   printTableroRivalHtml($tablero2);
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

// if (isset($_SESSION['$tablero1']))
// {
//   printTableroHtml($_SESSION['$tablero1']);
// }
 ?>
  </body>
</html>
