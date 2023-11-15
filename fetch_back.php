<?php

$sql="SELECT p.*, GROUP_CONCAT(s.nom SEPARATOR '<br>') AS specialite
FROM patient p
LEFT JOIN consultation c ON p.id_patient = c.id_patient
LEFT JOIN specialite s ON c.id_specialite = s.id_specialite
GROUP BY p.id_patient
";
$statement = $connexion->prepare($sql);
$statement->execute();
$patients = $statement->fetchAll(PDO::FETCH_ASSOC);

?>