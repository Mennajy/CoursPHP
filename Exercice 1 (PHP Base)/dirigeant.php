<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');

// Définition titre page
$titrepage = "Profil d'un dirigeant";

// Headers html: <head> + titres
include('parties/header.php');
var_dump($_SESSION);
$idDirigeant = userInfo('id');

$sql = "SELECT * from user WHERE id= "
          . mysqli_real_escape_string($connection, $idDirigeant);

$fermes=executerRequete($connection, $sql);

?>
<h2>Fermes de <?=userInfo('prenom') ?></h2>
<ul>

<?php
while($ferme = mysqli_fetch_assoc($fermes)):
?>
  <li><?=$ferme['nom']?></li>
<?php
endwhile;
?>
</ul>
<?php
include('parties/footer.php');
