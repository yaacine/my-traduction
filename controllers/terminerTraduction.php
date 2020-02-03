<?php

require_once __DIR__ . '/../models/demandeTraductionModel.php';
session_start();

if(isset($_POST['submitDemandeTraductionResult'])){
    
    $demandeTraductionM = new DemandeTraductionModel();
    $demandeId =$_POST['ResultDemandeTraductionId'];
    

     // get the file
     $target_dir = "../uploads/results/";
     $target_file = $target_dir . date("h:i:sa") . basename($_FILES["fileToUploadResult"]["name"]);
     $target_file =str_replace(' ', '', $target_file);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
     $uploadError = 0;
 
     // Check file size
    //  if ($_FILES["fileToUploadResult"]["size"] > 500000) {
    //      //echo "Sorry, your file is too large.";
    //      $uploadError = 1;
    //      $uploadOk = 0;
    //  }
 
     //Allow certain file formats
    //  if (
    //      $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "odt"
    //      && $imageFileType != "doc"
    //  ) {
    //      //echo "Sorry, only PDF, DOCX, DOC & ODT files are allowed.";
    //      $uploadError = 2;
    //      $uploadOk = 0;
    //  }
 
     if ($uploadOk == 0) {
         //echo "Sorry, your file was not uploaded.";
         $uploadError = 3;
         // if everything is ok, try to upload file
     } else {
         if (move_uploaded_file($_FILES["fileToUploadResult"]["tmp_name"], $target_file)) {
              echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

              $demandeTraductionM->updateDemandeTraductionStatus( $demandeId , 'terminée');
              $storefile= substr("$target_file", 3);
              $demandeTraductionM->setResultFileLink( $demandeId , $storefile);
              echo'<script >
              alert("Fichier Bien Soumis, Merci Pour Le Beau Travail 💪");
              location="../trad-profile.php#test-swipe-2";
          </script>';
         } else {
             echo "Sorry, there was an error uploading your file.";
             $uploadError = 4;
             echo'<script >
             alert("Fichier n`a pas pu etre chargée , Veuillez Réessayer");
             location="../trad-profile.php#test-swipe-2";
         </script>';
         }
     }
 
}

//header("Location: ../trad-profile.php#test-swipe-2");
