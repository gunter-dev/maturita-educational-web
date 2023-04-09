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
    <title>2D Geometrie</title>
</head>
<body>
    <table class="tabulka-2D"><tr><td>
        <h1>2D Geometrie</h1>
        <?php
            if (isset($_GET["a"]) && isset($_GET["b"])) {
                $a = $_GET["a"];
                $b = $_GET["b"];
                if ($b == 1) {
                    print "Správně!<br>";
                    if ($log) {
                        $id = 2;

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
                    $o = $_GET["o"];
                    $S = $_GET["S"];
                    print "Špatně!<br>";
                    print "o = $o cm<br>";
                    print "S = $S cm<sup>2</sup><br>";
                    if ($log) {
                        $id = 2;

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
        obvod: <input type="text" name="o" id="o"><br>
        obsah: <input type="text" name="S" id="S"><br><br>
        <input type="button" class="g-button" value="Vyhodnoť!" id="click">
        <?php
            }
        ?>
        <button type="button" class="g-button" onclick="window.open('2D.php', '_self');">Jiný příklad</button>
        <button type="button" class="g-button" onclick="window.open('index.php', '_self');">Zpět</button>
        <?php
            if (!isset($_GET["x"]) OR !isset($_GET["y"])) {
        ?>
            <script src="2D.js"></script>
        <?php
            }
        ?>  
    </td></tr></table>
</body>
</html>