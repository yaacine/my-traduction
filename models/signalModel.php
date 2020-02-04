<?php

require_once __DIR__.'/dbManager.php' ;

class SignalModel{

   public function addSignal($idClient, $idTraducteur, $comment ){ 
         DBManager::connection();   
        $formationsQuery ='INSERT INTO `Signale`(`client_id`, `traducteur_id`, `date`, `motif`) VALUES ('.$idClient.', '.$idTraducteur.',NOW(), "'.$comment.'")';
         //echo $formationsQuery;
        $articles = (DBManager::$conn)->query($formationsQuery);

        return $articles;

   }

   public function getAllSignal( ){ 
    DBManager::connection();   
   $formationsQuery ='SELECT * FROM Signale';
    //echo $formationsQuery;
   $articles = (DBManager::$conn)->query($formationsQuery);

   return $articles;

}
}



?>