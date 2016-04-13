<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 12/04/2016
 * Time: 15:02
 */


// 2 choix, on affiche ses propres articles, ou ceux des autres

// on peut modifier ou supprimer ceux des autres
if($_SESSION['sup_tous']||$_SESSION['modif_tous']){
    $where = "";
}elseif($_SESSION['sup']||$_SESSION['modif']){
    $where = "WHERE a.util_id = ".$_SESSION['idutil'];
}

// récupération de TOUS LES articles

$sql = "SELECT a.*, 
               u.lelogin, u.id AS idutil,
               GROUP_CONCAT(r.id) as idrub, 
               GROUP_CONCAT(r.lintitule SEPARATOR '|||') as lintitule,
               (SELECT lelogin FROM util WHERE id=1) AS tt
        FROM article a
        
        INNER JOIN util u
          ON a.util_id = u.id
          
        LEFT JOIN article_has_rubrique h
          ON h.article_id = a.id
        LEFT JOIN rubrique r
          ON h.rubrique_id = r.id
          
          
          
        GROUP BY a.id  
        ORDER BY a.ladate DESC
";

$recup_article = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));
$tab_article = mysqli_fetch_all($recup_article,MYSQLI_ASSOC);