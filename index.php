<?php
ini_set('display_errors', '1');

//ouverture de session
session_start();

// configuration
require_once "config.php";

// connexion à la db
require_once "modeles/db.php";

// controleurs qui est un contrôleur secondaire
require_once "controleurs/routeur.php";