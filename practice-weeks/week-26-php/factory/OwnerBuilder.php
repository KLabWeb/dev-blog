<?php
abstract class OwnerBuilder{
  protected $id;

  protected function addOwner($id){
    echo "Adding owner id: $id\n";
    $this->id = $id;
  }

  public abstract function register();
}
?>
