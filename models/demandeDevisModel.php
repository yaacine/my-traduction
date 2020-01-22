<?php
require_once __DIR__.'/dbManager.php' ;
require_once __DIR__.'/dbManager.php' ;
/**
 * !demade devis status culomn in the database
 * open : sent but no response yet
 * accepted : accepted by the translator by no response yet
 * responded : the translator gave the amount af money needed to process the translation
 * refused : refused by the translator
 */

class DemandeDevisModel{
   
   public function getAllDemandeDevis(){
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        $formationsQuery ="SELECT * FROM `DemandeDevis`";
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
   }

   public function getDemandeDevisForClient($clientId){
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        $formationsQuery ="SELECT * FROM `DemandeDevis` WHERE cleint_id ".$clientId;
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
   }


   public function getDemandeDevisForClientPerStatus($clientId ,$status){
    if(DBManager::$conn == NULL){  
        DBManager::connection();    
    }
    $formationsQuery ="SELECT * FROM `DemandeDevis` WHERE cleint_id ".$clientId;
    $articles = (DBManager::$conn)->query($formationsQuery);
    return $articles;
}



   public function getDemandeDevisForTraducteur($traducteurId){
    if(DBManager::$conn == NULL){  
        DBManager::connection();    
    }
    $formationsQuery ="SELECT * FROM `DemandeDevis` WHERE tradicteur_id ".$traducteurId;
    $articles = (DBManager::$conn)->query($formationsQuery);
    return $articles;
   }


   public function getDemandeDevisForTraducteurPerStatus($traducteurId, $status){
    if(DBManager::$conn == NULL){  
        DBManager::connection();    
    }
    $formationsQuery ='SELECT * FROM `DemandeDevis` WHERE tradicteur_id ".$traducteurId."and status="'.$status.';';
    $articles = (DBManager::$conn)->query($formationsQuery);
    return $articles;
   }



   public function createDemandeDevis($idclient, $idTraducteur, $date, $file, $langSrc, $langDest, $typeTrad, $nom, $prenom,$telephone, $adresse, $status )
   {
        if(DBManager::$conn == null){  
            DBManager::connection();    
        }
        DBManager::connection();    


        $createDDevisQuery ='INSERT INTO `DemandeDevis`( `cleint_id`, `traducteur_id`, `date`, `fileLink`, `langueSource_id`, `langueDestination_id`, `typeTraduction`, `nom`, `prenom`, `telephone`, `adresse` ,`status`) 
        VALUES ('.$idclient.','.$idTraducteur.',NOW(),"'.$file.'",'.$langSrc.','.$langDest.',"'.$typeTrad.'","'.$nom.'","'.$prenom.'","'.$telephone.'","'. $adresse .'","'.$status .'")';

        echo $createDDevisQuery;  
        $r = (DBManager::$conn)->query( $createDDevisQuery );
       
   }

   public function alterDemandeDevisStatus($idDemande, $newStatus){
  
    if(DBManager::$conn == null){  
        DBManager::connection();    
    }
    DBManager::connection();    


    $updateDDevisQuery =' UPDATE `DemandeDevis` SET `status`='.$newStatus.' WHERE idDemandeDevis='.$idDemande;
    echo $updateDDevisQuery;  
    (DBManager::$conn)->query( $updateDDevisQuery );
   
   }

}
