<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonction.php');
// Définition titre page
$titrepage="Login";
$erreur=false;
$succes=false;
if (verificationformulaire(['email','password']) ===true) {
  $sql="SELECT * FROM dirigeants"
        ." WHERE email='"
        .mysqli_real_escape_string($connection,$_POST['email'])
        ."'AND mdp='"
        .mysqli_real_escape_string($connection,md5($_POST['password']))
        ."'";
      $resultats= executerRequete($connection,$sql);
      if ($resultats !==false && mysqli_num_rows($resultats)>0) {
        $utilisateur = mysqli_fetch_assoc($resultats);
        $_SESSION['utilisateur'] = $utilisateur;
        $succes=true;
      }else{
      $erreur=true;
      }
}
// Headers html; <head> + titres
include ('parties/header.php');


if($erreur === true){
  alert('danger', 'Identifiants invalides');
}elseif($erreur === false && $succes === true){
  alert('success', 'Bienvenue, ' . $utilisateur['prenom']);
}else{
  ?>
<form class="login.php" action="login.php" method="post" placeholder="email">
  <input type="email" name="email" placeholder="email" >
  <br>
  <form class="login.php" action="login.php" method="post">
    <input type="password" name="password" placeholder="Mot de passe">
    <br>
    <button type="sumbit" name="button">Connexion</button>

</form>

<?php
}
include ('parties/footer.php');?>
