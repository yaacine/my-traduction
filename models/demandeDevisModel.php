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

   public function getAllDemandeDevisById($id){
    DBManager::connection();    
    $formationsQuery ='SELECT * FROM `DemandeDevis` WHERE idDemandeDevis='.$id;
    $articles = (DBManager::$conn)->query($formationsQuery);
    return $articles;
}




   public function getDemandeDevisForClient($clientId){
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        DBManager::connection();
        $formationsQuery ='SELECT tab1.* , tab2.designation lngSrc , tab3.designation lngDest FROM 
                            ((SELECT d.*, t.nom nomTrad, t.prenom prenomTrad , t.idTraducteur  FROM DemandeDevis d 
                            JOIN Traducteur t on d.traducteur_id= 			t.idTraducteur
                            WHERE client_id ='.$clientId.' order by date DESC) tab1 
                            JOIN Langue tab2 on tab1.langueSource_id = tab2.idLangue)
                            JOIN Langue tab3 on tab1.langueDestination_id=tab3.idLangue;';
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
    }
    DBManager::connection();    
    $formationsQuery ='SELECT tab1.* , tab2.designation lngSrc , tab3.designation lngDest FROM 
                        ((SELECT d.*, t.nom nomClient, t.prenom prenomClient , t.idClient  FROM 								DemandeDevis d 
                        JOIN Client t on d.client_id=t.idClient
                        WHERE d.traducteur_id ='.$traducteurId.' order by date DESC) tab1 
                        JOIN Langue tab2 on tab1.langueSource_id = tab2.idLangue)
                        JOIN Langue tab3 on tab1.langueDestination_id=tab3.idLangue;';
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

   public function updateDemandeDevisStatus($idDemande, $newStatus){

    if(DBManager::$conn == null){  
        DBManager::connection();    
    }
    DBManager::connection();    


    $updateDDevisQuery =' UPDATE `DemandeDevis` SET `status`="'.$newStatus.'" WHERE idDemandeDevis='.$idDemande;
    echo $updateDDevisQuery;  
    (DBManager::$conn)->query( $updateDDevisQuery );
   
   }



   public function updateDemandeDevisPrice($idDemande, $newPrice){

    DBManager::connection();    

    $updateDDevisQuery =' UPDATE `DemandeDevis` SET `montant`= ' .$newPrice. ' WHERE idDemandeDevis='.$idDemande;
    echo $updateDDevisQuery;  
    (DBManager::$conn)->query( $updateDDevisQuery );
   }

   public  function setResponseComment($idDemande, $comment)
   {
    DBManager::connection();    
    $updateDDevisQuery =' UPDATE `DemandeDevis` SET `responseCommentaire`="'.$comment.'" WHERE idDemandeDevis='.$idDemande;
    echo $updateDDevisQuery;  
    (DBManager::$conn)->query( $updateDDevisQuery );
   }

   

}
