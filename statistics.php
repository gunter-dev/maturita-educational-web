<?php
    include "config.php";
    session_start();

    if (isset($_SESSION["login"])) {
        $log = true;
    }
    else {
        $log = false;
    }

    if (isset($_POST["login"])) {
        $user = trim($_POST["user"]);
        $pass = $_POST["pass"];

        $vysledek = $db->query("SELECT * FROM login WHERE user='admin'");
        $zaznam = $vysledek->fetch();
        if (password_verify($pass, $zaznam["pass"])) {
            $_SESSION["login"] = true;
            $log = true;
        }
        else {
            $log = false;
        }
    }

    if (isset($_POST["cancel_login"])) {
        $log = false;
    }

    if ($log AND isset($_POST['account'])) {
        $user = trim($_POST['user']);
        $oldpass = $_POST['oldpass'];
        $pass_1 = $_POST['pass_1'];
        $pass_2 = $_POST['pass_2'];
        $hash = password_hash($pass_1, PASSWORD_DEFAULT);
       
        if ($user != "" AND $oldpass != "" AND $pass_1 != "" AND $pass_2 != "") {
            $vysledek = $db->query("SELECT * FROM login WHERE user='admin'");
            $zaznam = $vysledek->fetch();
            if ($pass_1 == $pass_2) {
                if (password_verify($oldpass, $zaznam['pass'])) {
                    $dotaz = $db->prepare('UPDATE login SET user = ?, pass = ? WHERE id = ?');
                    $akt_id = $zaznam['id'];
                    $dotaz->execute([$user, $hash, $akt_id]);
                }
            }       
        }
    }
    
    if (isset($_POST["insert"])) {
        $total = ($_POST["total"]);
        $successful = ($_POST["successful"]);

        $dotaz = $db->prepare("INSERT INTO results (total, successful) VALUES (?, ?)");
        $dotaz->execute([$total, $successful]);

        if (!$dotaz) {
            die("Error in inserting record to table!");
        }
    }

    if (isset($_POST["delete"])) {
        $vysledek = $db->query("SELECT * FROM results");
        foreach ($vysledek as $radka) {
            $id = $radka["id"];
            $total = 0;
            $successful = 0;
                    
            $dotaz = $db->prepare("UPDATE results SET total = ?, successful = ? WHERE id = ?");
            $dotaz->execute([$total, $successful, $id]);
        }

        if (!$dotaz) {
            die("Error in deleting record to table!");
        }
    }

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Účet</title>
</head>
<body>
    <table class="tabulka-ucet"><tr><td>
    <form action="login.php" method="post">
    </form>
    <?php
        if ($log) {
            print "<table class='statistika'>";
            print "<tr>";
            print "<th class='vysledky1'></th>";
            print "<th class='vysledky2'>Kvadratické rovnice</th>";
            print "<th class='vysledky3'>2D geometrie</th>";
            print "<th class='vysledky4'>3D geometrie</th>";
            print "</tr>";
            print "<tr>";
            print "<td>Spočítaných příkladů</td>";
            $vysledek = $db->query("SELECT * FROM results");
            foreach ($vysledek as $radka) {
                print "<td>".$radka["total"]."</td>";
            }
            print "</tr>";
            print "<tr>";
            print "<td>Z toho úspěšných</td>";
            $vysledek = $db->query("SELECT * FROM results");     
            foreach ($vysledek as $radka) {
                print "<td>".$radka["successful"]."</td>";
            }
            print "</tr>";
            print "<tr>";
            print "<td>Procentuální úspěšnost</td>";
            $vysledek = $db->query("SELECT * FROM results");     
            foreach ($vysledek as $radka) {
                $m = $radka["total"];
                $n = $radka["successful"];
                if ($m == 0) {
                    $procenta = 0;
                }
                else {                    
                    $procenta = ($n/$m)*100;
                    $zaokr = number_format($procenta, 2, '.', "");
                }
                if (($n*100) % $m == 0) {
                    print "<td>$procenta %</td>";
                }
                else {
                    print "<td>$zaokr %</td>";
                }
            }
            print "</tr>";
            print "</table>";
            $db = null;
        }
    ?>
    <table class="logout"><tr>
        <td class="leva-polovina"><form action="account.php" method="post">
            <?php
                if ($log) {
                    print "<input type='submit' name='account' class='l-button' value='Změnit heslo'>";
                }
            ?>
        </form></td>
    <td class="prava-polovina"><form action="logout.php" method="post">
        <?php
            if ($log) {
                print "<input type='submit' name='logout' class='l-button' value='Odhlásit'>";
            }
        ?>
    </form></td>
    </tr>
    <tr>
    <td class="leva-polovina"><button type="button" class="l-button" onclick="window.open('index.php', '_self');">Zpět</button></td>
    <td class="prava-polovina"><form action="delete.php" method="post">
        <?php
            if ($log) {
                print "<input type='submit' name='delete' class='l-button' value='Vymazat záznamy'>";
            }
            if (!$log) {
                print "<input type='submit' name='login' class='l-button' value='Přihlásit'>";
            }
        ?>
    </form></td>
    </tr></table>
    </td></tr></table>
</body>
</html>