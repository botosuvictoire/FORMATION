<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/bootstrap-5.1.3-dist/css/style local.css" />
</head>

<body>
    <?php
  require('CONNEXION.php');

 
// Initialisation des variables
 
$errors = array();
 
// Connexion à la base de données

    if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password1'], $_REQUEST['password2']))
 {
    $username = stripslashes($_REQUEST['username']);
    $email = stripslashes($_REQUEST['email']);
    $password1 = stripslashes($_REQUEST['password1']);
    $password2 = stripslashes($_REQUEST['password2']);
 
    // Validation on s'assurer que le formulaire est correctement rempli
    // en ajoutant (array_push ()) l'erreur correspondante au tableau $ errors
 
    if ($password1 != $password2) 
    {
    array_push($errors, "Les deux mots de passe ne correspondent pas");
    }
 
 
    // on vérifie d'abord la base de données pour s'assurer
    // que l'utilisateur n'existe pas déjà avec le même nom d'utilisateur et / ou email
 
    $req = $dbco->prepare('SELECT * FROM users where username=? and email=? and password=?');
    $req->execute(array(
    $_POST['username'],
    $_POST['email'],
    $_POST['password1']));
     
    $resultat = $req->fetch();
 
    if (!$resultat)
    {
        if (!$resultat['username'] == $username) 
        {
        array_push($errors, "Ce nom d'utilisateur existe déjà");
        }
    
        if (!$resultat['email'] == $email)
        
         {
        array_push($errors, "l'email existe déjà");
        }
        if (!$resultat['password1'] == $password1) {
        array_push($errors, "le mot de passe existe déjà");
        }
    }
 
    // Finalement, on enregistre l'utilisateur s'il n'y a pas d'erreur dans le formulaire  
 
    if (count($errors) == 0)
    {
     $password = md5($password1);
 
      $util = $dbco->prepare("INSERT INTO users(username, email, type, password)
        VALUES(?, ?, ?, ?)");
        $util->execute(array($username, $email, 'user', $password));

            echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login_exist.php'>connecter</a></p>
       </div>";
        }}
    ?>
        <form class="box" action="" method="post">
            <h1 class="box-logo box-title">
                GESTION DES TG </h1>
            <h1 class="box-title">Nouvel utilisteur? S'inscrire ici </h1>
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required autocomplete="off" />

            <input type="email" class="box-input" name="email" placeholder="Email" required />

            <input type="password" class="box-input" name="password1" placeholder="Mot de passe" required autocomplete="off" />
            <input type="password" class="box-input" name="password2" placeholder="Confirmer le Mot de passe" required autocomplete="off" />

            <input type="submit" name="submit" value="S'inscrire" class="box-button" />

            <p class="box-register">Déjà inscrit?
                <a href="login_exist.php">Connectez-vous ici</a>
            </p>
        </form>
</body>

</html>