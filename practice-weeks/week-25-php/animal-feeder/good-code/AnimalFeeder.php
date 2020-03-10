<?php

class AnimalFeeder{
  private $animals = [];

  public function __construct(){
    /*allows any num of animal
     to be passed in*/
    $args = func_get_args();

    foreach($args as $animal){
      $this->animals[] = $animal;
    }

    print_r($this->animals);
  }

  public function feedAnimals(){

    /*does not care about
    type of animal*/
    foreach($this->animals as $animal){
        $animal->eat();
    }
  }

}

?>
