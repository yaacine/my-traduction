<?php
require_once __DIR__.'/dbManager.php' ;


class DemandeDevisModel{
   
   public function getAllDemandeDevisModel(){
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        $formationsQuery ="SELECT * FROM `Articles`";
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
   }

   public function getDemandeDevisForClient(){

   }

   public function getDemandeDevisForTraducteur(){

   }


   public function createDemandeDevis($idclient, $idTraducteur, $date, $file, $langSrc, $langDest, $typeTrad, $nom, $prenom,$telephone, $adresse )
   {
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        $createDDevisQuery ="INSERT INTO `DemandeDevis`( `cleint_id`, `traducteur_id`, `date`, `fileLink`, `langueSource_id`, `langueDestination_id`, `typeTraduction`, `nom`, `prenom`, `telephone`, `adresse`) 
        VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])";
        $articles = (DBManager::$conn)->query($createDDevisQuery);
        return $articles;   
   }

  
   
   

 
}

?>