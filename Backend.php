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
    <title>Backend</title>
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
      <div class="col-md-10 mx-auto">
        <div class="col-md-12">

        <?php
        include("conex_bd.php");
        include("fetch_back.php");

        
        if(isset($_GET['msg'])){
            echo'<div class="alert alert-info alert-dismissible fade show mb-3" role="alert">';
            echo $_GET['msg'];
            echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo'</div>';
            
        }
        ?>
        <a href="Formulaire.php"><button class="btn btn-outline-success mb-3">Add New</button></a>

        <?php
        echo "<table class='table'>";
        echo "<tr><th>Nom complet</th><th>Téléphone</th><th>Photo</th><th>Action</th></tr>";
        foreach ($patients as $ligne) {
            echo "<tr>
                    <td class='col-md-3'>" . $ligne['nom'] . "</td><td class='col-md-3'>" . $ligne['tel'] . "</td>
                    <td class='col-md-3'><img width='100px' height='100px' src={$ligne['nom_img']}></td>

                    <td class='col-md-3'>

                        <a href='update_form.php?id={$ligne["id_patient"]}'class='btn btn-outline-warning'>Update</a>
        
                        <a href='delete_patient.php?id={$ligne["id_patient"]}' class='btn btn-outline-danger delete-modal'>Delete</a> 
    
                        <a href='Details.php?nom={$ligne['nom']}&sexe={$ligne['sexe']}&tel={$ligne['tel']}
                        &consulter={$ligne['consulter']}&specialite={$ligne['specialite']}
                        &rendez={$ligne['rendez']}&photo={$ligne['nom_img']}' class='btn btn-outline-primary'>View</a>

                    </td>
                 </tr>";
        }
        echo "</table>";


        ?>
<!-------------------------------------------------- Modal Delete --------------------------------------------------------------------->

        </div>
      </div>
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer ce patient?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <a href="" id="deleteConfirmButton" class="btn btn-danger">Supprimer</a>
      </div>
    </div>
  </div>
</div>
<script>
  const deleteModal = document.getElementById('deleteModal');
  const deleteConfirmButton = document.getElementById('deleteConfirmButton');

  const deleteButtons = document.querySelectorAll('.delete-modal');

  deleteButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
      event.preventDefault();

      // Mettre à jour l'URL du bouton "Supprimer" du modal de confirmation
      const deleteUrl = button.getAttribute('href');
      deleteConfirmButton.setAttribute('href', deleteUrl);

      // Afficher le modal de confirmation
      const modal = new bootstrap.Modal(deleteModal);
      modal.show();
    });
  });
</script>

<!--------------------------------------------------------------------------------------------------------------------------------->

    </main>

<!----------------------------------------------------------- FOOTER ------------------------------------------------------------>
    <?php
    include ("footer.php");
    ?>
    <script src="bootstrap.min.js"></script>

</body>
</html>