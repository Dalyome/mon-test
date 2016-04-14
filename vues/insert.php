<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un nouvel article</title>
</head>
<body>
<h1>Ajouter un nouvel article</h1>
<?php

// appel du menu
include("Vues/menu.inc.php");

// si article non inséré, affichage du formulaire
if(!isset($article_insere)) {
    ?>
    <form action="" name="mmm" method="POST">
        <input type="text" name="letitre" placeholder="Votre titre" required/><br/>
        <textarea name="letexte" required placeholder="Votre texte"></textarea><br/>


        <input type="submit" value="Insérer"/><br/>

    </form>
    <?php
}else{
    echo "<h3>$article_insere</h3>";
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