<?php

require_once __DIR__.'/dbManager.php' ;

class NoteModel{

   public function addNote($idClient, $idTraducteur, $note  , $idDemandeTradution){ 
         DBManager::connection();   
        $formationsQuery ='INSERT INTO `Note`(`client_id`, `traducteur_id`, `date`, `note`, `idDemandeTraduction`) 
        VALUES ('.$idClient.','.$idTraducteur.',NOW(),'.$note.','.$idDemandeTradution.')';
         //echo $formationsQuery;
        $articles = (DBManager::$conn)->query($formationsQuery);

        return $articles;

   }


   public function getAllNotes(){ 
      DBManager::connection();   
     $formationsQuery ='SELECT * From Note';
   //   echo $formationsQuery;
     $articles = (DBManager::$conn)->query($formationsQuery);

     return $articles;

}
}



?>