<?php

require_once __DIR__ . '/../models/demandeTraductionModel.php';

$demandeTradM = new DemandeTraductionModel();
session_start();

if(isset($_POST['deleteDemandeTraductionId'])) {
    echo'flutter ';
    $demandeTradM->updateDemandeTraductionStatus($_POST['deleteDemandeTraductionId'], 'archivée');
}
header("Location: ../user-profile.php#test-swipe-2");

?>