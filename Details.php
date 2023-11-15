<?php 

@ session_start();

    if(!isset($_SESSION['username'])){

      header("location:Index.php");
      exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-------------------------------------------- HEADER ------------------------------------------------------------>
    <?php
        include ("header.php");
        ?>
        
    <!-------------------------------------------- MAIN ------------------------------------------------------------>
    <main class="p-5">
        <div class="col-md-12">
        <?php

echo "<table class='table'>";
echo "<tr><th>Nom complet</th><th>Sexe</th><th>Téléphone</th><th>Consultation</th><th>Specialiste</th><th>Rendez-vous</th><th>Photo</th><th>Action</th></tr>";

    echo "<tr>";
    
    foreach ($_GET as $key => $value) {
        if($key!='photo'){
            echo "<td>" . $value . "</td>";
        }else{
            echo "<td><img width='100px' height='100px' src={$_GET['photo']}></td>";
            echo "<td>
                    <a href='backend.php' class='btn btn-outline-secondary'>Back</a>
                    <a href='PDF.php?nom={$_GET['nom']}&sexe={$_GET['sexe']}&tel={$_GET['tel']}
                    &specialite={$_GET['specialite']}' class='btn btn-outline-primary'>PDF</a>
                  </td>";
                  
        }
           
        }
            
    
    echo "</tr>";

echo "</table>";
echo "<br><br>";

if(isset($_COOKIE['user'])) {
    echo "your are connected from : ".$_COOKIE['user'];
  } else {
    echo "you are connected from : unknown device";
  }

?>
        </div>
    </main>
    <!-------------------------------------------- FOOTER ------------------------------------------------------------>
    <?php
    include ("footer.php");
    ?>
    <script src="bootstrap.min.js"></script>
</body>
</html>