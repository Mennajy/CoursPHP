<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');
// Définition titre page
$titrepage="Liste des poulets";
// Headers html; <head> + titres
include ('parties/header.php');

$ordreChamp = 'id';
$ordreDirection = 'ASC';
$champsTriables= ['id', 'id_ferme', 'race'];

$ordreDeTri = testOrderBy($champsTriables, 'nom', 'ASC');
$ordreChamp = $ordreDeTri[0];
$ordreDirection = $ordreDeTri[1];

$sql = "SELECT * FROM poulets ORDER BY $ordreChamp $ordreDirection";

$resultats = mysqli_query($connection, $sql);
?>

<!--Lien du formulaire-->
<a href="poulets_new.php">Nouveau poulet</a>

    <table class="table table-condensed table-striped table-hover">
      <thead>
        <tr>
          <th>Action
          </th>
          <th>ID
		  <a href="poulets.php?order=id&amp;direction=ASC">+</a>
		  <a href="poulets.php?order=id&amp;direction=DESC">-</a>
		  </th>
          <th>ID_FERME
		  <a href="poulets.php?order=id_ferme&amp;direction=ASC">+</a>
		  <a href="poulets.php?order=id_ferme&amp;direction=DESC">-</a>
		  </th>
          <th>RACE
		  <a href="poulets.php?order=race&amp;direction=ASC">+</a>
		  <a href="poulets.php?order=race&amp;direction=DESC">-</a>
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
            <td><span><a href="poulets_delete.php?id=<?= $ligne['id']?>" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-trash"></span>
            </a>
              <a href="poulets_edit.php?id=<?= $ligne['id']?>" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-pencil"></span>
              </a>
            </td>
            <td><?= $ligne['id'] ?></td>
            <td><?= $ligne['id_ferme'] ?></td>
            <td><?= $ligne['race'] ?></td>
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
