<?php
require_once __DIR__.'/views/globalItems.php';
require_once __DIR__.'/views/listTraducteurView.php' ;

$c = new ListTraductionViewAdmin;
$c->getContent();


?>