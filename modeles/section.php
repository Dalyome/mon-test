<?php
$sql = "SELECT *
          FROM  rubrique
          WHERE id = $idsec
          ;
";
$req_periode = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

$affiche_periode = mysqli_fetch_assoc($req_periode);

// si on a pas de périodes correspondantes ( donc 0 résultats = false )
if(!mysqli_num_rows($req_periode)){

    // affichage erreur
    $erreur = "Cette période rubrique existe pas !";
    include "vues/erreur.php";
    // on arrête le script
    exit();
}

// récupération des rub
$sql = "SELECT a.id as idart, a.letitre,a.util_id ,SUBSTRING(a.ladesc,1,250) as ladesc,a.ladate,ahr.article_id,ahr.rubrique_id,r
.id AS
 idrub,r.lintitule,u.lelogin,u.id
        FROM article_has_rubrique ahr
        INNER JOIN article a
        ON ahr.article_id = a.id
        INNER JOIN rubrique r
        ON ahr.rubrique_id = r.id
        INNER JOIN util u
        ON a.util_id = u.id

        WHERE ahr.rubrique_id = $idsec
        ORDER BY a.ladate DESC
        ";

$req_ecrivain = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

$affiche_ecrivain = mysqli_fetch_all($req_ecrivain,MYSQLI_ASSOC);

// si on a pas d'écrivain (la variable Array est vide)
if(empty($affiche_ecrivain)){

    // affichage erreur
    $erreur = "Pas d article !";
    include "vues/erreur.php";
    // on arrête le script
    exit();
}

$titre = $affiche_periode['lintitule'];


foreach($affiche_ecrivain as $affiche){

    $contenu = "<h1>".$affiche['letitre']."</h1>";

    $coupe_idgenre = explode(',',$affiche['idrub']);
    $coupe_lintitule = explode ("|||",$affiche['lintitule']);
    // tant que l'on a des genres
    foreach($coupe_lintitule AS $clef => $valeur){
        $contenu .= "<a href='?idsec=".$coupe_idgenre[$clef]."'>$valeur</a> ";
    }

    $contenu .= "<h3>".$affiche['lelogin']."</h3>";
    $contenu .= "<p>".$affiche['ladesc']."... <a href='?idarticle=".$affiche['idart']."'>Lire la suite</a></p>";



}

?>