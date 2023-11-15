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
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>
    <!-------------------------------------------- HEADER ------------------------------------------------------------>
    <?php
        include ("header.php");
        ?>
        
    <!-------------------------------------------- MAIN ------------------------------------------------------------>
    <main class="p-5">
      <?php
      include("conex_bd.php");
include("update_patient.php");

include("fetch_update.php");

    ?>

      <form class="row col-md-10 mx-auto g-3" action="" method="post" enctype="multipart/form-data">
      <h1>Interface Update patient</h1>

<!--------------------------------- input nom complet ------------------------------------------------->         

        <div class="col-md-4 mb-3">
          <label for="nom" class="form-label fw-bold">Nom complet :</label>
          <input type="text" class="form-control" name="nom" value="<?php echo $patient['nom']; ?>">
        </div>
<!--------------------------------- select list sexe ------------------------------------------------->         

        <div class="col-md-4 mb-3">
  <label for="sexe" class="form-label fw-bold">Sexe :</label>
  <select class="form-select" name="sexe">
   <option selected>Selectionnez votre sexe</option>
    <option value="Male" <?php echo ($patient['sexe']=='Male')?"selected":""; ?>>Homme</option>
    <option value="Female" <?php echo ($patient['sexe']=='Female')?"selected":""; ?>>Femme</option>
  </select>
</div>
<!--------------------------------- input telephone --------------------------------------------------------------------->         

        <div class="col-md-4 mb-3">
          <label  for="tel" class="form-label fw-bold">Numéro de téléphone :</label>
          <input name="tel" type="text" class="form-control"  value="<?php echo $patient['tel']; ?>">
        </div>
<!--------------------------------- Radio ----------------------------------------------------------------------------------->         
      
        <div class="col-md-6 mb-3">
          <label for="consulter" class="form-label fw-bold">Avez-vous déjà consulté ce médecin ?</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="consulter" value="oui" checked
            <?php echo ($patient['consulter']=='oui')?"checked":""; ?>>
            <label class="form-check-label" for="oui">
              Oui
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="consulter" value="non"
            <?php echo ($patient['consulter']=='non')?"checked":""; ?>>
            <label class="form-check-label" for="non">
              Non
            </label>
          </div>
        </div>
<!------------------------------------------ Photo ------------------------------------------------------------------------------>         

<div class="col-md-6">
        <label for="photo" class="form-label fw-bold">Photo :</label>
        <input type="file" name="photo" class="form-control">
        </div>


<!--------------------------------- checkbox specialite ----------------------------------------------------------------------->         

<div class="col-md-6 mb-3">
<label class="form-label fw-bold" for="specialite[]">Sélectionnez votre spécialiste :</label>
<div class="form-check">
    <?php  $checked=explode("<br>",$patient['specialite']);?>
  <input class="form-check-input" type="checkbox" value="1" name="specialite[]"
  <?php echo(in_array(1,$checked))?"checked":""; ?>>
  <label class="form-check-label" for="1">
    ORL
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="2" name="specialite[]"
  <?php echo(in_array("2",$checked))?"checked":""; ?>>
  <label class="form-check-label" for="2">
    Chirurgien-dentiste
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="3" name="specialite[]"
  <?php echo(in_array("3",$checked))?"checked":""; ?>>
  <label class="form-check-label" for="3">
    Médecin généraliste
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="4" name="specialite[]"
  <?php echo(in_array("4",$checked))?"checked":""; ?>>
  <label class="form-check-label" for="4">
    Pédiatre
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="5" name="specialite[]"
  <?php echo(in_array("5",$checked))?"checked":""; ?>>
  <label class="form-check-label" for="5">
    Gynécologue médical et obstétrique
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="6" name="specialite[]"
  <?php echo(in_array("6",$checked))?"checked":""; ?>>
  <label class="form-check-label" for="6">
  Ophtalmologue
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="7" name="specialite[]"
  <?php echo(in_array("7",$checked))?"checked":""; ?>>
  <label class="form-check-label" for="7">
  Dermatologue et vénérologue 
  </label>
</div>
</div>


<!--------------------------------- Rendez-vous ------------------------------------------------->         


     
        <div class="col-md-6 ms-auto">
          <label for="date" class="form-label fw-bold">Rendez-vous :</label>
          
          <?php  $rendez=explode(" ",$patient['rendez']);?>

            <input type="date" id="date" name="date" class="form-control mb-3" value="<?php echo $rendez[0] ;?>">

        <div class="d-flex align-items-center mb-3">

            <span id="selected-date"><?php echo $rendez[0] ;?></span>&nbsp;
            <span id="selected-heure"><?php echo $rendez[1] ;?></span>
            <input type="time" id="heure" name="heure" class="form-control" hidden>
            <div class="ms-auto">
                <button class="btn btn-outline-secondary" type="button" id="prev-date"><i class="bi bi-arrow-left"></i></button>
                <button class="btn btn-outline-secondary ms-2" type="button" id="next-date"><i class="bi bi-arrow-right"></i></button>
            </div>     
        </div>
        <button style="width: 200px;" class="btn btn-outline-primary btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#timePickerModal" id="btn-heure">Heure</button>
        </div>
     
   

    <div class="modal fade" id="timePickerModal" tabindex="-1" aria-labelledby="timePickerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="timePickerModalLabel">Sélectionnez une heure</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="time" id="time" name="time" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="save-time">Enregistrer</button>
          </div>
        </div>
      </div>
    </div>

<!---------------------------------------------------------------------------------------------------------------->         


<!-------------------------------------- Envoyer ------ Effacer -------------------------------------------------------------->         
        
        <div class="col-md-3 mb-3 ms-auto">
          <button type="submit" name="submit" class=" btn btn-dark form-control" id="submit" value="submit">Update</button>
        </div>
        <div class="col-md-3 mb-3">
          <a href="Backend.php" class=" btn btn-dark form-control">Cancel</a>
        </div>

<!---------------------------------------------------------------------------------------------------------------->         
      </form>  
      
    

    </main>
    <!-------------------------------------------- FOOTER ------------------------------------------------------------>
    <?php
    include ("footer.php");
    ?>
    <script src="rendez_vous.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>