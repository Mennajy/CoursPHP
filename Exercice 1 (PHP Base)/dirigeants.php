<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');

// Définition titre page
$titrepage="Liste des dirigeants";
// Headers html; <head> + titres
include ('parties/header.php');
$champsTriables= ['id', 'nom', 'prenom', 'mail', 'tel', 'id_adresse','nb_fermes','mdp'];

$ordreDeTri = testOrderBy($champsTriables, 'nom', 'ASC');
$ordreChamp = $ordreDeTri[0];
$ordreDirection = $ordreDeTri[1];

// $sql = "SELECT * FROM dirigeants ORDER BY $ordreChamp $ordreDirection";


$sql = "SELECT d.id, d.nom, d.prenom, d.id_adresse, d.tel, d.email, d.mdp, count(f.id) nb_fermes
        FROM dirigeants d
        LEFT JOIN fermes f ON d.id=f.id_dirigeant
        GROUP BY d.id
        ORDER BY $ordreChamp $ordreDirection
        ";

        $resultats = mysqli_query($connection, $sql);
        if (!$resultats) {
          echo "ERREUR:"; mysqli_error($connection);
          die;
        }
?>

<!--Lien du formulaire-->
<a href="dirigeants_new.php">Nouveau dirigeant</a>

<table class="table table-condensed table-striped table-hover">
  <thead>
    <tr>
      <th>Actions
      </th>
      <th>ID
        <a href="dirigeants.php?order=id&amp;direction=ASC">+</a>
        <a href="dirigeants.php?order=id&amp;direction=DESC">-</a>
      </th>
      <th>NOM
        <a href="dirigeants.php?order=nom&amp;direction=ASC">+</a>
        <a href="dirigeants.php?order=nom&amp;direction=DESC">-</a>
      </th>
      <th>PRENOM
        <a href="dirigeants.php?order=prenom&amp;direction=ASC">+</a>
        <a href="dirigeants.php?order=prenom&amp;direction=DESC">-</a>
      </th>
      <th>EMAIL
        <a href="dirigeants.php?order=email&amp;direction=ASC">+</a>
        <a href="dirigeants.php?order=email&amp;direction=DESC">-</a>
      </th>
      <th>TEL
        <a href="dirigeants.php?order=tel&amp;direction=ASC">+</a>
        <a href="dirigeants.php?order=tel&amp;direction=DESC">-</a>
       </th>
       <th>ID_ADRESSE
         <a href="dirigeants.php?order=id_adresse&amp;direction=ASC">+</a>
         <a href="dirigeants.php?order=id_adresse&amp;direction=DESC">-</a>
       </th>
       <th>NB_FERMES
         <a href="dirigeants.php?order=&amp;direction=ASC">+</a>
         <a href="dirigeants.php?order=&amp;direction=DESC">-</a>
       </th>
       <th>mdp
         <a href="dirigeants.php?order=&amp;direction=ASC">+</a>
         <a href="dirigeants.php?order=&amp;direction=DESC">-</a>
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
  <td>
    <?php
    if($ligne['nb_fermes'] === "0"): ?>
    <a href="dirigeants_delete.php?id=<?= $ligne['id']?>" class="btn btn-link btn-xs">
  <span class="glyphicon glyphicon-trash"></span>
  </a>
<?php endif; ?>
    <a href="dirigeants_edit.php?id=<?= $ligne['id']?>" class="btn btn-link btn-xs">
  <span class="glyphicon glyphicon-pencil"></span>
    </a>
  </td>
  <td><?= $ligne['id'] ?></td>
  <td><?= $ligne['nom'] ?></td>
  <td><?= $ligne['prenom'] ?></td>
  <td><?= $ligne['email'] ?></td>
  <td><?= $ligne['tel'] ?></td>
  <td><?= $ligne['id_adresse'] ?></td>
  <td><?= $ligne['nb_fermes'] ?></td>
  <td><?= $ligne['mdp'] ?></td>
</tr>

<?php
  endwhile;
  endif;
?>

</tbody> </table>

<?php
include ("parties/footer.php");
 ?>
