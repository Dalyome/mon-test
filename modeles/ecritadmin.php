<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 12/04/2016
 * Time: 14:10
 */

// si on ne peut pas écrire un article
if (!$_SESSION['ecriture']) {
    header("Location: ./");
}

// sélection des rubriques
$sql = "SELECT * FROM rubrique ORDER BY id ASC;";
$recup_rub = mysqli_query($mysqli, $sql);
$les_rub = mysqli_fetch_all($recup_rub, MYSQLI_ASSOC);

// form envoyé
if (isset($_POST['letitre'])) {
// récupération de l'id utilisateur
    $idutil = $_SESSION['idutil'];
//var_dump($_POST);
    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])), ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['letexte'])), ENT_QUOTES);

    $sql = "INSERT INTO article (letitre,lemessage,util_id) VALUES ('$letitre','$letexte',$idutil)";
    $met = mysqli_query($mysqli, $sql);

    if (isset($_POST['rub'])) {
        $idarticle = mysqli_insert_id($mysqli);
        $sql = "INSERT INTO article_has_rubrique (article_id, rubrique_id) VALUES ";
        foreach($_POST['rub'] as $valeur){
            $sql .= "($idarticle, $valeur),";
        }
        $sql = substr($sql,0,-1);
        //var_dump($sql);
        $met = mysqli_query($mysqli, $sql);
    }

}

