<?php

require_once __DIR__ . '/../models/demandeTraductionModel.php';
session_start();

if(isset($_POST['submitResponseDemandeTraduction'])){
 
 

    $demandeTraductionM = new DemandeTraductionModel();
    $demandeId =$_POST['ResponseDemandeTraductionId'];

  
    if(isset($_POST['demandeTraductionReponse'])){
      
        if($_POST['demandeTraductionReponse'] =='accepter'){
            $montant = $_POST['montantTraductionInput'];
            $commentaire =$_POST['commentReponseDemandeTraduction'];
            $demandeTraductionM->updateDemandeTraductionStatus( $demandeId , 'acceptée');
            $demandeTraductionM->setResponseComment($demandeId ,$commentaire);
            $demandeTraductionM->updateDemandeTraductionPrice($demandeId,$montant);
            
        }elseif($_POST['demandeTraductionReponse'] =='refuser'){
           
            $commentaire =$_POST['commentReponseDemandeTraduction'];
            $demandeTraductionM->updateDemandeTraductionStatus( $demandeId , 'refusée');
            $demandeTraductionM->setResponseComment($demandeId ,$commentaire);

        }
    }
    

}

header("Location: ../trad-profile.php#test-swipe-2");

?>

