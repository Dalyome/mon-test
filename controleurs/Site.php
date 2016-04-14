<?php
// affichage de l'accueil
if (empty($_GET)) {
    require_once "modeles/accueil.php";
    require_once "vues/accueil.php";

// si on veut lire un article en entier
} elseif (isset($_GET['idarticle']) && ctype_digit($_GET['idarticle'])) {
    $idarticle = (int) $_GET['idarticle'];
    require_once "modeles/detail.php";
    require_once "vues/detail.php";

// si on veut se connecter
} elseif (isset($_GET['connex'])){
    require_once "modeles/connect.php";
    require_once "vues/connect.php";

}elseif(isset($_GET['idsec'])&& ctype_digit($_GET['idsec'])) {
    $idsec= (int)$_GET['idsec'];
    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/section.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/section.php";
}else{
    require_once "modeles/accueil.php";
    require_once "vues/accueil.php";

}

