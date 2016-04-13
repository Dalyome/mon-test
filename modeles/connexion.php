<?php
/**
 * Created by PhpStorm.
 * Modèle pour connexion
 */
if(isset($_POST['lelogin'])){
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    $lepass = htmlspecialchars(strip_tags(trim($_POST['lepass'])),ENT_QUOTES);
    $sql = "SELECT u.id AS idutil, u.lelogin,u.lepass,u.lemail,
            d.*
              FROM util u
            INNER JOIN droit d
            ON u.droit_id = d.id
              WHERE u.lelogin = '$lelogin' AND u.lepass = '$lepass'
    ;
    ";
    $recup_util = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));
    // si on a un résultat (1)
    if(mysqli_num_rows($recup_util)){
        // on met le résultat dans un tableau associatif
        $util = mysqli_fetch_assoc($recup_util);
        // on ouvre la connexion à la session
        $_SESSION["clef"]= session_id();
        // on y rajoute les infos importantes
        $_SESSION["lelogin"]= $util['lelogin'];
        $_SESSION["idutil"]= $util['idutil'];

        $_SESSION["lintitule"]= $util['lintitule'];
        $_SESSION["ecriture"]= $util['ecrit'];
        $_SESSION["modif"]= $util['modifie'];
        $_SESSION["modif_tous"]= $util['modifie_tous'];
        $_SESSION["sup"]= $util['sup'];
        $_SESSION["sup_tous"]= $util['sup_tous'];

        // redirection vers l'accueil
        header("Location: ?admin");

    }else{
        $erreur = "Login ou mot de passe non valides";
    }
}else{

}
