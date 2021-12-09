<?php
require('connexion.php');

require('ma_session.php');
$articles = $dbco->prepare("
SELECT * FROM article");
$articles->execute();

?>

<html>

<head>
    <title>>RECHERCHE DE LA RECETTE D'UN ARTICLE</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form action="insert_recetart.php" method="get">
        <div class="form-group">
            ARTICLE:<br />
            <select class="form-select" name="lib_article" value="">
                <option selected> Selectionne un article</option>
                <?php
                foreach ($articles as $key => $article) {
                    echo '<option value="' . $article['id_art'] . '">' . $article['libelle_art'] . ' ( ' . $article['PU_art'] . ' FCFA ) </option>';
                }

                ?>
            </select><br />

            <button type="submit" name="enregistrer" value="enregistrer"> rechercher </button>
    </form>


</body>

</html>