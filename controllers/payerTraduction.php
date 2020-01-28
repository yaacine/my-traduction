<?php

if (isset($_POST['submitDemandeTraductionPayement'])) {


    // get the id
    $demandeTradId = $_POST['ResponseDemandeTraductionId'];
    //get montant 
    $montant = $_POST['montantTraductionInput'];
    echo 'flutter '.$demandeTradId.'***somme==>'.$montant;
    // get the file
    $target_dir = "uploads/";
    $target_file = $target_dir . date("h:i:sa") . basename($_FILES["fileToUploadPayement"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadError = 0;
    echo'</br> terget file '.$target_file;
    echo'</br>';
    // Check file size
    if ($_FILES["fileToUploadPayement"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadError = 1;
        $uploadOk = 0;
    }

    // Allow certain file formats
    // if (
    //     $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "odt"
    //     && $imageFileType != "doc"
    // ) {
    //     echo "Sorry, only PDF, DOCX, DOC & ODT files are allowed.";
    //     $uploadError = 2;
    //     $uploadOk = 0;
    // }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $uploadError = 3;
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUploadPayement"]["tmp_name"], $target_file)) {
             echo "The file " . basename($_FILES["fileToUploadPayement"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadError = 4;
        }
    }


}
