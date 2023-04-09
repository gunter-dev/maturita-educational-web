  <?php
      include "config.php";
      include "session.php";
      
      $vysledek = $db->query('SELECT * FROM login');  
      foreach($vysledek as $radka) { 
            $zaznam = $radka;  
      }
      if (!isset($zaznam))
        die("Nepodařilo se přečíst data z tabulky přihlášení!");
  ?>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Account</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css"> 
  </head>
  <body>
  <table class="tabulka-ucet"><tr><td>
  <h1>Změnit heslo</h1>
  <form action="statistics.php" method="post">
    <table class="my_table">
        <tr>
           <td class="leva-polovina">Jméno:</td>
           <td class="prava-polovina">
              <input type="text" name="user" value="<?php echo $zaznam['user']; ?>">
           </td> 
        </tr>
        <tr>
           <td class="leva-polovina">Staré heslo:</td>
           <td class="prava-polovina">
           <input type="password" name="oldpass" value=""> 
           </td> 
        </tr>
        <tr>
           <td class="leva-polovina">Nové heslo:</td>
           <td class="prava-polovina">
           <input type="password" name="pass_1" value=""> 
           </td> 
        </tr>
        <tr>
           <td class="leva-polovina">Nové heslo znovu:</td>
           <td class="prava-polovina">
           <input type="password" name="pass_2" value=""> 
           </td> 
        </tr>
        <tr>
           <td class="leva-polovina">
              <input type="submit" name="account" class="l-button" value="Potvrdit">
           </td> 
           <td class="prava-polovina">
              <input type="submit" name="cancel" class="l-button" value="Zrušit">
           </td>
        </tr>
      </table>
  </form>
  </td></tr></table>
  </body>
</html>
