<?php

 //demarer une nouvelle session
 session_start();

//se connecter a la DB
require('connexion.php');

//recuperer les information du formulaire
$login = $_POST['login'];
$password = $_POST['password'];

//SELECT * from agent WHERE login='joyce' AND password='123456'

$verif = $dbco->prepare("select * from agent where login=? and password=? ");
$valeur=(array($login, $password));
$verif->execute($valeur);
$user=$verif->fetch();//retourner l'agent(id_agent,login,password et role de l'agent)
// compter 1
// $nbr_user = $verif->rowCount();

// if($nbr==1)
// return $verif->fetch();


if($user != 0 ){//si l'agent existe... 

    $_SESSION['user']=$user;
    //la variable $session[user] est un tableau contenant :  id_agent,login,password et role de l'agent
    header("location:marecette.php");
}

else{
    echo 'Le mot de passe est incorrecte <a href="login.php"> retour au formulaire</a>';

}

?>