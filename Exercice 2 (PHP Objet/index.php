<?php
/*
 * Chargement des différents fichiers nécessaires
 */
require_once 'includes.php';

/*
 * Valeurs par défaut
 */
$controleur = 'pages';
$action = 'home';

/*
 * Choix du controleur
 */
if (isset($_GET['c']) && !empty($_GET['c'])) {
    $controleur = $_GET['c'];
}
/*
 * Choix de l'action
 */
if (isset($_GET['a']) && !empty($_GET['a'])) {
    $action = $_GET['a'];
}

//echo "Controleur : $controleur, Action : $action";

/*
 * Détermination du "nom" du controleur que l'on veut charger:
 */
$nomControleur = ucfirst($controleur) . 'Controller';
$fichierControleur = 'controllers/' . $nomControleur . '.php';
//echo "<p>On veut charger $nomControleur</p>";

/*
 * Tentative de chargement du controlleur
 */
if (file_exists($fichierControleur)) {
    require_once($fichierControleur);

    $controleurFinal = new $nomControleur();

    if (method_exists($controleurFinal, $action) && !in_array($action,$controleurFinal->actionsBlacklist)){
//        echo "Super, la méthode existe.";

        $resultats = $controleurFinal->$action();

        /*
         * On charge la page de vue:
         */
        $fichierVue = 'views/'
            . $controleur
            . '/'
            . $action . '.php';

        if (file_exists($fichierVue)) {
            /*
             * On affiche l'ensemble
             */
            include 'views/header.php';
            include $fichierVue;
            include 'views/footer.php';
        } else {
            die('500 - Vue non trouvée (' . $fichierVue . ')');
        }
    } else {
        die('404 - Action introuvable ('
            . $nomControleur
            . '::'
            . $action . ')');
    }

} else {
    die('404 - Controleur introuvable ('
        . $fichierControleur
        . ')');
}












//
