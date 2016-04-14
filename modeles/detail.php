<?php
$sql = "SELECT a.id AS idart,a.letitre,a.ladesc AS ladesc ,a.ladate,ahr.article_id,
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
        where a.id = $idarticle;
       ";
$req_article = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_article = mysqli_fetch_assoc($req_article);
//var_dump($tab_article);
if(empty($req_article)){
     $erreur = "Cet article n'existe plus";
}