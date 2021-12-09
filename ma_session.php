<?php
    //demarer une session

    session_start();
    if (!isset($_SESSION['user'])){// si l'utilisateur n' est pas connecte
    // si la variable $_SESSION['user']
header("location:login.html");
exit();
 }
?>