<?php

require_once __DIR__ . '/dbManager.php';

class UserModel
{

    public function getAllUsers(){
       
        DBManager::connection();
        $userQuery = 'SELECT * FROM Client ';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }
    public function getUserByEmail($email)
    {
        if (DBManager::$conn == NULL) {
            DBManager::connection();
        }
        $userQuery = 'SELECT * FROM Client c WHERE c.email="' . $email . '"';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }


    public function getUserById($id)
    {
        DBManager::connection();
       
        $userQuery = 'SELECT * FROM Client c WHERE c.idClient="' . $id . '"';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }


    public function createUser($email, $password)
    {
        if (DBManager::$conn == NULL) {
            DBManager::connection();
        }
        $userQuery = 'INSERT INTO `Client` (`email`, `password`) VALUES ("' . $email . '", "' . $password . '")';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }


    //get number of demandes de devis
    public function getNbDemabdesDevis($id){
        DBManager::connection();
       
        $userQuery = 'SELECT count(idDemandeDevis) as nbDemandesDevis FROM `DemandeDevis` WHERE client_id='.$id.';';
        // echo $userQuery;
        // echo '<br>';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }

    //get number of demandes de traductions
    public function getNbDemabdesTraductions($id){
        DBManager::connection();
       
        $userQuery = 'SELECT count(idDemandeTrad) as nbDemandesTrad FROM `DemandeTraduction` WHERE client_id='.$id.';';
        // echo $userQuery;
        // echo '<br>';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }

    public function blockClient($id){
        DBManager::connection();
        $userQuery = 'UPDATE `Client` SET `status`="blocked" WHERE idClient'.$id.';';
        // echo $userQuery;
        // echo '<br>';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }

    public function deblockClient($id){
        DBManager::connection();
       
        $userQuery = 'UPDATE `Client` SET `status`="active" WHERE idClient'.$id.';';
        // echo $userQuery;
        // echo '<br>';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }

}
