<?php
class Caribou{
  protected static $nbCaribou =0;

  public function __construct(){
    $this->nbCaribou++;
  }
  public static function getNb(){
    return self::$nbCaribou ;
}

for ($i=0; $i <100 ; $i++) {
  $test = new Caribou();
}

}
echo Caribou::getNb();
 ?>
