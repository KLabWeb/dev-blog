<?php

require_once 'Animal.php';

class Panda implements Animal{
  public function eat(){
    echo "Panda is eating bamboo\n";
  }
}

?>
