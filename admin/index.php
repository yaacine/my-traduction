<?php
require_once __DIR__.'/views/globalItems.php';
require_once __DIR__.'/views/indexViewAdmin.php' ;

$c = new IndexViewAdmin();
$c->getContent();



?>