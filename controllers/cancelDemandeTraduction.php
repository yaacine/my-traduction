<?php

require_once __DIR__ . '/../models/demandeTraductionModel.php';

$demandeTradM = new DemandeTraductionModel();
session_start();

if(isset($_POST['deleteDemandeTraductionId'])) {
    $demandeTradM->updateDemandeTraductionStatus($_POST['deleteDemandeTraductionId'], 'archivée');
}
header("Location: ../user-profile.php#test-swipe-2");

?>