<?php
require_once __DIR__.'/views/globalItems.php';
require_once __DIR__.'/views/signalementView.php' ;

$c = new SignalementViewAdmin();
$c->getContent();


?>