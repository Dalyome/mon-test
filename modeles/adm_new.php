<?php
// si on a pas le droit d'écrire un article
if($_SESSION['ecrit']==false){
    // redirection
    header("Location: ./");
}

// si on a envoyé pas envoyé le formulaire

if(empty($_POST)) {
    // on sélectionne tous les utilisateurs qui peuvent écrire un article
    $sql = "SELECT u.id, u.lelogin
            FROM util u
            INNER JOIN droit d
            ON u.droit_id = d.id
            INNER JOIN article a
            ON u.id=a.util_id
            INNER JOIN article_has_rubrique ahr
            ON a.id= ahr.article_id
            INNER JOIN rubrique r
            ON r.id = ahr.rubrique_id
            WHERE ecrit=1;";

    $recup_util = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    $tab_util = mysqli_fetch_all($recup_util,MYSQLI_ASSOC);
    //var_dump($tab_util);


   $rub = "SELECT * FROM rubrique ORDER BY lintitule;";

    $recup_rub = mysqli_query($mysqli,$rub)or die(mysqli_error($mysqli));

    $tab_rub = mysqli_fetch_all($recup_rub,MYSQLI_ASSOC);

    // formulaire envoyé
}else{

    $utilid = $_SESSION['idutil'];
    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['letexte'])),ENT_QUOTES);
    $date = $_POST['ladate'];

    $sql = "INSERT INTO article (letitre,ladesc,ladate,util_id)
            VALUES ('$letitre','$letexte','$date',$utilid)";
    // exécution de la requête
    mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));
    $idarticle = mysqli_insert_id($mysqli);

    $sql = "INSERT INTO article_has_rubrique (article_id, rubrique_id) VALUES ";
    foreach($_POST['rub'] as $rub){
        $sql .= "($idarticle,$rub),";
    }
    $sql = substr($sql, 0, -1);

    mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    // création de la variable pour afficher 'article inséré'
    $article_insere = "Votre article « $letitre » est inséré, merci! ";
}
