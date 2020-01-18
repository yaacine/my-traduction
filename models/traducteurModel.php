<?php
require_once __DIR__.'/dbManager.php' ;


class TraducteurModel{
   
   public function getAllTraducteurs(){
      
       DBManager::connection();
       
        $traducteursQuery ="SELECT * FROM Traducteur t LEFT OUTER JOIN MaitriseLangue m ON t.idTraducteur=m.traducteur_id 
                        LEFT OUTER JOIN Langue l on m.langue_id=l.idLangue";
        $traducteurs = (DBManager::$conn)->query($traducteursQuery);
        return ($traducteurs);
   }

   public function getLanguagesForSingleTraducteur($id){
       $languesQuery ='SELECT l.designation FROM Traducteur t LEFT OUTER JOIN MaitriseLangue m ON t.idTraducteur=m.traducteur_id 
       LEFT OUTER JOIN Langue l on m.langue_id=l.idLangue 
       WHERE t.idTraducteur ='.$id;
       $langues = (DBManager::$conn)->query($languesQuery);
       return ($langues);
   }

 public function getTraducteurNote($id){
       $noteQuery ='SELECT AVG(n.note) note FROM Note n WHERE traducteur_id='.$id;
       $note = (DBManager::$conn)->query($noteQuery);
       foreach($note as $row){
        $stringNote=strval(intval($row['note']));
       } 
       
       return ($stringNote);
   }

   
   

 
}

?>