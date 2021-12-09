<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="/bootstrap-5.1.3-dist/css/style local.css"/>
    
</head>

<body>
    <form action="seconecter.php"  method="POST" id="login-form">
        <h1>BIENVENUE SUR LE SITE DE LA GESTION DES TG</h1>
        <div>
            <input type="text" name="login" class="form-control" placeholder="Nom d'utilisateur ou Email">
        </div></br>

        <div>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
        </div>

        <label>
            <input type="checkbox" name="remember"> se souvenir de moi
        </label>

        <button type="submit" class="login-btn">Login</button>

        <div class="bottom-links" name="enregistrer">
            <p>Vous n'avez pas de compte? <a href="/AGENTS/AGENTBON.php">S'incrire ici</a></p>
        </div>
    </form>
</body>

</html>