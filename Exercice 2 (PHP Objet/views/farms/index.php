<h1>Liste des fermes</h1>
<?= HtmlHelper::link('farms', 'add', 'Nouvelle ferme') ?>
<hr>
<?php
// Les résultats sont disponibles dans la
// variable $resultats
if (mysqli_num_rows($resultats) === 0) {
    echo "Pas de résultats";
} else {
    echo HtmlHelper::table(['id', 'nom', 'surface', 'id_dirigeant', 'id_adresse'], $resultats, 'farms');
}
