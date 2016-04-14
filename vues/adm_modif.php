<html>
<head>
  <meta charset="UTF-8">
  <title>Modification</title>
</head>
<body>
<h1>Modification</h1>
<h2>Bienvenue <?=$_SESSION['login']?></h2>
<?php
require "vues/menu.inc.php";


// si article non modifié, affichage du formulaire



if(isset( $article_insere)){
  echo "<h3> $article_insere</h3>";
}else{
?>
<form method="post" action="" name="lulu">
  <input type="text" name="letitre" placeholder="Votre titre" value="<?=$tab['letitre']?>" required/><br/>
  <textarea name="letexte"  required placeholder="Votre texte"><?=$tab['ladesc']?></textarea><br/>
  <?php


  echo '<input type="submit" value="Envoyer" /><br/>';
  }
  ?>
</form>
</body>
</html>
