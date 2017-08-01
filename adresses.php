<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');
// Définition titre page
$titrepage="Liste des adresses";
// Headers html; <head> + titres
include ('parties/header.php');

$ordreChamp = 'nom';
$ordreDirection = 'ASC';
$champsTriables= ['id', 'nom', 'cp', 'ville'];

$ordreDeTri = testOrderBy($champsTriables, 'nom', 'ASC');
$ordreChamp = $ordreDeTri[0];
$ordreDirection = $ordreDeTri[1];

$sql = "SELECT * FROM adresses ORDER BY $ordreChamp $ordreDirection";

$resultats = mysqli_query($connection, $sql);
?>

<!--Lien du formulaire-->
<a href="adresses_new.php">Nouvelle adresse</a>

    <table class="table table-condensed table-striped table-hover">
      <thead>
        <tr>
          <th>ID
		  <a href="adresses.php?order=id&amp;direction=ASC">+</a>
		  <a href="adresses.php?order=id&amp;direction=DESC">-</a>
		  </th>
          <th>NOM
		  <a href="adresses.php?order=nom&amp;direction=ASC">+</a>
		  <a href="adresses.php?order=nom&amp;direction=DESC">-</a>
		  </th>
          <th>CODE POSTAL
		  <a href="adresses.php?order=cp&amp;direction=ASC">+</a>
		  <a href="adresses.php?order=cp&amp;direction=DESC">-</a>
		  </th>
          <th>VILLE
		  <a href="adresses.php?order=ville&amp;direction=ASC">+</a>
          <a href="adresses.php?order=ville&amp;direction=DESC">-</a>
		  </th>
        </tr>
      </thead>
      <tbody>

        <?php

        if(mysqli_num_rows($resultats) === 0):
          echo "Il n'y a pas d'enregistrements";
        else:
          // Affichage des lignes de résultat
          while($ligne = mysqli_fetch_assoc($resultats)):
            //var_dump($ligne);
          ?>
          <tr>
            <td><?= $ligne['id'] ?></td>
            <td><?= $ligne['nom'] ?></td>
            <td><?= $ligne['cp'] ?></td>
            <td><?= $ligne['ville'] ?></td>
          </tr>
          <?php
          endwhile;
        endif;
        ?>
      </tbody>
    </table>

<?php
include ("parties/footer.php");
 ?>
