<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   </head>
   
<body>
  <div class="wrapper">
    <h2>Inscription</h2>
    <form action="index.php" method="POST">
      <div class="input-box">
        <input type="text" name="pseudo" placeholder="Pseudo" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Email" required>
      </div>
      <div class="input-box">
        <input type="password" name="pass" placeholder="Mot de Passe" required>
      </div>
      <div class="input-box button">
        <input type="submit" value="S'inscrire">
      </div>
      <div class="text">
        <h3>Deja inscrit ? <a href="http://localhost:8080/connect.html">Se connecter !</a></h3>
      </div>
    </form>
  </div>

<?php
    
    $dbconn = pg_connect('host=bdd_relationelle port=5432 dbname=db_post user=test password=example')
        or die('Could not connect');

    if ( isset( $_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email']) ) { 
      $query = "INSERT INTO myUser(username, pass, email) VALUES ('$_POST[pseudo]','$_POST[pass]', '$_POST[email]')";
    }
    
    pg_close($dbconn);

    
?>
</body>
</html>

