<?php
require_once 'includes.php';

// Défault
$controller='Pages';
$action='Home';

// <!-- Choix du Controlleur -->

if(isset($_GET['C']) && !empty($_GET['c'])){
  $controller=$_GET['c'];
}

// <!-- Choix de l'action -->

if(isset($_GET['a']) && !empty($_GET['a'])){
  $controller=$_GET['a'];
}

echo "Controlleur : $controller, Action : $action";

// Création du "nom" du controlleur que l'on veut charger:

$ControllerName = ucfirst($controller).'Controller';
$fichierControlleur = 'controllers/'. $ControllerName.'.php';
echo "<p> On veut charger $ControllerName</p>";

if (file_exists($fichierControlleur)) {
  require_once ($fichierControlleur);
}else {
  die('404 - Controleur Introuvable ('.$fichierControlleur.')');
}















?>
