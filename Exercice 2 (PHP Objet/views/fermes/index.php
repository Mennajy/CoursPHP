<h1>Liste des Fermes</h1>


<?php

echo HtmlHelper::table(['id','nom','surface','id_adresse','id_dirigeant'],$resultats, 'fermes'); ?>
