<?php
require_once 'OwnerBuilder.php';

class StandardOwnerBuilder extends OwnerBuilder{

  public function register(){
    $id = readline("Enter owner id to add:  ");
    $pass = readline("Enter standard campaign creation password:  ");

    if($pass == 'pass182sS29exm')
      $this->addOwner($id);
    else
      throw new Exception("Bad password for standard campaign setup")
  }
}
?>
