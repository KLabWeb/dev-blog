<?php

class AnimalFeeder{
  private $animals = [];

  public function __construct(){
    $args = func_get_args();  //allows any num of animals to be passed in

    foreach($args as $animal){
      $this->animals[] = $animal;
    }

    print_r($this->animals);
  }

  public function feedAnimals(){

    foreach($this->animals as $animal){
        $animal->eat();
    }
  }

}

?>
