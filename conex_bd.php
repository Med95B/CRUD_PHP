<?php

$server = "localhost";
$user = "root";
$pass = "";
$bdname = "crud_dev101";


try {
    $connexion = new PDO("mysql:host=$server;dbname=$bdname", $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    echo'<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">';
    echo "Connexion à la base de données réussie !"; 
    echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo'</div>';
    
}
catch(PDOException $e) {
   
    echo'<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">';
    echo "La connexion à la base de données a échoué : " . $e->getMessage(); 
    echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo'</div>';
    
   
}
?>
