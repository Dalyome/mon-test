<?php


if(!empty($_POST)){
  extract($_POST,EXTR_PREFIX_ALL, "rrr");

}



if($_SESSION['modifietous']=="1"){
  $concat="";
}elseif ($_SESSION['modifie']=="1"){
  $idutil = $_SESSION['idutil'];
  // et que l'utilisateur fait partie des auteurs de l'article
  $concat = "AND (SELECT COUNT(*) FROM article WHERE id = $idsup AND util_id = $idutil) = 1";
}else{
  header("Location: ./");
  exit();
}

$sql = "
SELECT a.id,a.letitre,a.ladesc,a.ladate from article a WHERE a.id = $idmodif
       ";
$req_article = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

$tab = mysqli_fetch_assoc($req_article);

if (!empty($_POST)){

  $utilid = $_SESSION['idutil'];
  $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
  $letexte = htmlspecialchars(strip_tags(trim($_POST['letexte'])),ENT_QUOTES);

  $sql = "UPDATE article SET
        util_id =$utilid,letitre='$letitre',
        ladesc='$letexte'
        WHERE id = $idmodif ;";
  // exécution de la requête
  mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));




  // création de la variable pour afficher 'article inséré'
  $article_insere = "Votre article « $letitre » est mdifier, merci! ";

}
// on est là}