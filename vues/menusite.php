<?php
$sql = "SELECT *
  FROM rubrique

ORDER BY lintitule ;";

$req_rub = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

if(!mysqli_num_rows($req_rub)){
    $vide = "Pas encore de rubrique!";
}else{
    $affiche_rub = mysqli_fetch_all($req_rub,MYSQLI_ASSOC);
}
if(isset($vide)){
    echo "<h2>$vide</h2>";
}else{
    "<ul>";
    echo "<li><a href='?idmenu=accueil'>accueil</a></li>";
    foreach($affiche_rub AS  $affiche){



        echo "<li><a href='?idsec=".$affiche['id']."'>".$affiche['lintitule']."</a></li>";

    }
    echo "<li><a href=?connex>connexion</a></li>";
    "</ul>";
}

?>