<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');

// Définition titre page
$titrepage="Nouvelle ferme";

// Headers html; <head> + titres
include ('parties/header.php');

var_dump($_POST);

$testduformulaire=verificationformulaire (["nom", "surface", "id_ferme", "id_adresse"]);
if ($testduformulaire === false) {
  echo "C'est faux";
} elseif($testduformulaire === true) {
  echo "Le formulaire est valide";
  //Traitement et enregistrement
  $sql="INSERT INTO adresses ('nom', 'surface')
  VALUES ('" . mysqli_real_escape_string($connection, $_POST['nom']) . "',
          '" . mysqli_real_escape_string($connection, $_POST['surface']) . "')
          '" . mysqli_real_escape_string($connection, $_POST['id_adresse']) . "')
          '" . mysqli_real_escape_string($connection, $_POST['id_dirigeant']) . "')";

var_dump($sql);

  if (mysqli_query($connection, $sql)) {
    echo '<div class="alert alert-success">"L\'enregistrement a bien été effectué"</div>';
  }else {
    echo '<div class="alert alert-danger">
    L\'enregistrement a échoué.';
    echo 'mysqli_error'($connection);
    echo '</div>';
  }
    echo '<a href="adresses.php">Retours à la liste</a>';
    echo '<a href="adresses_new.php">Ajouter une nouvelle adresse</a>';

} else {
  echo "Le formulaire n'a pas été envoyé";
}

if ($testduformulaire !== true) :

?>
<a href="dirigeant.php">Retour à la liste </a>
<form action="dirigeants_new.php" method="post">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input required name="nom" type="text" id="nom" placeholder="Nom" class="form-control">
  </div>
  <div class="form-group">
    <label for="surface">Surface</label>
    <input required name="surface" type="text" id="surface" placeholder="Surface" class="form-control">
  </div>
  <div class="form-group">
    <label for="id_adresse">Id_adresse</label>
    <input required name="id_adresse" type="text" id="id_adresse" placeholder="Id_adresse" class="form-control">
  </div>
  <div class="form-group">
    <label for="id_dirigeant">id_dirigeant</label>
    <input required name="id_dirigeant" type="text" id="id_dirigeant" placeholder="id_dirigeant" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
endif;
include ("parties/footer.php");
 ?>
