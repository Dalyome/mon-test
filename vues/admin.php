<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Administration</title>
</head>
<body>
<h1>Administration</h1>
<?php

// appel du menu
include("Vues/menu.inc.php");

// liste des liens supplémentaires suivant les permissions
echo $menu_admin;
?>

</body>
</html>