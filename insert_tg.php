<?php

//recuperer les information du formulaire
require('connexion.php');

$code = $_POST['code_tg'];
$libelle = $_POST['libelle_tg'];
$adresse = $_POST['adresse_tg'];
$contacttg = $_POST['contact_tg'];



//On insère les données reçues dans la table
$tg = $dbco->prepare("
INSERT INTO tg(code_tg, libelle_tg, adresse_tg, contact_tg)
VALUES(?, ?, ?, ?)");
$tg->execute(array($code, $libelle, $adresse, $contacttg));
header("Location:ok-tg.html");


?>