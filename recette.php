<?php
require('CONNEXION.php');
     //On insère les données reçues dans la table
    $article = $dbco->prepare("select * FROM article");
    $article->execute();
    
   session_start();


 // $_SESSION['user']=$article;

   //Reccuperer les informations du formulaire
   //$id_tg = $_POST['id_tg'];
   //$id_article = $_POST['id_article'];
   //$libelle_article = $_POST['libelle_article'];     
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row mt-4">
        <form action="insert_recette.php" method="post">
            <div class="row container justify-content-center">
                <div class="col-6">
                    <p>
                        <div class="form-group">
                            Qantite:<br />
                            <input class="form-control" type="number" name="quantite" value="" />
                        </div>
                    </p>

                    <p>
                        

                        <div class="form-group">
                            Article:<br />
                            <select name="libelle_article">
                            <option value="">Selectioner un article</option>
                            <?php
                            foreach ($article as $key => $value) {
                                echo '<option value='.$value['id_article'].'>'.$value['libelle_article']. '</option>';
                            }
                            
                            ?>
                            </select> 
                        </div>
                        <div class="form-group">
                    
                            <input hidden="hidden" name="id_tg" value="<?php echo $_SESSION['user']['Id_agent']; 
?>"/>
                            

                            <input hidden="hidden" name="quantite" value="<?php echo $_SESSION['user']['Id_agent']; 
?>"/>
                           
                           
                        </div>
                    </p>

                    <p>
                        <div class="form-group ">
                            <input type="submit" value="Enregistrer" />
                            <input type="reset" value="Annuler" />
                        </div>
                    </p>

                    
                </div>
            </div>
        </form>
    </div>
</body>

</html>