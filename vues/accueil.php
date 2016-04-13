<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $titre ?></title>
</head>
<body>
<h1><?= $titre ?></h1>
<?php
require_once "modeles/menu.php";
if($nb == 0){
    echo "Pas encore d'articles";
}else {
  foreach ($tab_article as $affiche) {

    echo "<h3>" . $affiche['letitre'] . "</h3>";
    echo "<h3>Ecrit par : " . $affiche['lelogin'] . "</h3>";


    $coupe_idgenre = explode(',',$affiche['idrub']);
    $coupe_lintitule = explode ("|||",$affiche['lintitulerub']);
    // tant que l'on a des genres
    foreach($coupe_lintitule AS $clef => $valeur){
      echo "<a href='?idsec=".$coupe_idgenre[$clef]."'>$valeur</a> ";
    }

    echo "<p>" . $affiche['ladesc'] . "... <a href='?iddesc=" . $affiche['idart'] . "'>Lire la suite</a></p><hr/>";
  }
}
?>


</body>
</html>