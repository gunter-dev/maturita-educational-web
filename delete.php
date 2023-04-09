<?php
    include "session.php";
    include "config.php";
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Vymazat</title>
</head>
<body>
    <table class="tabulka-ucet"><tr><td>
    <h1>Vymazat</h1>
    Opravdu chcete vymazat veškerá data z tabulky? <br><br>
    <form action="statistics.php" method="post">
        <input type="submit" name="delete" class="l-button" value="Vymazat">
        <input type="submit" name="cancel" class="l-button" value="Zrušit">
    </form>
    </td></tr></table>
</body>
</html>