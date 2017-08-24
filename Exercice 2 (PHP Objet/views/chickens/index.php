<h1>Liste des poulets</h1>
<?= HtmlHelper::link('chickens', 'add', 'Nouveau poulet') ?>
<hr>
<?php
// Les résultats sont disponibles dans la
// variable $resultats
if (mysqli_num_rows($resultats) === 0) {
    echo "Pas de résultats";
} else {
    echo HtmlHelper::table([
        'id',
        'race',
        'id_ferme',
    ], $resultats, 'chickens');
}