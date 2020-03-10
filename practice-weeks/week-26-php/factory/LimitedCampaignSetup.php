<?php
require_once 'CampaignSetup.php';
require_once 'StandardOwnerBuilder.php';

class LimitedCampaignSetup extends CampaignSetup{
  public function __construct(){
    $this->createOwnerBuilder();
  }

  protected function createOwnerBuilder(){
    $this->ownerBuilder = new StandardOwnerBuilder();
  }
}
?>
