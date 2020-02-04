<?php

require_once __DIR__ . '/../models/demandeDevisModel.php';
require_once __DIR__ . '/../models/demandeTraductionModel.php';

$demandeDevisM = new DemandeDevisModel();
$demandeTradM= new DemandeTraductionModel();
session_start();

echo 'we are here ';

if(isset($_POST['idDemandeDevisTraduire'])) {
    echo 'we are here ';

    $demandeDevisM->updateDemandeDevisStatus($_POST['idDemandeDevisTraduire'], 'soumise pour traduction');
    $demandeList = $demandeDevisM->getAllDemandeDevisById($_POST['idDemandeDevisTraduire']);
    $i = 0;
    foreach($demandeList as $row){
        $result= $row;
        $i++;
    }
    if($i>0){
        $demandeTradM->createDemandeTraduction($row['client_id'],$row['montant'], $row['traducteur_id'] ,$row['date'],$row['fileLink'],$row['langueSource_id'], $row['langueDestination_id'], $row['typeTraduction'] ,$row['nom'] , $row['prenom'] , $row['telephone'] , $row['adresse'],"ouverte");
    }
   
}

header("Location: ../user-profile.php");

?>