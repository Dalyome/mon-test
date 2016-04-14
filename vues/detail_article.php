<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $titre ?></title>
</head>
<body>
<h1><?= $titre ?></h1>
<?php

// appel du menu
include("Vues/menu.inc.php");

if(isset($erreur)){
  echo "<h2>$erreur</h2>";
}else{

    ?>
<h3><?=$affiche_article['titre']?></h3>
    <h4>Le <?=$affiche_article['ladate']?> par <?=$affiche_article['lelogin']?></h4>
    <p><?=nl2br($affiche_article['texte'])?></p><hr/>
<?php

}
?>
</body>
</html>