<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= $titre ?></title>
</head>
<body>
<?php
require_once "modeles/menu.php";
if(isset($erreur)){
  echo "<h2>$erreur</h2>";
}else {


    echo "<h3>".$affiche_article['letitre']."</h3>";
    echo "<h3>".$affiche_article['lelogin']."</h3>";


    $coupe_idgenre = explode(',',$affiche_article['idrub']);
    $coupe_lintitule = explode ("|||",$affiche_article['lintitulerub']);
    // tant que l'on a des genres
    foreach($coupe_lintitule AS $clef => $valeur){
      echo "<a href='?idsec=".$coupe_idgenre[$clef]."'>$valeur</a> ";
    }

    echo "<p>" . $affiche_article['ladesc'] . "</p><hr/>";

}
?>
</body>
</html>