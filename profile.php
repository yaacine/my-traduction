<?php
     $_SESSION["loggedin"];
     $userId= $_SESSION["userId"] ;
     $isTraducteur =$_SESSION["isTraducteur"];

     if(!$isTraducteur){
        header("Location: user-profile.php");
        exit(0);   
     }
     else{ // it's a traducteur
       
        header("Location: views/traducteurProfileView.php");
        exit(0); 
     }

?>