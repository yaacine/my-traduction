<?php

require_once __DIR__ . '/../models/demandeTraductionModel.php';
session_start();

if(isset($_POST['submitDemandeTraductionPayee'])){
 
 

    $demandeTraductionM = new DemandeTraductionModel();
    $demandeId =$_POST['idDemandeTraductionPayee'];
    $demandeTraductionM->updateDemandeTraductionStatus( $demandeId , 'entammée');

}

header("Location: ../trad-profile.php#test-swipe-2");

?>

