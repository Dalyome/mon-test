<?php

$sql="SELECT a.id AS idart,a.letitre,a.ladesc AS ladesc ,a.ladate,ahr.article_id,
      ahr.rubrique_id,u.lelogin,u.lepass,u.lemail,


      GROUP_CONCAT(r.id) AS idrub,
      GROUP_CONCAT(r.lintitule SEPARATOR '|||') AS lintitulerub


        from article a
        LEFT JOIN article_has_rubrique ahr
        ON a.id = ahr.article_id
        LEFT JOIN rubrique r
        ON ahr.rubrique_id = r.id
        LEFT JOIN util u
        ON a.util_id = u.id
        where a.id = $iddesc;


      ";


$recup_article = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if(mysqli_num_rows($recup_article)){
    $affiche_article = mysqli_fetch_assoc($recup_article);
    $titre = $affiche_article['letitre'];
}else{
    $titre = "Article introuvable";
    $erreur = "Pas d'article trouvé";
}
?>
