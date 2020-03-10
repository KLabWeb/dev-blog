<?php

require_once 'Animal.php';

class Dog implements Animal{
  public function eat(){
    echo "Dog is eating kibble\n";
  }
}

?>
