<?php

//heavy coupling to depedancies
require_once 'Cat.php';
require_once 'Dog.php';
require_once 'Panda.php';

class AnimalFeeder{
  private $dog;
  private $cat;
  private $panda;

  public function __construct(){
    //no flexibility in type of Animal
    $this->dog = new Dog();
    $this->cat = new Cat();
    $this->panda = new Panda();
  }

  public function feedAnimals(){
    //complicated structure with different eat() method for each subclass
    $this->dog->eatKibble();
    $this->cat->eatFish();
    $this->panda->eatBamboo();
  }

}

?>
