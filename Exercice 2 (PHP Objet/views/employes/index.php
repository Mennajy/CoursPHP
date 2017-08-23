<h1>Liste des Employes</h1>


<?php

echo HtmlHelper::table(['id','nom','prenom','id_adresse','id_ferme'],$resultats, 'employes'); ?>
