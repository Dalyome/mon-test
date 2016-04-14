<html>
<head>
    <meta charset="UTF-8">
<title>Nouvel article</title>
</head>
<body>
<h1>Nouvel article</h1>
<h2>Bienvenue <?=$_SESSION['login']?></h2>
<?php
require "vues/menu.inc.php";


if(isset($article_insere)){
    echo "<h3>$article_insere</h3>";
}else{
?>
<form method="post" action="" name="lulu">
    <input type="text" name="letitre" placeholder="Votre titre" required/><br/>
    <input type="date" name="ladate" required/><br/>
    <textarea name="letexte" required placeholder="Votre texte"></textarea><br/>


    <?php

    foreach ($tab_rub as $val) {
        ?>
        <?= $val['lintitule'] ?>  <input name="rub[]" type="checkbox" value='<?= $val['id'] ?>'/> /
        <?php
    }

    }

    echo '<input type="submit" value="Envoyer" /><br/>';
    ?>




</form>
</body>
</html>
