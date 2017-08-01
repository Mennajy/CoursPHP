<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');

// Définition titre page
$titrepage="Nouveau poulet";

// Headers html; <head> + titres
include ('parties/header.php');

var_dump($_POST);

$testduformulaire=verificationformulaire (["race"]);
if ($testduformulaire === false) {
  echo "C'est faux";
} elseif($testduformulaire === true) {
  echo "Le formulaire est valide";
  //Traitement et enregistrement
  $sql="INSERT INTO adresses ('race')
  VALUES ('" . mysqli_real_escape_string($connection, $_POST['race']) . "')
          '" . mysqli_real_escape_string($connection, $_POST['id_ferme']) . "')";

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
<a href="poulets.php">Retour à la liste </a>
<form action="poulets_new.php" method="post">
  <div class="form-group">
    <label for="race">Race</label>
    <input required name="race" type="text" id="race" placeholder="Race" class="form-control">
  </div>
  <div class="form-group">
    <label for="id_ferme">Id_ferme</label>
    <input required name="id_ferme" type="text" id="id_ferme" placeholder="id_ferme" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
endif;
include ("parties/footer.php");
 ?>
