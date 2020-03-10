<?php
require_once 'CampaignSetup.php';
require_once 'AdminOwnerBuilder.php';

class AdvancedCampaignSetup extends CampaignSetup{
  public function __construct(){
    $this->createOwnerBuilder();
  }

  protected function createOwnerBuilder(){
    $this->ownerBuilder = new AdminOwnerBuilder();
  }
}
?>
