<?php
require_once __DIR__.'/views/globalItems.php';
require_once __DIR__.'/views/devisView.php' ;

$c = new DevisViewAdmin();
$c->getContent();



?>