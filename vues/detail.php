<html>

<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Accueil</h1>
<?php
include 'vues/menusite.php';

if(isset($erreur)){
    echo $erreur;
}else {

    echo "<h3>".$tab_article['letitre']."</h3>";
    echo "<h3>".$tab_article['lelogin']."</h3>";


    $coupe_idgenre = explode(',',$tab_article['idrub']);
    $coupe_lintitule = explode ("|||",$tab_article['lintitulerub']);
    // tant que l'on a des genres
    foreach($coupe_lintitule AS $clef => $valeur){
        echo "<a href='?idsec=".$coupe_idgenre[$clef]."'>$valeur</a> ";
    }

    echo "<p>" . $tab_article['ladesc'] . "</p><hr/>";

}
?>
</body>
</html>
