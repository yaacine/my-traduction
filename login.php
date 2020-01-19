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
   
        $dbManager = new DBManager();
        DBManager::connection();
        $userModel = new UserModel();

        // Define variables and initialize with empty values
        $email = $password = "";
        $email_err = $password_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
            // Check if username is empty
            if (empty(trim($_POST["email-login"]))) {
                $email_err = "Please enter email.";
                echo '<script >
                        alert("Veuillez inserer an email valid");
                        location="index.php";
                    </script>';
                //header("location: index.php");
                
            } else {
                $email = null;
                $email = trim($_POST["email-login"]);
            }
            // Check if password is empty
            if (empty(trim($_POST["password-login"]))) {
                $password_err = "Please enter your password.";
                echo '<script >
                        alert("Veuillez le mot de passe !");
                        location="index.php";
                    </script>';
                //header("location: index.php");
            } else {
                $password = trim($_POST["password-login"]);
            }
    
            echo $password_err . $email_err;
            // Validate credentials
            if (empty($email_err) && empty($password_err)) {         
                //$userRows = null;
                $userRows = $userModel->getUserByEmail($email);
                $i = 0;
                foreach ($userRows as $row) {
                    $i++;
                    $pass = $row['password'];
                    $userId= $row['id'];
                    $userMail = $row['email'];
                    $userName = $row['nom'];
                }
             
               
                if ($i <= 0) {
                    $email_err = "No user with this email.";
                    echo '<script >
                            alert("Email ou mot de passe incorrecte");
                            location="index.php";
                        </script>';
                    //header("location: index.php");
                } else {
                  
                    if (strcmp($pass , $password)!=0) {
                      
                        $password_err = "password not valid"; 
                        echo '<script >
                                alert("Email ou mot de passe incorrecte");
                                location="index.php";
                             </script>';
                        //header("location: index.php");
                    } else {      
                        //connexion seccess
                        session_start();
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $userId;
                        $_SESSION["email"] = $userMail;
                        $_SESSION["name"] = $userName;
                       
                        // Redirect user to welcome page
                        echo '<script >
                        alert("Cennexion Reussie , Bienvenu '.$userName.' !");
                        location="index.php";
                        </script>';
                        // header("location: index.php");
                    }
                   
                }
            }

            // Close statement

        }
