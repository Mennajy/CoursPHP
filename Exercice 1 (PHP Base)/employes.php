<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');
// Définition titre page
$titrepage="Liste des employés";
// Headers html; <head> + titres
include ('parties/header.php');

$ordreChamp = 'nom';
$ordreDirection = 'ASC';
$champsTriables= ['id', 'nom', 'prenom', 'id_adresse', 'id_ferme'];

$ordreDeTri = testOrderBy($champsTriables, 'nom', 'ASC');
$ordreChamp = $ordreDeTri[0];
$ordreDirection = $ordreDeTri[1];

$sql = "SELECT * FROM employes ORDER BY $ordreChamp $ordreDirection";

$resultats = mysqli_query($connection, $sql);
?>

<!--Lien du formulaire-->
<a href="employes_new.php">Nouvel employé</a>

    <table class="table table-condensed table-striped table-hover">
      <thead>
        <tr>
          <th>Actions</th>
          <th>ID
		  <a href="employes.php?order=id&amp;direction=ASC">+</a>
		  <a href="employes.php?order=id&amp;direction=DESC">-</a>
		  </th>
          <th>NOM
		  <a href="employes.php?order=nom&amp;direction=ASC">+</a>
		  <a href="employes.php?order=nom&amp;direction=DESC">-</a>
		  </th>
          <th>PRENOM
		  <a href="employes.php?order=prenom&amp;direction=ASC">+</a>
		  <a href="employes.php?order=prenom&amp;direction=DESC">-</a>
		  </th>
          <th>ID_ADRESSE
		  <a href="employes.php?order=id_adresse&amp;direction=ASC">+</a>
          <a href="employes.php?order=id_adresse&amp;direction=DESC">-</a>
		  </th>
        <th>ID_FERME
          <a href="employes.php?order=id_ferme&amp;direction=ASC">+</a>
          <a href="employes.php?order=id_ferme&amp;direction=DESC">-</a>
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
            <td><span><a href="employes_delete.php?id=<?= $ligne['id']?>" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-trash"></span>
            </a>
              <a href="employes_edit.php?id=<?= $ligne['id']?>" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-pencil"></span>
              </a>
            </td>
            <td><?= $ligne['id'] ?></td>
            <td><?= $ligne['nom'] ?></td>
            <td><?= $ligne['prenom'] ?></td>
            <td><?= $ligne['id_adresse'] ?></td>
            <td><?= $ligne['id_ferme'] ?></td>
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
