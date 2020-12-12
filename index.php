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

<form class="" action="tableros.php" method="post">
<input type="submit" name="iniciar" value="iniciar">
</form>
<br>
  </body>
</html>
