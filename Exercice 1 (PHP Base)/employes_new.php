<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');

// Définition titre page
$titrepage="Nouveau dirigeant";

// Headers html; <head> + titres
include ('parties/header.php');

var_dump($_POST);

$testduformulaire=verificationformulaire (["nom", "prenom"]);
if ($testduformulaire === false) {
  echo "C'est faux";
} elseif($testduformulaire === true) {
  echo "Le formulaire est valide";
  //Traitement et enregistrement
  $sql="INSERT INTO adresses ('nom', 'prenom', 'id_adresse', 'id_ferme')
  VALUES ('" . mysqli_real_escape_string($connection, $_POST['nom']) . "',
          '" . mysqli_real_escape_string($connection, $_POST['prenom']) . "')
          '" . mysqli_real_escape_string($connection, $_POST['id_adresse']) . "')
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
<a href="dirigeant.php">Retour à la liste </a>
<form action="dirigeants_new.php" method="post">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input required name="nom" type="text" id="nom" placeholder="Nom" class="form-control">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input required name="prenom" type="text" id="nom" placeholder="Prénom" class="form-control">
  </div>
  <div class="form-group">
    <label for="id_adresse">Id_adresse</label>
    <input required name="id_adresse" type="text" id="id_adresse" placeholder="Id_adresse" class="form-control">
  </div>
  <div class="form-group">
    <label for="id_ferme">Id_ferme</label>
    <input required name="id_ferme" type="text" id="id_ferme" placeholder="Id_ferme" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
endif;
include ("parties/footer.php");
 ?>
