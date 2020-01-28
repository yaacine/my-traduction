<?php

require_once __DIR__ . '/../models/demandeTraductionModel.php';
session_start();
echo'flutter';
if(isset($_POST['submitResponseDemandeTraduction'])){
 
    echo'flutter';

    $demandeTraductionM = new DemandeTraductionModel();
    $demandeId =$_POST['ResponseDemandeTraductionId'];

    echo '<br>';
    echo $demandeId;
    echo '<br>';
    echo '<br>';
    if(isset($_POST['demandeTraductionReponse'])){
        echo'flutter set</br>';
        if($_POST['demandeTraductionReponse'] =='accepter'){
            $montant = $_POST['montantTraductionInput'];
            $commentaire =$_POST['commentReponseDemandeTraduction'];
            $demandeTraductionM->updateDemandeTraductionStatus( $demandeId , 'acceptée');
            $demandeTraductionM->setResponseComment($demandeId ,$commentaire);
            $demandeTraductionM->updateDemandeTraductionPrice($demandeId,$montant);
            
        }elseif($_POST['demandeTraductionReponse'] =='refuser'){
            echo'flutter refuser</br>';
            $commentaire =$_POST['commentReponseDemandeTraduction'];
            $demandeTraductionM->updateDemandeTraductionStatus( $demandeId , 'refusée');
            $demandeTraductionM->setResponseComment($demandeId ,$commentaire);

        }
    }
    

    echo 'noureddine'.$_POST['montantDevisTraductionInput'];
    echo 'noureddine'.$_POST['commentReponseDemandeDevis'];


}

header("Location: ../trad-profile.php#test-swipe-2");

?>

