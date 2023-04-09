<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Přihlášení</title>
</head>
<body>
    <table class="tabulka-ucet"><tr><td>
    <h1>Přihlášení</h1>
    <form action="statistics.php" method="post">
        <table class="login">
            <tr>
                <td class="leva-polovina">Jméno: </td>
                <td class="prava-polovina">
                    <input type="text" name="user" id="">
                </td>
            </tr>
            <tr>
                <td class="leva-polovina">Heslo: </td>
                <td class="prava-polovina">
                    <input type="password" name="pass" id="">
                </td>
            </tr>
            <tr>
                <td class="leva-polovina">
                    <input type="submit" name="login" class="l-button" value="Přihlásit">
                </td>
                <td class="prava-polovina">
                    <input type="submit" name="cancel_login" class="l-button" value="Zrušit">
                </td>
            </tr>
        </table>
    </form>
    </td></tr></table>
</body>
</html>