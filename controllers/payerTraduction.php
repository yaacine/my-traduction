<?php
require_once __DIR__ . '/../models/demandeTraductionModel.php';
require_once __DIR__ . '/../models/payementModel.php';

session_start();

if (isset($_POST['submitDemandeTraductionPayement'])) {


    // get the id
    $demandeTradId = $_POST['ResponseDemandeTraductionId'];
    //get montant 
    $montant = $_POST['montantTraductionInput'];

    $demandeTradM = new DemandeTraductionModel();
    $payementM = new PayementModel();
    // get the file
    $target_dir = "../uploads/payements/";
    $target_file = $target_dir . date("h:i:sa") . basename($_FILES["fileToUpload"]["name"]);
    $target_file = str_replace(' ', '', $target_file);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadError = 0;

    // Check file size
    // if ($_FILES["fileToUpload"]["size"] > 500000) {
    //     //echo "Sorry, your file is too large.";
    //     $uploadError = 1;
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    // if (
    //     $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "odt"
    //     && $imageFileType != "doc"
    // ) {
    //     //echo "Sorry, only PDF, DOCX, DOC & ODT files are allowed.";
    //     $uploadError = 2;
    //     $uploadOk = 0;
    // }
    echo $target_file;  
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $uploadError = 3;
        // if everything is ok, try to upload file
    } else {
      

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          

            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            $demandeTradM->updateDemandeTraductionStatus($demandeTradId, "Validation du Payement");
            $storefile = substr("$target_file", 3);
            echo '<br>  ';

            echo $storefile;
            $payementM->createPayement($demandeTradId, $storefile);
             echo'<script >
             alert("Fichier Bien Soumis, La traducion Commencera une fois que le payement soit Validé");
             location="../trad-profile.php";
             </script>';

        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadError = 4;
            echo '<script >
            alert("Fichier n`a pas pu etre chargée , Veuillez Réessayer");
            location="../trad-profile.php";
        </script>';
        }
    }
}
