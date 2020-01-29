<?php
require_once __DIR__.'/views/globalItems.php';
require_once __DIR__.'/views/tradPay.php' ;

$c = new TradPayViewAdmin();
$c->getContent();


?>