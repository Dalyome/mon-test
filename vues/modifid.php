<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modifier un article</title>
</head>
<body>
<h1>Modifier un article</h1>
<?php

// appel du menu
include("Vues/menu.inc.php");

// si article non modifié, affichage du formulaire
if(!isset($article_modif)) {
    ?>
    <form action="" name="mmm" method="POST">
        <input type="text" name="letitre" value="<?=$tab_modif['titre']?>" required/><br/>
        <textarea name="letexte" required ><?=$tab_modif['texte']?></textarea><br/>
        <input type="hidden" name="utid" value="<?=$tab_modif['idutil']?>"/>
        <input type="submit" value="Modifier"/><br/>

    </form>
    <?php
}else{
    echo "<h3>$article_modif</h3>";
    ?>
<script>
    function redirige(chemin){
        window.location.href=chemin;
    }
    setTimeout("redirige('./')", 5000);
</script>
<?php
}
?>
</body>
</html>