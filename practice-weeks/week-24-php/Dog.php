<?php
require_once 'Animal.php';
require_once 'Bark.php';
require_once 'MoveWalk.php';

class Dog extends Animal{

  public function __construct($noise=null, $move=null){
    $this->set_move($noise == null ? new MoveWalk() : $move);
    $this->set_noise($move == null ? new Bark() : $noise);
  }

}
?>
