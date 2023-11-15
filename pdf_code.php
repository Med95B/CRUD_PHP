<?php
       
$html = '<html> <head> <style>
body{
    border: 4px solid black;
    padding:10px
   
}
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
        color: #2ecc71;
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
        right: 15px;
        color: #2ecc71;
    }
    #div1{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
    h3{
        color:#3498db;
        text-decoration: underline;
    }
    </style>
</head>
<body>
<main>
    <img src="clinic_logo.png" alt="clinic_logo"  width="150px" height="150px" id="left1">
    <img src="cmc_logo.png" alt="cmc_logo"  width="150px" height="150px" id="right1">
    <div id="div1">
        <h3>Attestation de réservation de consultation</h3>
        <div>
            <h4>Nom : ' . $_GET['nom'] . '</h4>
            <h4>Sexe : ' . $_GET['sexe'] . '</h4>
            <h4>Tel : ' . $_GET['tel'] . '</h4>
            <h4>Maladies :<br>&nbsp;&nbsp;&nbsp;&nbsp;*'.@ implode('<br>&nbsp;&nbsp;&nbsp;&nbsp;*',explode('<br>',$_GET['specialite'])) . '</h4><br>
            <h4>Prix total : ' . count(explode('<br>', $_GET['specialite'])) * 300 . ' DH</h4>
        </div>
    </div>
    <h5 id="date">Date Edition : ' . $_GET['edition'] . '</h5>
    <img src="'.$_GET['qrcode'].'" alt="qrCode"  width="150px" height="150px" id="left2">
    <h5 id="cachet">Visa du clinique</h5>
    <img src="cachet.png" alt="cachet"  width="150px" height="150px" id="right2">
</main></body></html>';
        
       // $html=file_get_contents('PDF.php');
       // echo $html;
        require_once 'dompdf/autoload.inc.php';
        use Dompdf\Dompdf;
        use Dompdf\Options;
        $option = new Options();
        $option->set('chroot',realpath(''));
        $dompdf = new Dompdf($option);
        $dompdf->loadHtml($html); 
        $dompdf->setPaper('A4', 'portrait'); 
        $dompdf->render(); 
        $dompdf->stream("newfile.pdf");


?>