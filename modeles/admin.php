<?php
/**
 * Modèles de l'admin suivant les permissions
 */


$menu_admin = "<ul>";
// on peut insérer
if($_SESSION["ecrit"]){
    $menu_admin .= "<li><a href='?insert'>Ecrire un article</a> </li>";
}
// on peut modifier les articles de tout le monde ou juste les siens
if($_SESSION["modifie"] ||$_SESSION["supprime"]){
    // ET on peut supprimer les articles de tout le monde ou juste les siens


    if($_SESSION["modifietous"] || $_SESSION["supprimetous"]){
        $ajoute = " ou Supprimer ";
    }else{
        $ajoute = "";
    }
    $menu_admin .= "<li><a href='?modif'>Modifier $ajoute un article</a> </li>";
}


$menu_admin .= "</ul>";