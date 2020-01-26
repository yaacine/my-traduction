<?php

require_once __DIR__ . '/../models/demandeDevisModel.php';

$demandeDevisM = new DemandeDevisModel();
session_start();

if(isset($_POST['idDemandeDevisResoumettre'])) {
    $demandeDevisM->updateDemandeDevisStatus($_POST['idDemandeDevisResoumettre'], 'ouverte');
    echo'fluutttt';
}
header("Location: ../user-profile.php");

?>