<?php
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__.'/globalItems.php';

class ClientProfileView{
    public function getContent(){
       
        $g= new GlobalItems();
        $g->getPageHead(); 
        $g->getNavbar();
        
    }
}
?>   
