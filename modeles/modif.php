<?php

// si on a cliqué sur supprimer ET que l'on peut supprimer l'article
if(isset($_GET['sup'])&& ctype_digit($_GET['sup'])){

    $idarticle = (int) $_GET['sup'];
    // si on peut supprimer les articles de tout le monde
    if($_SESSION['supprimetous']){
        mysqli_query($mysqli,"DELETE FROM article WHERE id = $idarticle ") or die(mysqli_error($mysqli));
    }elseif($_SESSION['supprime']){
        $idutil = $_SESSION['idutil'];
        mysqli_query($mysqli,"DELETE FROM article_has_utilisateur WHERE article_id = $idarticle AND utilisateur_id = $idutil ") or die(mysqli_error($mysqli));
    }
}

// si on peut modifier tous les articles
if($_SESSION['supprimetous']){
    $sql = "SELECT a.titre, SUBSTRING(a.texte,1,100) AS letexte, a.id, a.ladate,
        u.lelogin
  FROM article a
    INNER JOIN article_has_utilisateur has
    ON a.id = has.article_id
    INNER JOIN utilisateur u
    on u.id = has.utilisateur_id
ORDER BY a.ladate DESC";

// si on ne peut modifier que ses articles
}else{
    $idutil = $_SESSION['idutil'];
    $sql = "SELECT a.titre, SUBSTRING(a.texte,1,100) AS letexte, a.id, a.ladate,
        u.lelogin
  FROM article a
    INNER JOIN article_has_utilisateur has
    ON a.id = has.article_id
    INNER JOIN utilisateur u
    on u.id = has.utilisateur_id
    WHERE has.utilisateur_id = $idutil
    ORDER BY a.id DESC";
}

$recup_article = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

$tab_article = mysqli_fetch_all($recup_article,MYSQLI_ASSOC);

if(empty($tab_article)){
    $vide = "Aucun article à éditer";
}

// var_dump($tab_article);