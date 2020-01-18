<?php

require_once __DIR__.'/dbManager.php' ;

class ArticleModel{

   public function getAllArticles(){ 
        if(DBManager::$conn == NULL){  
            DBManager::connection();    
        }
        $formationsQuery ="SELECT * FROM `Articles`";
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
   }
}

?>