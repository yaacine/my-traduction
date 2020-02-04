<?php
require_once __DIR__.'/../../models/dbManager.php' ;

    class AdminModel{

        public function getAdminByName($username){ 
            DBManager::connection();   
        $formationsQuery ='SELECT * FROM admin WHERE username="'.$username.'"';
        //echo $formationsQuery;
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;

        }

    }

?>