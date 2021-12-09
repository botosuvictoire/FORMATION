<?php
require('connexion.php');
//recuperer les information du formulaire


$qterecette = $_POST['QTE_recette'];
$idagent = $_POST['id_agent'];
$codarticle = $_POST['article'];

$rech_pu = $dbco->prepare("select PU_art from article where id_art =$codarticle");
$rech_pu->execute();
$pu = $rech_pu->fetch();
$prix=$pu['PU_art'];
$montant=$qterecette*$pu['PU_art'];
//echo $montant;

//On insère les données reçues dans la table
$recette = $dbco->prepare("
INSERT INTO recette(QTE_recette, montant,id_agent, id_art)
VALUES(?, ?, ?, ?)");
$recette->execute(array($qterecette, $montant,$idagent, $codarticle ));
//header("Location:liste_recette.php");


?>