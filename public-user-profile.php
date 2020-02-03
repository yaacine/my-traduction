<?php

$parts = parse_url($url);
parse_str($parts['query'], $query);
echo $query['id'];

// require_once '../views/public-userProfile-view.php';
// $c = new PublicClientProfileView();
// $c->getContent();

?>