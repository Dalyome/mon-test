<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 12/04/2016
 * Time: 15:02
 */


// 2 choix, on affiche ses propres articles, ou ceux des autres

// on peut modifier ou supprimer ceux des autres
if($_SESSION['sup_tous']){
    $where = "";
}elseif($_SESSION['sup']){
    $where = "AND util_id = ".$_SESSION['idutil'];
}else{
    header("Location: ./");
}

// suppression d'un article



$sql = "DELETE FROM article 
          WHERE id = $idsup
          $where
          
       
";

$recup_article = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));
