<?php


if(isset($_POST['submit'])){
        $login=$_POST['username'];
        $pass=$_POST['password'];
        $sql = 'select login
                from user 
                where login =:login and pass=:pass';
        $statement = $connexion->prepare($sql);
        $statement->execute([':login'=> $login,':pass'=> $pass ]);  
        
    if($statement->rowCount() == 1) {
        setcookie("user", gethostname(), time() + (86400 * 30), "/");
        $_SESSION['username']=$_POST['username'];
      header("Location: Formulaire.php");
      exit();
  }
  else {

    echo'<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">';
    echo "Mot de passe ou user incorrect. Veuillez réessayer.";
    echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo'</div>';

  }
    
  }      
      
    
    ?>