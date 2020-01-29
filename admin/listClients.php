<?php
require_once __DIR__.'/views/globalItems.php';
require_once __DIR__.'/views/listClientsView.php' ;

$c = new ListClientsViewAdmin();
$c->getContent();



?>