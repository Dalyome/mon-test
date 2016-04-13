<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>connexion</title>
</head>
<body>
<h1>connexion</h1>

<form action="" name="mmm" method="POST">
    <input type="text" name="lelogin" placeholder="Votre login" required /><br/>
    <input type="password" name="lepass" placeholder="Votre PWD" required /><br/>
    <input type="submit" value="Vous connecter" /><br/>

</form>
<?php
if(isset($erreur)) echo "<h3>$erreur</h3>";
?>
</body>
</html>