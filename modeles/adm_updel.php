<?php
//var_dump($_SESSION);
// si on peut rien faire
if (!($_SESSION['modifietous'] || $_SESSION['modifie'] || $_SESSION['supprimetous'] || $_SESSION['supprime'])) {
    header("Location: ./");

// si on peut modifier ou supprimer les articles de tout le monde
} elseif ($_SESSION['modifietous'] || $_SESSION['supprimetous']) {
    $where = "";
// si on peut modifier ou supprimer ses articles
} else {
    // pour sélectionner que les articles de l'utilisateur
    $idutil = $_SESSION['idutil'];
    $where = "WHERE h.utilisateur_id = $idutil";
}


$sql = "
SELECT a.id AS idart,a.letitre,SUBSTRING(a.ladesc,1,200) AS ladesc ,a.ladate,ahr.article_id,
      ahr.rubrique_id,u.lelogin,u.lepass,u.lemail,d.id AS iddroit,


      GROUP_CONCAT(DISTINCT r.id) AS idrub,
      GROUP_CONCAT(DISTINCT r.lintitule SEPARATOR '|||') AS lintitulerub


        from article a
        LEFT JOIN article_has_rubrique ahr
        ON a.id = ahr.article_id
        LEFT JOIN rubrique r
        ON ahr.rubrique_id = r.id
        LEFT JOIN util u
        ON a.util_id = u.id
        LEFT JOIN droit d
        ON u.droit_id = d.id
        GROUP BY a.id
        ORDER BY a.ladate DESC

       ";
$req_article = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

$tab_article = mysqli_fetch_all($req_article, MYSQLI_ASSOC);
//var_dump($tab_article);

$nb = mysqli_num_rows($req_article);
