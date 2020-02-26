<?php
require_once 'AnimalNoise.php';

class Bark implements AnimalNoise{
  public function makeNoise(){
    echo "I am barking";
  }
}
?>
