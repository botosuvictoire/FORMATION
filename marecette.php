
<?php
require('connexion.php');

require('ma_session.php');

//recuperer les information du formulaire
//On interroge 
$articles = $dbco->prepare("
SELECT libelle_tg, id_art,libelle_art,PU_art FROM article,tg");
$articles->execute();

$agent = $_SESSION['user']['nom'];

$id_agent = $_SESSION['user']['id_agent'];
$id_tg = $_SESSION['user']['Id_tg'];

$tg = $dbco->prepare("
SELECT * FROM tg WHERE Id_tg = $id_tg");
$tg->execute();
$tgs=$tg->fetch();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        POINTAGE RECETTE
    </title>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<h1 style=" background:violet; text-align:center"> POINTAGE RECETTE  : <?php echo $agent;?> </h1>


<div class="row mt-4">
        <form action="insert_recette.php" method="post"> 
                <div class="col-6">

               <!-- <div class="form-group">
                           DATE:<br />
                            <input class="form-control" type="date" name="date" value="" />
                </dv>     <br /> -->
                <div class="form-group">
                           tg<br />
                            <input class="form-control" type="textr" disabled="disable" name="libelle_tg" value="<?php echo $tgs['libelle_tg'] ;  ?>" />
                            </div>     <br />  

                <div class="form-group">
                            AGENT:<br />
                            <input class="form-control" type="text"  name="id_agent" value="<?php echo $id_agent; ?>" />
                        </div>

                        <div class="form-group">
                            ARTICLE:<br/>
                            <select class="form-select" name="article" value="" >
                                <option selected> Selectionne un article</option>
                                <?php
                                foreach ($articles as $key => $article) {
                                   echo '<option value="'.$article['id_art'].'">'.$article['libelle_art'].' ( '.$article['PU_art'].' FCFA ) </option>';
                                  
                                }
                               ?>
                             
                                </select><br />
                            
                          
                        </div   >
                   

                   
                        <div class="form-group">
                           QUANTITE:<br />
                            <input class="form-control" type="number" name="QTE_recette" value="" />
                            </div>     <br />  


                            <div class="form-group">

                           
                            <input class="form-control" hidden ="hidden" type="number" name="PU_art" value="" />
                            </div>     <br />  
                            
                                           
                   
                      
                        <button type="submit" name="enregistrer" value="enregistrer"> VALIDER </button>
                         
                      
                   
                    </div>
                </div>
            </form>
        </div>
    </body>
     
    </html>