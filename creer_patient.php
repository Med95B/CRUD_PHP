<?php

if (isset($_POST['submit'])) {
    $champs = array('nom', 'sexe', 'tel', 'consulter','specialite','date','heure');
    $chapms_vides = array();

    foreach ($champs as $champ) {
        if (!array_key_exists($champ, $_POST) || empty($_POST[$champ])) {
            $champs_vides[] = $champ;
        }
    }

    if (!empty($champs_vides)) {
        $liste_chpvide = implode(', ', $champs_vides);

        echo'<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">';
        echo "Les champs suivants sont manquants : $liste_chpvide";
        echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo'</div>';
    }elseif(empty($_FILES['photo']['tmp_name'])){
        echo'<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">';
        echo "Ajoutez une photo de profile";
        echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo'</div>';
    }
     else {
            foreach($_POST as $key => $val){
                
                    ${$key}=$val;
            }
            
            $rendez= date('Y-m-d H:i', strtotime("$date $heure"));
            $date =date('dmyhis');
            $nom_img='mon_fichier'.$date.'.jpg';
            $img=$_FILES['photo']['name'];
            $taille_img=$_FILES['photo']['size'];
            $bin_img=move_uploaded_file($_FILES['photo']['tmp_name'],$nom_img);  

            $sql='INSERT INTO patient(nom,sexe,tel,consulter,rendez,img,taille_img,nom_img,bin_img) VALUES
                                 (:nom,:sexe,:tel,:consulter,:rendez,:img,:taille_img,:nom_img,:bin_img)' ;

            $statement=$connexion->prepare($sql);

            $statement->execute([':nom'=>$nom,':sexe'=>$sexe,':tel'=>$tel,':consulter'=>$consulter,':rendez'=>$rendez,
                                 ':img'=>$img,':taille_img'=>$taille_img,':nom_img'=>$nom_img,':bin_img'=>$bin_img]);


            $id_patient = $connexion->lastInsertId();

            foreach ($specialite as $id_specialite) {
                if(isset($id_specialite)){
                    $stmt = $connexion->prepare("INSERT INTO consultation (id_patient, id_specialite) VALUES (?, ?)");
                    $stmt->execute([$id_patient, $id_specialite]);
                }
              }
            
            if($statement && $stmt){
                header('location:Backend.php?msg=Nouveau patient enregisté avec succès');
            }else{
                echo'<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">';
                echo "La connexion à la base de données a échoué : " . $e->getMessage(); 
                echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo'</div>';
            }

    }
}

?>