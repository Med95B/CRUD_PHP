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
    <title>Statistiques</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
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
include('conex_bd.php');
include('fetch_static.php');
$nbr_h=$hommes;
$nbr_f=$femmes;

?>  

<canvas id="hommes_femmes"></canvas><br>

<script >
var ctx = document.getElementById('hommes_femmes').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['homme', 'femme'],
    datasets: [{
      label: 'hommes_femmes',
      data: [<?php echo json_encode($nbr_h); ?>, <?php echo json_encode($nbr_f); ?>],
      backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 99, 132, 0.2)'
        
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)'
        
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>

<?php

$nbr_jour=$nbr_jr;
$nbr_nuit=$nbr_nt;

?>  

<canvas id="jour_nuit"></canvas><br>

<script >
var ctx = document.getElementById('jour_nuit').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Consultations du Jour', 'Consultations de Nuit'],
    datasets: [{
      label: 'jour_nuit',
      data: [<?php echo json_encode($nbr_jr); ?>, <?php echo json_encode($nbr_nt); ?>],
      backgroundColor: [
        'rgba(52, 152, 219,0.2)',
        'rgba(44, 62, 80,0.2)'
        
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)'
        
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>

<?php

$spe1=$nbr_demandes[1];
$spe2=$nbr_demandes[2];
$spe3=$nbr_demandes[3];
$spe4=$nbr_demandes[4];
$spe5=$nbr_demandes[5];
$spe6=$nbr_demandes[6];
$spe7=$nbr_demandes[7];

?>  

<canvas id="specialites_demandes"></canvas><br>
<script >
var ctx = document.getElementById('specialites_demandes').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['ORL', 'Chirurgien-dentiste','Médecin généraliste','Pédiatre','Gynécologue médical et obstétrique','Ophtalmologue','Dermatologue et vénérologue'],
    datasets: [{
      label: 'specialites_demandes',
      data: [<?php echo json_encode($spe1); ?>, <?php echo json_encode($spe2); ?>,<?php echo json_encode($spe3); ?>,<?php echo json_encode($spe4); ?>,<?php echo json_encode($spe5); ?>,<?php echo json_encode($spe6); ?>,<?php echo json_encode($spe7); ?>],
      backgroundColor: [
        'rgba(26, 188, 156,0.2)',
        'rgba(46, 204, 113,0.2)',
        'rgba(52, 152, 219,0.2)',
        'rgba(155, 89, 182,0.2)',
        'rgba(241, 196, 15,0.2)',
        'rgba(230, 126, 34,0.2)',
        'rgba(52, 73, 94,0.2)'
        
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)'
        
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>
        
        </div>
    </main>
    <!-------------------------------------------- FOOTER ------------------------------------------------------------>
    <?php
    include ("footer.php");
    ?>
    <script src="bootstrap.min.js"></script>
</body>
</html>