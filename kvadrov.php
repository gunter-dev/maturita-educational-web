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
    <title>Kvadratické rovnice</title>
</head>
<body>
    <table class="tabulka-kvadrov"><tr><td>
    <h1>Kvadratické rovnice</h1>
    <?php
            if (isset($_GET["x"]) && isset($_GET["y"])) {
                $x = $_GET["x"];
                $y = $_GET["y"];
                if ($y == 1) {
                    print "Správně!<br>";
                    if ($log) {
                        $id = 1;

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
                    $x1 = $_GET["x1"];
                    $x2 = $_GET["x2"];
                    print "Špatně!<br>";
                    print "x<sub>1</sub> = $x1<br>";
                    print "x<sub>2</sub> = $x2<br>";
                    if ($log) {
                        $id = 1;

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
    a desetinnou čárku napiš tečkou. <br>
    Pokud je kořen pouze jeden, zadej ho do obou polí. <br><br>
    <span id="a"></span>x<sup>2</sup><span id="plus1"></span><span id="b"></span>x
    <span id="plus2"></span><span id="c"></span>=0<br><br>
    x<sub>1</sub>: <input type="text" name="x1" id="x1"><br>
    x<sub>2</sub>: <input type="text" name="x2" id="x2"><br><br>
    <input type="button" class="k-button" value="Vyhodnoť!" id="click">
    <?php
            }
    ?>
    <button type="button" class="k-button" onclick="window.open('kvadrov.php', '_self');">Jiný příklad</button>
    <button type="button" class="k-button" onclick="window.open('index.php', '_self');">Zpět</button>
    <?php
            if (!isset($_GET["x"]) OR !isset($_GET["y"])) {
        ?>
            <script src="kvadrov.js"></script>
        <?php
            }
        ?> 
    </td></tr></table>
</body>
</html>