<h1>Liste des adresses</h1>
<?=HtmlHelper::link('addresses','add','Nouvelle adresse') ?>
<hr>
<?php

if (mysqli_num_rows($resultats) === 0) {
  echo "Pas de résultats";
} else {
  echo HtmlHelper::table(['id','nom','cp','ville'],  $resultats,'addresses');
}

?>
