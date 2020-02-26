<?php

abstract class Animal{

  //unique behaviors, set at constrution or via setter methods
  protected $moveBehavior;
  protected $noiseBehavior;

  protected function set_move($moveObject){
    $this->moveBehavior = $moveObject;
  }

  protected function set_noise($noiseObject){
    $this->noiseBehavior = $noiseObject;
  }

  //concrete function shared across all classes
  public function eat(){
    echo "Animal is eating";
  }

  //wrappers, seperating implementation of class from behaviors
  public function makeNoise(){
    $this->noiseBehavior->makeNoise();
  }

  public function move(){
    $this->moveBehavior->move();
  }

}
?>
