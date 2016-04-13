<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Les articles</title>
    <script src="Vues/js/monjs.js"></script>
</head>
<body>
<h1>Les articles</h1>
<?php

// appel du menu
include("vues/menuadmin.php");

if(isset($vide)){
  echo "<h2>$vide</h2>";
}else{
  foreach($tab_article AS $aff){
    ?>
<h3><?=$aff['letitre']?></h3>
    <h4>Le <?=$aff['ladate']?> par <?=$aff['lelogin']?></h4>
    <p><?=$aff['lemessage']?></p>

      <?php
      if($_SESSION['modif'] || $_SESSION['modif_tous']){
          echo "<a href='?modifid=".$aff['id']."'><img src='vues/img/editer.gif' alt='modifier' /></a> ";
      }
      if($_SESSION['sup'] || $_SESSION['sup_tous']){
          ?>
          <img src='vues/img/delete.png' onclick="confirmDelete('<?=$aff['letitre']?>', <?=$aff['id']?>)" alt='Supprimer' />
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