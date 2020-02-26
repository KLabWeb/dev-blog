<?php

require_once 'Dog.php';
require_once 'Bark.php';
require_once 'MoveFly.php';

$animal = new Dog();

$animal->makeNoise();
$animal->move();

$bark = new Bark();
$fly = new MoveFly();
$another_animal = new Dog($bark, $fly);

$another_animal->makeNoise();
$another_animal->move();

$animal->eat();
$another_animal->eat();

?>
