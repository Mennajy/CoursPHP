<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');

// Définition titre page
$titrepage="Nouveau dirigeant";

// Headers html; <head> + titres
include ('parties/header.php');

// var_dump($_POST);

$testduformulaire=verificationformulaire (['nom', 'prenom', 'email', 'tel', 'id_adresse']);
if ($testduformulaire === false) {
  echo "C'est faux";
} elseif($testduformulaire === true) {
  echo "Le formulaire est valide";
  //Traitement et enregistrement
  $sql="INSERT INTO dirigeants (nom, prenom, email, tel, id_adresse)
  VALUES ('" . mysqli_real_escape_string($connection, $_POST['nom']) . "',
          '" . mysqli_real_escape_string($connection, $_POST['prenom']) . "',
          '" . mysqli_real_escape_string($connection, $_POST['email']) . "',
          '" . mysqli_real_escape_string($connection, $_POST['tel']) . "',
          '" . mysqli_real_escape_string($connection, $_POST['id_adresse']) . "')";

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

  $sql="SELECT * FROM adresses";
  if(!$adresses=mysqli_query($connection, $sql)):
    echo '<div class="alert alert-danger">Une erreur est survenue'
    . mysqli_error($connection)
    . '</div>';
  else:


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
    <label for="email">Email</label>
    <input required name="email" type="text" id="email" placeholder="Email" class="form-control">
  </div>
  <div class="form-group">
    <label for="tel">Téléphone</label>
    <input required name="tel" type="text" id="tel" placeholder="Téléphone" class="form-control">
  </div>

<!--Menu déroulant-->
  <div class="form-group">
    <label for="id_adresse">Id_adresse</label>
    <select required name="id_adresse" id="id_adresse" class="form-control">
      <?php
        while ($ligne = mysqli_fetch_assoc($adresses)) :
          echo '<option value="'.$ligne['id'].'">'
          . $ligne['nom'] . ' '
          . $ligne['cp'] . ' '
          . $ligne['ville'] . ' '
          .'</option>';
        endwhile;
       ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
  endif;
endif;
include ("parties/footer.php");
 ?>
