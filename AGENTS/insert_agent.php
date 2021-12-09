
<?php
require('connexion.php');

//recuperer les information du formulaire

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$titre = $_POST['titre'];
$login = $_POST['login'];
$password = $_POST['password'];
$tg = $_POST['tg'];




//On insère les données reçues dans la table
$agent = $dbco->prepare("
INSERT INTO agent( nom, prenom, contact, email, titre, id_tg, login, password)
VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
$agent->execute(array($nom, $prenom, $contact, $email, $titre, $tg, $login, $password));
header("Location:ok-agent.html");


?>