<?php
require_once __DIR__ . '/../models/dbManager.php';
require_once __DIR__ . '/../models/userModel.php';

class AuthController
{

    public function register()
    {

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
            } else {
                $email = trim($_POST["email"]);
                $password = trim($_POST["password"]);
                $userRows = $userModel->getUserByEmail($email);
                //check for no results
                $i = 0;
                foreach ($userRows as $row) {
                    $i++;
                }
                if ($i > 0) {
                    $email_err = "This email is already taken.";
                } else {
                    $userModel->createUser($email, $password);
                }
            }
        }
    }


    public function login()
    {
        // Initialize the session
        session_start();
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: welcome.php");
            exit;
        }
        $dbManager = new DBManager();
        DBManager::connection();
        $userModel = new UserModel();
       
        // Define variables and initialize with empty values
        $email = $password = "";
        $email_err = $password_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo 'ecterne ==>'.trim($_POST["email"]);
            // Check if username is empty
            if (empty(trim($_POST["email"]))) {
                $email_err = "Please enter email.";
               
               
            } else {
                $email = trim($_POST["email"]);
              
            }

            // Check if password is empty
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter your password.";
              
            } else {
                $password = trim($_POST["password"]);
               
            }

            // Validate credentials
            if (empty($email_err) && empty($password_err)) {
                $userRows = $userModel->getUserByEmail($email);
               

                $i = 0;
                foreach ($userRows as $row) {
                    echo 'email ===>'.  $email ."email deux --->".$row['email'];
                    $i++;   
                }
               
                if ($i <= 0) {
                    
                    $email_err = "No user with this email.";
                    echo'row libre -->';
                } else {
                    foreach ($userRows as $row) {
                        $pass = $row['password'];
                        echo'row -->'.$pass;
                        if ($pass != $password) {
                            $password_err = "password not valid";
                        } else {
                            //connexion seccess
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $row['id'];
                            $_SESSION["username"] = $row['email'];

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        }
                    }
                }
            }

            // Close statement

        }
    }
}
