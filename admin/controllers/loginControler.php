<?php

require_once __DIR__ . '/../models/adminModel.php';

session_start();


if(isset($_POST['btn_login'])){
    if(isset($_POST['email'])){
    $userName= $_POST['email'] ;
    $password = $_POST['password'];
        
    $adminM = new AdminModel();
    $result = $adminM->getAdminByName($userName);
    $i=0;
    foreach($result as $row){
        $i++;
        $admin=$row;
    }
    
    if($i>0){   
        if(strcmp($password , $admin['password']) == 0){
            // login success
            $_SESSION["loggedinAdmin"] = true;
            $_SESSION["userIdAdmin"] = $admin['username'];
            $_SESSION["asAdmin"] = true;

            echo '<script >
            alert("Reussi ! Bienvenu '.$userName.'");
            location="../index.php";
            </script>';
        }else{
            //wrong password
            echo '<script >
            alert("Username ou Mot de passe incorrecte");
            location="../indedx.php";
            </script>';
        }
    }else{
        //wrong password
        echo '<script >
        alert("Username ou Mot de passe incorrecte");
        location="../index.php";
        </script>';
    }
    
 
    }
}