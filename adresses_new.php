<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');

// Définition titre page
$titrepage="Nouvelle adresse";

// Headers html; <head> + titres
include ('parties/header.php');
//
// var_dump($_POST);

$testduformulaire=verificationformulaire (['nom', 'cp', 'ville']);
if ($testduformulaire === false) {
  echo "C'est faux";
} elseif($testduformulaire === true) {
  echo "Le formulaire est valide";
  //Traitement et enregistrement
  $sql="INSERT INTO adresses (nom, cp, ville)
  VALUES ('" . mysqli_real_escape_string($connection, $_POST['nom']) . "',
          '" . mysqli_real_escape_string($connection, $_POST['cp']) . "',
          '" . mysqli_real_escape_string($connection, $_POST['ville']) . "')";

// var_dump($sql);

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

<!--Lien vers la liste-->
<a href="adresses.php">Retour à la liste </a>

<!--Formulaire-->
<form action="adresses_new.php" method="post">
  <div class="form-group">
    <label for="nom">Adresse</label>
    <input required name="nom" type="text" id="nom" placeholder="Nom" class="form-control">
  </div>
  <div class="form-group">
    <label for="cp">Code Postal</label>
    <input required name="cp" type="text" id="cp" placeholder="Code Postal" class="form-control">
  </div>
  <div class="form-group">
    <label for="ville">Ville</label>
    <input required name="ville" type="text" id="ville" placeholder="Ville" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
endif;
include ("parties/footer.php");
 ?>
