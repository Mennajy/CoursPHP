<?php
use Studio321\Classes\HtmlHelper;
?>
<h1>Liste des Employes</h1>
<?= HtmlHelper::link('addresses', 'add', 'Nouvelle adresse') ?>
<hr>
<?php
// Les résultats sont disponibles dans la
// variable $resultats
if (count($resultats) === 0) {
    echo "Pas de résultats";
} else {
    echo HtmlHelper::table(['id', 'nom', 'prenom', 'id_adresse','id_ferme'], $resultats, 'employes');
}
