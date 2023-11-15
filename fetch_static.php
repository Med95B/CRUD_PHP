<?php
//nombres de femmes
$statement = $connexion->prepare("SELECT COUNT(*) as nbr_f FROM patient WHERE sexe='Female'");
$statement->execute();
$femmes = $statement->fetch()['nbr_f'];
//nombres d'hommes
$statement = $connexion->prepare("SELECT COUNT(*) as nbr_h FROM patient WHERE sexe='Male'");
$statement->execute();
$hommes = $statement->fetch()['nbr_h'];
//spacialites_demandes
$statement = $connexion->prepare("SELECT s.id_specialite as specialite, COUNT(c.id_specialite) as nbr_demandes 
FROM consultation c 
JOIN specialite s ON s.id_specialite = c.id_specialite 
GROUP BY c.id_specialite
");
$statement->execute();
$specialites_demandes = $statement->fetchAll(PDO::FETCH_ASSOC);

$nbr_demandes = array();
foreach ($specialites_demandes as $ligne) {
    $id_specialite = $ligne['specialite'];
    $nbr_demandes[$id_specialite] = $ligne['nbr_demandes'];
}

//consultations_jour_nuit

//SELECT COUNT(*) as nbr_jour FROM consultation c JOIN patient p ON c.id_patient = p.id_patient WHERE HOUR(p.rendez) >= 7 AND HOUR(p.rendez) < 19
//SELECT COUNT(*) as nbr_nuit FROM consultation c JOIN patient p ON c.id_patient = p.id_patient WHERE HOUR(p.rendez) < 7 OR HOUR(p.rendez) >= 19

$statement = $connexion->prepare("SELECT 
SUM(CASE WHEN HOUR(rendez) BETWEEN 6 AND 17 THEN 1 ELSE 0 END) AS nbr_consultations_jour,
SUM(CASE WHEN HOUR(rendez) NOT BETWEEN 6 AND 17 THEN 1 ELSE 0 END) AS nbr_consultations_nuit
FROM patient
");
$statement->execute();
$jour_nuit = $statement->fetchAll(PDO::FETCH_ASSOC);

$nbr_jr=$jour_nuit[0]['nbr_consultations_jour'];
$nbr_nt=$jour_nuit[0]['nbr_consultations_nuit'];
?>