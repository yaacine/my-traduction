<?php

require_once __DIR__ . '/models/dbManager.php';
require_once __DIR__ . '/models/userModel.php';

// foreach ($_POST as $key => $value){
//             echo $key.'<'.$key.'  '.$value.'>'.$value;
//         }
        // Initialize the session
        session_start();
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            echo 'flutter';
             header("location: index.php");
            exit;
        }
