<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');

// Définition titre page
$titrepage="Edition d'un employé";

// Headers html; <head> + titres
include ('parties/header.php');

// var_dump($_POST);
$afficherFormulaire = false;

if (isset($_POST['id']) && !empty($_POST['id'])) {
  // On traite le formulaire
  $testduformulaire=(['nom','prenom','id_adresse','id_ferme']);
  if($testduformulaire===false){
    echo "Le Formulaire est incomplet";;
  } elseif ($testduformulaire === true) {
    $sql ="UPDATE dirigeants SET
            '" . mysqli_real_escape_string($_POST['nom']) . "',
            '" . mysqli_real_escape_string($_POST['prenom']) . "',
            '" . mysqli_real_escape_string($_POST['id_adresse']) . "',
            '" . mysqli_real_escape_string($_POST['id_ferme']) . "',
              WHERE id=" .mysqli_real_escape_string($_POST['id_ferme']);
  }
}

// Est ce qu'on a un id passé dans la query string ?
// On met a false par défault et on ne changera que si c'st bon
elseif (isset($_GET['id']) && !empty($_GET['id'])) {
  // Requete pour selectionner le dirigeant
  $sql="SELECT * FROM employes WHERE id="
    .mysqli_real_escape_string($connection, $_GET['id']);
    // Est ce que la requete a échoué
  if(!$resultats =mysqli_query($connection,$sql)){
    echo "Erreur SQL :" .mysqli_error($connection);
  } else {
    if (mysqli_num_rows($resultats)) {
      $dirigeant =mysqli_fetch_assoc($resultats);
      $afficherFormulaire=true;
      var_dump($dirigeant);
    } else {
      echo "Cet employé n'existe pas.";
    }
  }
} else {
  echo "Pas d'id";
}

// $testduformulaire=verificationformulaire (['nom', 'prenom', 'email', 'tel', 'id_adresse']);
// if ($testduformulaire === false) {
//   echo "C'est faux";
// } elseif($testduformulaire === true) {
//   echo "Le formulaire est valide";
//   //Traitement et enregistrement
//   $sql="INSERT INTO dirigeants (nom, prenom, email, tel, id_adresse)
//   VALUES ('" . mysqli_real_escape_string($connection, $_POST['nom']) . "',
//           '" . mysqli_real_escape_string($connection, $_POST['prenom']) . "',
//           '" . mysqli_real_escape_string($connection, $_POST['email']) . "',
//           '" . mysqli_real_escape_string($connection, $_POST['tel']) . "',
//           '" . mysqli_real_escape_string($connection, $_POST['id_adresse']) . "')";
//
// var_dump($sql);
//
//   if (mysqli_query($connection, $sql)) {
//     echo '<div class="alert alert-success">"L\'enregistrement a bien été effectué"</div>';
//   }else {
//     echo '<div class="alert alert-danger">
//     L\'enregistrement a échoué.';
//     echo 'mysqli_error'($connection);
//     echo '</div>';
//   }
//     echo '<a href="adresses.php">Retours à la liste</a>';
//     echo '<a href="adresses_new.php">Ajouter une nouvelle adresse</a>';
//
// } else {
//   echo "Le formulaire n'a pas été envoyé";
// }
//
// if ($testduformulaire !== true) :
//
  $sql="SELECT * FROM adresses";
  if(!$adresses=mysqli_query($connection, $sql)){
    echo '<div class="alert alert-danger">Une erreur est survenue'
    . mysqli_error($connection)
    . '</div>';
  }
//   else:
//
//
if ($afficherFormulaire === true) :
?>
<a href="employes.php">Retour à la liste </a>
<form action="employes_edit.php" method="post">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input value="<?=$dirigeant['nom']?>" required name="nom" type="text" id="nom" placeholder="Nom" class="form-control">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input value="<?=$dirigeant['prenom']?>" required name="prenom" type="text" id="nom" placeholder="Prénom" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">id_adresse</label>
    <input value="<?=$dirigeant['id_adresse']?>" required name="email" type="text" id="email" placeholder="Email" class="form-control">
  </div>
  <div class="form-group">
    <label for="tel">id_ferme</label>
    <input value="<?=$dirigeant['id_ferme']?>" required name="tel" type="text" id="tel" placeholder="Téléphone" class="form-control">
  </div>

<!--Menu déroulant-->
  <div class="form-group">
    <label for="id_adresse">Id_adresse</label>
    <select name="id_adresse" id="id_adresse" class="form-control">
      <?php
        while ($ligne = mysqli_fetch_assoc($adresses)) :
          echo '<option value="'.$ligne['id'].'">'
          . $ligne['id'] . ' '
          . $ligne['nom'] . ' '
          . $ligne['prenom'] . ' '
          . $ligne['id_adresse'] . ' '
          . $ligne['id_ferme'] . ' '
          .'</option>';
        endwhile;
       ?>
    </select>
  </div>
  <input type="hidden" name="id" value="<?=$dirigeant['id']?>">
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
   endif;
// endif;
include ("parties/footer.php");
 ?>
