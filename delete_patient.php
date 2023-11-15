<?php

include("conex_bd.php");

if(isset($_GET['id'])){
    $id_patient=$_GET['id'];
    $sql="DELETE FROM consultation WHERE id_patient=$id_patient";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();

    $sql="DELETE FROM patient WHERE id_patient=$id_patient";
    $statement = $connexion->prepare($sql);
    $statement->execute();
    if($stmt && $statement){
        header('Location:Backend.php?msg=Patient supprimé avec succès');
    }else{
        echo'<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">';
        echo "La connexion à la base de données a échoué : " . $e->getMessage(); 
        echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo'</div>';
    }
}

?>



