<?php

require_once 'AdvancedCampaignSetup.php';
require_once 'LimitedCampaignSetup.php';

$campaignSetup;

echo "Starting campaign setup\n";
$campType = readline("Setup limited or advanced campaign? Please enter standard or advanced:  ");

switch($campType){
  case 'standard':
    $campaignSetup = new LimitedCampaignSetup();
    break;
  case 'advanced':
    $campaignSetup = new AdvancedCampaignSetup();
    break;
  default:
    throw new Exception("Invalid Campaign Setup type");
}

$campaignSetup->setupCampaign();

?>
