<?php
$titre = "";
if(empty($_GET)){

    $titre = "accueil";
    require_once "modeles/accueil.php";
    include "vues/accueil.php";

}elseif(isset($_GET['deco'])){
    require_once "modeles/deco.php";

}elseif(isset($_GET['connex'])){
    require_once "modeles/connexion.php";
    require_once "vues/connexion.php";
    $titre = "connexion";

}elseif(isset($_SESSION["clef"])){
    require_once "modeles/admin.php";
    require_once "vues/admin.php";

}elseif(isset($_GET['iddesc'])&& ctype_digit($_GET['iddesc'])) {
    $iddesc = (int)$_GET['iddesc'];
    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/detail.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/detail.php";

}elseif(isset($_GET['idsec'])&& ctype_digit($_GET['idsec'])) {
    $idsec= (int)$_GET['idsec'];
    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/section.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/section.php";


}else{
    $titre = "accueil";
    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/accueil.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/accueil.php";
}
