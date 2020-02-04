<?php

   session_start();

     if($_SESSION["loggedin"]){
      $userId= $_SESSION["userId"] ;
      $isTraducteur = $_SESSION["isTraducteur"];
      if($isTraducteur=='FALSE'){
         header("Location: user-profile.php");
         exit(0);   
      }
      else{ // it's a traducteur
        
         header("Location: trad-profile.php");
         exit(0); 
      }
     }
     else{
        echo'<script >
        alert("Vous ne pouvez pas acceder à ce contenu, Connectez-Vous !");
        location="index.php";
        </script>';
     }
    
?>