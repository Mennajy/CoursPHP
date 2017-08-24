<h1>Liste des dirigeants</h1>
<?= HtmlHelper::link('leaders', 'add', 'Nouveau dirigeant') ?>
<hr>
<?php
// Les résultats sont disponibles dans la
// variable $resultats
if (mysqli_num_rows($resultats) === 0) {
    echo "Pas de résultats";
} else {
    echo HtmlHelper::table([
        'id',
        'nom',
        'prenom',
        'tel',
        'email',
        'id_adresse'
    ], $resultats, 'leaders');
}