<?php
require_once 'OwnerBuilder.php';

class AdminOwnerBuilder extends OwnerBuilder{

  private function grantAdmin($id){
    echo "Giving owner $id admin rights";
    $this->id = $id;
  }

  public function register(){
    $id = readline("Enter owner id to add:  ");
    $this->addOwner($id);

    if(readline("Grant owner admin rights? Please enter true or false:  ") == 'true')
      $this->grantAdmin($id);
  }

}
?>
