<?php
require_once 'OwnerBuilder.php';

abstract class CampaignSetup{

  protected $ownerBuilder;

  protected abstract function createOwnerBuilder();

  protected function initializeCampaign(){
    echo "initializing campaign\n";
  }

  protected function addInventory(){
    echo "adding inventory\n";
  }

  protected function registerOwner(){
    $this->ownerBuilder->register();
  }

  public function setupCampaign(){
    $this->initializeCampaign();
    $this->addInventory();
    $this->ownerBuilder->register();
    echo "\nCampaign Setup Complete\n\n";
  }
}
?>
