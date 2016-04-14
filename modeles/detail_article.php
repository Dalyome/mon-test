<?php

    $sql = "SELECT a.titre, a.texte, a.id, a.ladate,
        u.lelogin
      FROM article a
        INNER JOIN article_has_utilisateur has
        ON a.id = has.article_id
        INNER JOIN utilisateur u
        on u.id = has.utilisateur_id
        WHERE  a.id = $idarticle";


$recup_article = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));


if(mysqli_num_rows($recup_article)){
    $affiche_article = mysqli_fetch_assoc($recup_article);
    $titre = $affiche_article['titre'];
}else{
    $titre = "Article introuvable";
    $erreur = "Pas d'article trouvé";
}