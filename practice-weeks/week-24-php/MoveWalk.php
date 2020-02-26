<?php
require_once 'AnimalMove.php';

class MoveWalk implements AnimalMove{
  public function move(){
    echo "I am walking";
  }
}
?>
