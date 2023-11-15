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
    <title>PDF</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        main{
            padding: 20px;
            position: relative;
            background-color: white;
        }
        #left1{
            position: absolute;
            top: 0;
            left: 0;
        }
        #left2{
            position: absolute;
            bottom: 0;
            left: 0;
        }
        #date{
            position: absolute;
            bottom: 150px;
            left: 0;
        }
        #right1{
           position: absolute;
            top: 0;
            right: 0;
        }
        #right2{
           position: absolute;
            bottom: 0;
            right: 0;
        }
        #cachet{
            position: absolute;
            bottom: 150px;
            right: 0;
        }
        #div1{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        h3{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-------------------------------------------- HEADER ------------------------------------------------------------>
    <?php
        include ("header.php");
        ?>
        
    <!-------------------------------------------- MAIN ------------------------------------------------------------>
    <main>
        
                <img src="clinic_logo.png" alt="clinic_logo"  width="150px" height="150px" id="left1">
                <img src="cmc_logo.png" alt="cmc_logo"  width="150px" height="150px" id="right1">
        
        
        <div id="div1">
                <h3>Attestation de réservation de consultation</h3>
                <div>
                    <h4>Nom : <?php echo @ $_GET['nom'] ?></h4>
                    <h4>Sexe : <?php echo @ $_GET['sexe'] ?></h4>
                    <h4>Tel : <?php echo @ $_GET['tel'] ?></h4>
                    <h4>Maladies :<br> <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;*'.@ implode('<br>&nbsp;&nbsp;&nbsp;&nbsp;*',explode('<br>',$_GET['specialite'])) ?></h4><br>
                    <h4>Prix total : <?php echo @ count(explode('<br>',$_GET['specialite']))*300?> DH</h4>
                </div>
        </div>
            
            <h5 id="date">Date Edition : <?php $edition=date('d/m/Y H:i:s');
                                               $_GET['edition']=$edition;     
                                                    echo $edition; ?></h5>

            <?php
                require_once('phpqrcode/qrlib.php');
               @ $url = "PDF.php?nom={$_GET['nom']}&sexe={$_GET['sexe']}&tel={$_GET['tel']}
                &specialite={$_GET['specialite']}";
                $qrCodePath = 'qrcode'.date('dmyhis').'.png';
                $_GET['qrcode']=$qrCodePath;
                $qrCodeOptions = array('version' => 5, 'errorCorrectionLevel' => 'L');
                QRcode::png($url, $qrCodePath, QR_ECLEVEL_L, 5);
                ?>
            <img src="<?php echo $qrCodePath;  ?>" alt="qrCode"  width="150px" height="150px" id="left2">
            <h5 id="cachet">Visa du clinique</h5>
            <img src="cachet.png" alt="cachet"  width="150px" height="150px" id="right2">

        
    </main>
    <!-------------------------------------------- FOOTER ------------------------------------------------------------>
    <?php
    include ("footer_pdf.php");
    ?>
    <script src="bootstrap.min.js"></script>
</body>
</html>