<?php

require_once __DIR__ . '/../models/demandeDevisModel.php';
require_once __DIR__ . '/../models/demandeTraductionModel.php';

$demandeTradM = new DemandeTraductionModel();
session_start();

if(isset($_POST['idDemandeTraductionResoumettre'])) {
    $demandeTradM->updateDemandeTraductionStatus($_POST['idDemandeTraductionResoumettre'], 'ouverte');
    echo'fluutttt';
}
header("Location: ../user-profile.php#test-swipe-2");

?>