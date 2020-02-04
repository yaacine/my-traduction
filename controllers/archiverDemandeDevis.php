<?php

require_once __DIR__ . '/../models/demandeDevisModel.php';

$demandeDevisM = new DemandeDevisModel();
session_start();


if(isset($_POST['idDemandeDevisArchiver'])) {
    $demandeDevisM->updateDemandeDevisStatus($_POST['idDemandeDevisArchiver'], 'archivée');

}
header("Location: ../user-profile.php#test-swipe-1");

?>