
<?php

@ session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-------------------------------------------- HEADER ------------------------------------------------------------>
    <?php
        include ("header.php");
    ?>
        
    <!-------------------------------------------- MAIN ------------------------------------------------------------>
    <main class="p-5 d-flex flex-column align-items-center">
      <h2 class="mb-5">Connectez-vous pour remplir le formulaire !</h2>
      <form class="col-md-3" action="" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" aria-describedby="username" placeholder="Votre User">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
        </div>
        <button type='submit' name="submit" class="btn btn-dark mb-5">Connection</button>
      </form>
      <?php
      //connexion a la base de donnees
        include("conex_db_login.php");
        include("conex_bd.php");

      //verification user
        include("test_login.php");


    ?>
    </main>
    <!-------------------------------------------- FOOTER ------------------------------------------------------------>
    <?php
    include ("footer.php");
    ?>
    <script src="bootstrap.min.js"></script>
</body>
</html>