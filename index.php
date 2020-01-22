<?php

require_once './views/globalItems.php';
require_once './views/indexView.php' ;
require_once './models/dbManager.php' ;

DBManager::connection();
$c = new IndexView();
$c->getContent();




?>