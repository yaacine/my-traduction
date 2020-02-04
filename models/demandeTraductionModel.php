<?php
require_once __DIR__.'/dbManager.php' ;
require_once __DIR__.'/dbManager.php' ;
/**
 * !demade Traduction status culomn in the database
 * open : sent but no response yet
 * accepted : accepted by the translator by no response yet
 * responded : the translator gave the amount af money needed to process the translation
 * refused : refused by the translator
 */

class DemandeTraductionModel{
   
   public function getAllDemandeTraduction(){
        DBManager::connection();    
        $formationsQuery ="SELECT * FROM `DemandeTraduction`";
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
   }

   public function getDemandeTraductionForClient($clientId){
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        DBManager::connection();
        $formationsQuery ='SELECT tab1.* , tab2.designation lngSrc , tab3.designation lngDest FROM 
        ((SELECT d.*, t.nom nomTrad, t.prenom prenomTrad , t.idTraducteur  FROM DemandeTraduction d 
        JOIN Traducteur t on d.traducteur_id= 			t.idTraducteur
        WHERE client_id ='.$clientId.' order by date DESC) tab1 
        JOIN Langue tab2 on tab1.langueSource_id = tab2.idLangue)
        JOIN Langue tab3 on tab1.langueDestination_id=tab3.idLangue;';
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
   }


   public function getDemandeTraductionForClientPerStatus($clientId ,$status){
    if(DBManager::$conn == NULL){  
        DBManager::connection();    
    }
    $formationsQuery ="SELECT * FROM `DemandeTraduction` WHERE cleint_id ".$clientId;
    $articles = (DBManager::$conn)->query($formationsQuery);
    return $articles;
}





   public function getDemandeTraductionForTraducteur($traducteurId){
    if(DBManager::$conn == NULL){  
        DBManager::connection();    
    }
    $formationsQuery ='SELECT tab1.* , tab2.designation lngSrc , tab3.designation lngDest FROM 
    ((SELECT d.*, t.nom nomClient, t.prenom prenomClient , t.idClient  FROM DemandeTraduction d 
    JOIN Client t on d.client_id= t.idClient
    WHERE traducteur_id ='.$traducteurId.' order by date DESC) tab1 
    JOIN Langue tab2 on tab1.langueSource_id = tab2.idLangue)
    JOIN Langue tab3 on tab1.langueDestination_id=tab3.idLangue;';
    $articles = (DBManager::$conn)->query($formationsQuery);
    return $articles;
   }


   public function getDemandeTraductionForTraducteurPerStatus($traducteurId, $status){
    if(DBManager::$conn == NULL){  
        DBManager::connection();    
    }
    $formationsQuery ='SELECT * FROM `DemandeTraduction` WHERE tradicteur_id ".$traducteurId."and status="'.$status.';';
    $articles = (DBManager::$conn)->query($formationsQuery);
    return $articles;
   }



   public function createDemandeTraduction($idclient,$montant, $idTraducteur, $date, $file, $langSrc, $langDest, $typeTrad, $nom, $prenom,$telephone, $adresse, $status )
   {
        if(DBManager::$conn == null){  
            DBManager::connection();    
        }
        DBManager::connection();    


        $createDTraductionQuery ='INSERT INTO `DemandeTraduction`( `client_id`, `montant`, `traducteur_id`, `date`, `fileLink`, `langueSource_id`, `langueDestination_id`, `typeTraduction`, `nom`, `prenom`, `telephone`, `adresse` ,`status`) 
        VALUES ('.$idclient.', '.$montant.','.$idTraducteur.',NOW(),"'.$file.'",'.$langSrc.','.$langDest.',"'.$typeTrad.'","'.$nom.'","'.$prenom.'","'.$telephone.'","'. $adresse .'","'.$status .'")';

        echo $createDTraductionQuery;  
        $r = (DBManager::$conn)->query( $createDTraductionQuery );
       
   }

   public function updateDemandeTraductionStatus($idDemande, $newStatus){

    DBManager::connection();    
    $updateDTraductionQuery =' UPDATE `DemandeTraduction` SET `status`="'.$newStatus.'" WHERE idDemandeTrad='.$idDemande;
    echo $updateDTraductionQuery;  
    (DBManager::$conn)->query( $updateDTraductionQuery );
   
   }




   public function updateDemandeTraductionPrice($idDemande, $newPrice){

    DBManager::connection();    
    $updateDDevisQuery =' UPDATE `DemandeTraduction` SET `montant`= ' .$newPrice. ' WHERE idDemandeTrad='.$idDemande;
    echo $updateDDevisQuery;  
    (DBManager::$conn)->query( $updateDDevisQuery );
   }


   public  function setResponseComment($idDemande, $comment)
   {
    DBManager::connection();    
    $updateDDevisQuery =' UPDATE `DemandeTraduction` SET `responseCommentaire`="'.$comment.'" WHERE idDemandeTrad='.$idDemande;
    echo $updateDDevisQuery;  
    (DBManager::$conn)->query( $updateDDevisQuery );
   }

   public  function setResultFileLink($idDemande, $link)
   {
    DBManager::connection();    
    $updateDDevisQuery =' UPDATE `DemandeTraduction` SET `resultFileLink`="'.$link.'" WHERE idDemandeTrad='.$idDemande;
    echo $updateDDevisQuery;  
    (DBManager::$conn)->query( $updateDDevisQuery );
   }




}
