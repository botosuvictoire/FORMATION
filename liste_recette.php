<?php
require('connexion.php');

require('ma_session.php');

$recette = $dbco->prepare("SELECT libelle_art, PU_art, QTE_recette, Id_recette, date, montant,libelle_tg,nom
                    FROM article, tg ,recette, agent
                    where recette.id_agent = agent.id_agent and recette.id_art = article.id_art and agent.id_tg = tg.id_tg");



$recette->execute();
//$article = $dbco->prepare("SELECT libelle_art,QTE_art,PU_art from article");
//$article->execute();

?>

<html>
    <head>
        <title>liste des recettes</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
      
    <table class="table table-striped">

    <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">DATE</th>
      <th scope="col">ARTICLE</th>
     <th scope="col">PRIX UNITAIRE</th>
      <th scope="col">QUANTITE</th>
      <th scope="col">MONTANT</th> 
      <th scope="col">TG</th>
      <th scope="col">AGENT</th>
    </tr>
  </thead>
  <tbody>
      <?php
       foreach ($recette as $recettes) {
      
    echo ' <tr>';
   echo '<td>'.$recettes['Id_recette'].'</td>';
   echo ' <td>'.$recettes['date'].'</td>';
   echo ' <td>'.$recettes['libelle_art'].'</td>';
   echo ' <td>'.$recettes['PU_art'].'</td>';
   echo ' <td>'.$recettes['QTE_recette'].'</td>';
   echo ' <td>'.$recettes['montant'].'</td>';
   echo ' <td>'.$recettes['libelle_tg'].'</td>';
   echo ' <td>'.$recettes['nom'].'</td>';
   echo ' </tr>';
   /*foreach ($article as $articles) {
    echo ' <tr>';
   echo '<td>'.$articles['PU_art'].'</td>';
   echo ' <td>'.$articles['QTE_art'].'</td>';
   echo ' <td>'.$articles['libelle_art'].'</td><br>';
   echo ' </tr>';*/
}

    ?>
  </tbody>

</table>
</body>
</html>
