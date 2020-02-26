<?php
require_once 'AnimalMove.php';

class MoveFly implements AnimalMove{
  public function move(){
    echo "I am Flying";
  }
}
?>
