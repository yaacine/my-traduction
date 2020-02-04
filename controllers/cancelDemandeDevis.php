<?php

require_once __DIR__ . '/../models/demandeDevisModel.php';

$demandeDevisM = new DemandeDevisModel();
session_start();

if(isset($_POST['deleteDemandeDevisId'])) {
    $demandeDevisM->updateDemandeDevisStatus($_POST['deleteDemandeDevisId'], 'archivée');
}
header("Location: ../user-profile.php#test-swipe-1");

?>