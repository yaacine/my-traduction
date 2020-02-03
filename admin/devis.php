<?php

require_once __DIR__.'/views/globalItems.php';

echo 'flutter ';
require_once __DIR__.'/views/devisView.php' ;
echo 'flutter ';

$c = new DevisViewAdmin();
$c->getContent();



?>