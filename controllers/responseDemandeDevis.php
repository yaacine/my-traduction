<?php

require_once __DIR__ . '/../models/demandeDevisModel.php';

session_start();

if(isset($_POST['submitResponseDemandeDevis'])){
 

    $demandeDevisM = new DemandeDevisModel();
    $demandeId =$_POST['hiddenResponseDemandeDevis'];
    if(isset($_POST['demandeDevisReponse'])){
        echo'flutter set</br>';
        if($_POST['demandeDevisReponse'] =='accepter'){

            
            $montant = $_POST['montantDevisTraductionInput'];
            $commentaire =$_POST['commentReponseDemandeDevis'];
            $demandeDevisM->updateDemandeDevisStatus( $demandeId , 'acceptée');
            $demandeDevisM->setResponseComment($demandeId ,$commentaire);
            $demandeDevisM->updateDemandeDevisPrice($demandeId,$montant);
            
        }elseif($_POST['demandeDevisReponse'] =='refuser'){
            echo'flutter refuser</br>';

            $commentaire =$_POST['commentReponseDemandeDevis'];
            $demandeDevisM->updateDemandeDevisStatus( $demandeId , 'refusée');
            $demandeDevisM->setResponseComment($demandeId ,$commentaire);

        }
    }
    

    echo 'noureddine'.$_POST['montantDevisTraductionInput'];
    echo 'noureddine'.$_POST['commentReponseDemandeDevis'];


}

header("Location: ../trad-profile.php#test-swipe-1");

?>

