<?php

$url= $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
parse_str($parts['query'], $query);
$id = $query['id'];
require_once './views/public-traducteruProfile-view.php';
$c = new PublicTraducteurProfileView($id);
$c->getContent();

?>