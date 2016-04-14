<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $titre ?></title>
    <script src="Vues/js/monjs.js"></script>
</head>
<body>
<h1><?= $titre ?></h1>
<?php

// appel du menu
include("Vues/menu.inc.php");

if(isset($vide)){
  echo "<h2>$vide</h2>";
}else{
  foreach($tab_article AS $aff){
    ?>
<h3><?=$aff['titre']?></h3>
    <h4>Le <?=$aff['ladate']?> par <?=$aff['lelogin']?></h4>
    <p><?=$aff['letexte']?></p>

      <?php
      if($_SESSION['supprimetous'] || $_SESSION['supprime']){
          echo "<a href='?modifid=".$aff['id']."'><img src='Vues/img/editer.gif' alt='modifier' /></a> ";
      }
      if($_SESSION['supprime']){
          ?>
          <img src='Vues/img/delete.png' onclick="confirmDelete('<?=$aff['letitre']?>', <?=$aff['id']?>)" alt='Supprimer' />
          <?php
      }elseif($perm_sup && $aff['idauteur']==$_SESSION['idutil']){
          ?>
          <img src='Vues/img/delete.png' onclick="confirmDelete('<?=$aff['letitre']?>', <?=$aff['id']?>)" alt='Supprimer' />
          <?php
      }
      ?>
      <hr/>
<?php
  }
}
?>
</body>
</html>