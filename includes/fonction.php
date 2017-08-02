<?php

function testOrderBy($listeDeChamps, $champParDefaut, $directionParDefaut){
  if(isset($_GET['order'])){
    if(in_array($_GET['order'], $listeDeChamps)){
      $ordreChamp = $_GET['order'];
    }else{
      echo "<div class='alert alert-danger'>Je ne connais pas ce champ, désolé.</div>";
    }
   }

   if(isset($_GET['direction'])){
     if(in_array($_GET['direction'], ['ASC', 'DESC'])){
       $directionParDefaut = $_GET['direction'];
     }else{
       echo "<div class='alert alert-danger'>Je ne connais pas cet ordre.</div>";
     }
    }

    return [$champParDefaut, $directionParDefaut]; }

function tableheaders ($liste){
  // ["id" => "ID"]
  $out ="";
  foreach ($liste as $cle => $valeur) {
    $out.="<th>";
    $out.=$valeur;
    $out.="<a href=\"?order=$cle&amp;direction=ASC\">+</a>";
    $out.="<a href=\"?order=$cle&amp;direction=ASC\">+</a>";
    $out.="</th>";
  }
  return $out;
}

// [champ1, champ2...]
function verificationformulaire ($champs){
  if (count($_POST)>0){
  for($i=0; $i<count($champs); $i++){
    if(
      !isset($_POST[$champs[$i]])
      || empty($_POST[$champs[$i]])
    ){
      var_dump([$champs[$i], $_POST[$champs[$i]]]);
      die();
      return false;
    }
  }
  return true;
}
return null;
}

function alert($type, $message){
  echo "<div class=\"alert alert-$type\">$message</div>";
}
