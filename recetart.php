<?php
require('connexion.php');

require('ma_session.php');

//recuperer les information du formulaire
//On interroge 
$articles = $dbco->prepare("
SELECT id_art,libelle_art,PU_art FROM article");
$articles->execute();

$agent = $_SESSION['user']['nom'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>
       RECHERCHE DE LA RECETTE D'UN ARTICLE 
    </title>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<h1 style=" background:violet; text-align:center">RECHERCHE DE LA RECETTE D'UN ARTICLE  : <?php echo $agent;?> </h1>


<div class="row mt-4">
        <form action="insert_recetart.php" method="post"> 
        <div class="col-4"></div>
                <div class="col-4">

                    <div class="form-group">
                        CHOISIR UN ARTICLE:<br/>
                        <select class="form-select" name="article" value="" >
                            <option selected> Selectionnez un article</option>
                            <?php
                            foreach ($articles as $key => $article) {
                               echo '<option value="'.$article['id_art'].'">'.$article['libelle_art'].' ( '.$article['PU_art'].' FCFA ) </option>';
                              
                            }
                           
                            ?>
                            </select><br />
                        
                      
                    </div>


                        <button type="submit" name="enregistrer" value="enregistrer"> VALIDER </button>
                         
                      
                   
                    </div>
                </div>
                <div class="col-4"></div>
            </form>
        </div>
    </body>
     
    </html>