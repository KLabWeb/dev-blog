<?php

require_once 'AnimalFeeder.php';
require_once 'Cat.php';
require_once 'Dog.php';
require_once 'Panda.php';

$dog = new Dog();
$panda = new Panda();
$cat = new Cat();

$feeder = new AnimalFeeder($dog, $panda, $cat);

$feeder->feedAnimals();

?>
