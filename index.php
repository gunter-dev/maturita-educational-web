<?php
    include "config.php";

    if (isset($_SESSION["login"])) {
      $log = true;
  }
  else {
      $log = false;
  }
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Příklady</title>
</head>
<body>
    <table class="tabulka">
      <tr>
        <td><div class="zoom1"><a href="kvadrov.php"><table class="odkaz1">K.R.</table></a></div></td>
        <td><div class="zoom2"><a href="2D.php"><table class="odkaz1">2D</table></a></div></td>
      </tr>
        <td colspan="2"><h1>Příklady</h1></td>
      <tr>
        <td><div class="zoom3"><a href="3D.php"><table class="odkaz1">3D</table></a></div></td>
        <td><div class="zoom4"><a href="statistics.php"><table class="odkaz"></table></a></div></td>
      </tr>
    </table>
</body>
</html>