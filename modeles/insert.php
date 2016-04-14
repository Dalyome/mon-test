<?php
/**
 * Created by PhpStorm.
 * Modèle pour insérer un nouvel article
 */

// on a envoyé le formulaire
if(!empty($_POST)){

    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['letexte'])),ENT_QUOTES);

    // création de la requête
    $sql = "INSERT INTO article (utilisateur_id,letitre,letexte,)
            VALUES ($idutil,'$letitre','$letexte',)";
    // exécution de la requête
    mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    // création de la variable pour afficher 'article inséré'
    $article_insere = "Votre article « $letitre » est inséré, merci! ";
}