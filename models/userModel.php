<?php

require_once __DIR__.'/dbManager.php' ;

class UserModel{
   public function getUserByEmail($email){ 
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        $userQuery ='SELECT * FROM Client c WHERE c.email="'.$email.'"';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
   }


   public function createUser($email,$password){
    if(DBManager::$conn == NULL){  
        DBManager::connection();    
    }
    $userQuery ='INSERT INTO `Client` (`email`, `password`) VALUES ("'.$email.'", "'.$password.'")';
    $user = (DBManager::$conn)->query($userQuery);
    return $user;
   }
}

?>