<?php
/**
 * Created by PhpStorm.
 * Modèle pour insérer un nouvel article
 */

// on a envoyé le formulaire
if(!empty($_POST)&&isset($_GET['modifid'])&& ctype_digit($_GET['modifid'])){

    $modifid = (int) $_GET['modifid'];

    // récupération de l'id passé en post en champs caché
    if($_POST['utid']&&ctype_digit($_POST['utid'])) {
        $utid = (int) $_POST["utid"];
    }else{
        header("Location: ./");
    }
    // si la personne à le droit de changer l'affichage
    if($perm_visible_tous) {
        $levisible = (int) $_POST['levisible'];
    }else{
        $levisible = 0;
    }
    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['letexte'])),ENT_QUOTES);

    // création de la requête
    $sql = "UPDATE articles SET
        utilisateur_id=$utid,letitre='$letitre',
        letexte='$letexte',visible=$levisible
        WHERE id = $modifid";
    // exécution de la requête
    mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    // création de la variable pour afficher 'article modifié'
    $article_modif = "Votre article « ".$_SESSION['vieux_titre']." » est modifié, merci! ";
}

if(isset($_GET['modifid'])&& ctype_digit($_GET['modifid'])){

    $modifid = (int) $_GET['modifid'];

    // on peut modifier tous les articles
    if($perm_modif_tous) {
        $poursql = "";
    // on ne peut modifier que les siens
    }elseif($perm_modif) {
        $idutil = $_SESSION["idutil"];
        $poursql = " AND u.id = $idutil";
    }else{
        header("Location: ./");
    }
        $sql = "SELECT a.id, a.letitre, a.letexte, a.ladate, a.visible,
                u.lelogin, u.id as idutil

                FROM articles a

                INNER JOIN utilisateur u
                ON a.utilisateur_id = u.id
                WHERE a.id = $modifid
                $poursql;
                ";
        $recup_modif = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

        // si pas de résultats
        if(!mysqli_num_rows($recup_modif)){
            header("Location: ./");
        }

        $tab_modif = mysqli_fetch_assoc($recup_modif);

        $_SESSION['vieux_titre']= $tab_modif['letitre'];

}