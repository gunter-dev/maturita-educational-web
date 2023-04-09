<?php
    include "config.php";
    session_start();

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
    <title>3D Geometrie</title>
</head>
<body>
    <table class="tabulka-3D"><tr><td>
        <h1>3D Geometrie</h1>
        <?php
            if (isset($_GET["x"]) && isset($_GET["y"])) {
                $x = $_GET["x"];
                $y = $_GET["y"];
                if ($y == 1) {
                    print "Správně!<br>";
                    if ($log) {
                        $id = 3;

                        $vysledek = $db->query("SELECT * FROM results");
                        foreach ($vysledek as $radka) {
                            if ($id == $radka["id"]) {
                                $zaznam = $radka;
                            }
                        }

                        $total = $zaznam["total"] + 1;
                        $successful = $zaznam["successful"] + 1;
                    
                        $dotaz = $db->prepare("UPDATE results SET total = ?, successful = ? WHERE id = ?");
                        $dotaz->execute([$total, $successful, $id]);

                        if (!$dotaz) {
                            die("Error in updating record to table!");
                        }
                    }
                }
                else {
                    $V = $_GET["V"];
                    $S = $_GET["S"];
                    print "Špatně!<br>";
                    print "V = $V cm<sup>3</sup><br>";
                    print "S = $S cm<sup>2</sup><br>";
                    if ($log) {
                        $id = 3;

                        $vysledek = $db->query("SELECT * FROM results");
                        foreach ($vysledek as $radka) {
                            if ($id == $radka["id"]) {
                                $zaznam = $radka;
                            }
                        }

                        $total = $zaznam["total"] + 1;

                        $dotaz = $db->prepare("UPDATE results SET total = ? WHERE id = ?");
                        $dotaz->execute([$total, $id]);

                        if (!$dotaz) {
                            die("Error in updating record to table!");
                        }
                    }
                }
            }
            else {
        ?>
        <h2>Jak zadat výsledek?</h2>
        Pokud je výsledek desetinné číslo, zadej ho zaokrouhlený na dvě desetinná místa, <br>
        a desetinnou čárku napiš tečkou. <br><br>
        Vypočítej příslušné hodnoty u <span id="zadani"></span> <br><br>
        <span id="prvni"></span><br>
        <span id="druhy"></span><br>
        <span id="treti"></span><br>
        <span id="ctvrty"></span><br><br>
        povrch: <input type="text" name="V" id="S"><br>
        objem: <input type="text" name="S" id="V"><br><br>
        <input type="button" class="gg-button" value="Vyhodnoť!" id="click">
        <?php
            }
        ?>
        <button type="button" class="gg-button" onclick="window.open('3D.php', '_self');">Jiný příklad</button>
        <button type="button" class="gg-button" onclick="window.open('index.php', '_self');">Zpět</button>       
        <?php
            if (!isset($_GET["x"]) OR !isset($_GET["y"])) {
        ?>
            <script src="3D.js"></script>
        <?php
            }
        ?> 
    </td></tr></table>
</body>
</html>