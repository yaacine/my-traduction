<?php

require_once __DIR__ . '/models/dbManager.php';
require_once __DIR__ . '/models/userModel.php';


$dbManager = new DBManager();
DBManager::connection();

$userModel = new UserModel();
// $username = $password = $email = $confirm_password = "";
// $username_err = $password_err = $email_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["email"]))) {
        $username_err = "Please enter a username.";
        echo '<script >
            alert("Veuillez introduire un email valide");
            location="index.php";
         </script>';
    } else {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $password = trim($_POST["confirm_password"]);
        $userRows = $userModel->getUserByEmail($email);
        //check for no results
        $i = 0;
        foreach ($userRows as $row) {
            $i++;
        }
        if ($i > 0) {
            $email_err = "This email is already taken.";
            echo '<script >
            alert("Un compte existe dejà avec cet adresse mail, Veuillez utiliser un autre");
            location="index.php";
            </script>';
        } else {
            $userModel->createUser($email, $password);
        }
    }
}

?>