<?php

require_once __DIR__.'/dbManager.php' ;

class PayementModel{

   public function getAllPayements(){ 
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        $formationsQuery ="SELECT * FROM `Payement`";
        $articles = (DBManager::$conn)->query($formationsQuery);
        
         

        return $articles;

   }

   public function createPayement($idTraduction, $payementfile){
        DBManager::connection();    
       $creatQuery ='INSERT INTO `Payement`( `etat`, `date`, `traduction_id`, `payementFile`) VALUES ("non-valide",NOW(),'.$idTraduction.',"'.$payementfile.'")';
       $articles = (DBManager::$conn)->query($creatQuery);
echo $creatQuery ;
       return $articles;
    }
}



?>