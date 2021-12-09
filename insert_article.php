<?php

$serveur = "localhost";
$dbname = "db_recette2";
$user = "root";
$pass = "";
//recuperer les information du formulaire

$codarticle = $_POST['code_art'];
$libarticle = $_POST['libelle_art'];
$prixarticle = $_POST['PU_art'];
$qtarticle = $_POST['QTE_art'];


try{
//On se connecte à la BDD
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//On insère les données reçues dans la table
$art = $dbco->prepare("
INSERT INTO article(code_art, libelle_art, PU_art, QTE_art)
VALUES(?, ?, ?, ?)");
$art->execute(array($codarticle, $libarticle, $prixarticle, $qtarticle));
header("Location:ok-article.html");
}
catch(PDOException $e){
echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}

?>