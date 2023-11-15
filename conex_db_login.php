<?php

$server = "localhost";
$user = "root";
$pass = "";
$bdname = "crud_dev101";
$alreadySetup = false; // Variable de contrôle

try {
    $connexion = new PDO("mysql:host=$server", $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si la base de données existe déjà
    $databases = $connexion->query("SHOW DATABASES")->fetchAll(PDO::FETCH_COLUMN);
    if (in_array($bdname, $databases)) {
        $alreadySetup = true;
    } else {
        // Création de la base si elle n'existe pas
        $connexion->exec("CREATE DATABASE $bdname");
        $connexion->exec("USE $bdname");

        // Exécution des instructions SQL pour créer les tables
        $sql = file_get_contents('crud_dev.sql');
        $connexion->exec($sql);
    }


} catch(PDOException $e) {
    echo '<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">';
    echo "La connexion à la base de données a échoué : " . $e->getMessage();
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
}

if ($alreadySetup) {
    echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert">';
    echo "La base de données est déjà configurée.";
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';

} else {
    
    echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert">';
    echo "La base de données a été créée avec succès.";
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
}
?>