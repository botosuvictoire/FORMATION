<?php
require('CONNEXION.php');
$login = $_POST['login'];
$password = $_POST['password'];

$requette =$dbco->prepare("SELECT * FROM agent where login=? and password=?");
$requette->execute(array($login, $password));
$ligne= $requette->rowCount();
if ($ligne == 1 ) {
    echo 'Nombre de lignes'.$ligne .'<br>';
    echo 'Bonjour'.$login .'votre mot de pass est:' .$password;
}
else {
    echo 'désoler mot de pass incorrecte';
}

?>