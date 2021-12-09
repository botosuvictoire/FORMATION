<?php
//Code pour se connecter à une base de données et faire une insertion dans une table
$serveur = "localhost";
$dbname = "db_recette2";
$user = "root";
$pass = "";

try {
    //On se connecte à la BDD
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //On insère les données reçues dans la table
    $tgs = $dbco->prepare("select id_tg, libelle from tg");
    $tgs->execute();
} catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULAIRE AGENTS </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
<div class="wrapper wrapper--w790">
<div class="card card-5">
<div class="card-heading">
<h2 class="title">Event Registration Form</h2>
</div>
<div class="card-body">
<form method="POST">
<div class="form-row m-b-55">
<div class="name">Name</div>
<div class="value">
<div class="row row-space">
<div class="col-2">
<div class="input-group-desc">
<input class="input--style-5" type="text" name="first_name">
<label class="label--desc">first name</label>
</div>
</div>
<div class="col-2">
<div class="input-group-desc">
<input class="input--style-5" type="text" name="last_name">
<label class="label--desc">last name</label>
</div>
</div>
</div>
</div>
</div>
<div class="form-row">
<div class="name">Company</div>
<div class="value">
<div class="input-group">
<input class="input--style-5" type="text" name="company">
</div>
</div>
</div>
<div class="form-row">
<div class="name">Email</div>
<div class="value">
<div class="input-group">
<input class="input--style-5" type="email" name="email">
</div>
</div>
</div>
<div class="form-row m-b-55">
<div class="name">Phone</div>
<div class="value">
<div class="row row-refine">
<div class="col-3">
<div class="input-group-desc">
<input class="input--style-5" type="text" name="area_code">
<label class="label--desc">Area Code</label>
</div>
</div>
 <div class="col-9">
<div class="input-group-desc">
<input class="input--style-5" type="text" name="phone">
<label class="label--desc">Phone Number</label>
</div>
</div>
</div>
</div>
</div>
<div class="form-row">
<div class="name">Subject</div>
<div class="value">
<div class="input-group">
<div class="rs-select2 js-select-simple select--no-search">
<select name="subject">
<option disabled="disabled" selected="selected">Choose option</option>
<option>Subject 1</option>
<option>Subject 2</option>
<option>Subject 3</option>
</select>
<div class="select-dropdown"></div>
</div>
</div>
</div>
</div>
<div class="form-row p-t-20">
<label class="label label--block">Are you an existing customer?</label>
<div class="p-t-15">
<label class="radio-container m-r-55">Yes
<input type="radio" checked="checked" name="exist">
<span class="checkmark"></span>
</label>
<label class="radio-container">No
<input type="radio" name="exist">
<span class="checkmark"></span>
</label>
</div>
</div>
<div>
<button class="btn btn--radius-2 btn--red" type="submit">Register</button>
</div>
</form>
</div>
</div>
</div>
</div>
    <h1>GESTION DES AGENTS</h1>
    <form action="Insert_agent.php" method="get">
        <div class="container">
            <div class="row-cols-4">
                <div style="padding-bottom: 10px;">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom">
                </div>
                <div style="padding-bottom: 10px;">
                    <label for="prenom">Prénoms</label>
                    <input type="text" name="prenoms">
                </div>
                <div style="padding-bottom: 10px;">
                    <label for="Contact">Contact</label>
                    <input type="text" name="Contact">
                </div>
                <div style=" padding-bottom: 10px; ">
                    <label for="email ">E-mail</label>
                    <input type="email " name="mail">
                </div>
                <div style=" padding-bottom: 10px; ">
                    <label for="titre ">Titre</label>
                    <input type="text " name="titre">
                </div>
                <div style=" padding-bottom: 10px; ">
                    <label for="TG">Tresorerie Générale de : </label>
                    <select name="tg" id="">
                        <option selected>Selectionner une TG</option>
<?php
foreach ($tgs as $key => $tg) {
             echo' <option value="'.$tg['id_tg'].'">'.$tg['libelle'].'</option>';
 
}
?>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Enregistrer">
                </div>

    </form>
    </div>
    </div>
</body>

</div>

</html>