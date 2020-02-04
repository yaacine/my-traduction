<?php
    require_once './views/public-traducteruProfile-view.php';

    $url= $_SERVER['REQUEST_URI'];
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    $id = $query['id'];
    $c = new PublicTraducteurProfileView($id);
    $c->getContent();

?>