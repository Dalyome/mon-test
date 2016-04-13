<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 12/04/2016
 * Time: 13:52
 */
?>
    <ul>

<?php
// si on peut écrire un article
if($_SESSION['ecriture']){
?>
    <li><a href="?ecrit">Ecrivez un article</a></li>
<?php
}
?>
        <?php
        // si on peut modifier ou supprimer ses articles et/ou ceux des autres
        if($_SESSION['modif']||
            $_SESSION['modif_tous']||
            $_SESSION['sup']||
            $_SESSION['sup_tous']){
            ?>
            <li><a href="?modsup">modifier et/ou supprimer des articles</a></li>
            <?php
        }
        ?>
        <li><a href="?deco">Déconnexion</a></li>
    </ul>