<?php

$sql = "SELECT p.*, GROUP_CONCAT(s.id_specialite SEPARATOR '<br>') AS specialite
            FROM patient p
            LEFT JOIN consultation c ON p.id_patient = c.id_patient
            LEFT JOIN specialite s ON c.id_specialite = s.id_specialite
            WHERE p.id_patient = $id_patient
            GROUP BY p.id_patient";

$statement = $connexion->prepare($sql);
$statement->execute();
$patient = $statement->fetch(PDO::FETCH_ASSOC);


?>