<?php
require_once __DIR__ . '/views/globalItems.php';
require_once __DIR__ . '/views/indexViewAdmin.php';

require_once __DIR__ . '/views/loginViewAdmin.php';

session_start();
// Store data in session variables
if ($_SESSION["loggedinAdmin"] == true && $_SESSION["asAdmin"] == true) {

    $c = new IndexViewAdmin();
    $c->getContent();
}else{
    $l = new LoginAdminView();
    $l->getContent();
}
