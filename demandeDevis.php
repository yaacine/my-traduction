<?php

require_once __DIR__ . '/models/dbManager.php';
require_once __DIR__ . '/models/userModel.php';
require_once __DIR__ . '/models/demandeDevisModel.php';


// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && isset($_SESSION["userId"]) && $_SESSION["loggedin"] === true) {
    $clientId = $_SESSION["userId"];
    //header("location: index.php");
    echo '<script >
    alert("cava");
    location="index.php";
    </script>';

}
else{
    echo '<script >
        alert("Encore une étape et vous y etes 
        Connectez-vous effectuer cette action");
        location="index.php";
        </script>';
}

// Check if image file is a actual image or fake image
if (isset($_POST["submit-ask"])) {

    // get the firstname
    if (isset($_POST['first_name'])) {
        $firstName = $_POST['first_name'];
    }

    //get the lastname
    if (isset($_POST['last_name'])) {
        $lastName = $_POST['last_name'];
    }


    //get the email
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    //get the telephone
    if (isset($_POST['telephone'])) {
        $telephone = $_POST['telephone'];
    }

    //get the address
    if (isset($_POST['adresse'])) {
        $adresse = $_POST['adresse'];
    }


    //get src language 
    if (isset($_POST['langue_source'])) {
        $langueSource = $_POST['langue_source'];
    }


    //get dest language
    if (isset($_POST['langue_destination'])) {
        $langueDestination = $_POST['langue_destination'];
    }

    // get traduction type 
    if (isset($_POST['type_traduction'])) {
        $typeTraduction = $_POST['type_traduction'];
    }

    // assermenté ou pas
    if (isset($_POST['assermente'])) {
        $assermente = $_POST['assermente'];
    }

    // get th comment
    if (isset($_POST['comment'])) {
        $commentaire = $_POST['comment'];
    }


    // get the file
    $target_dir = "uploads/results/";
    $target_file = $target_dir . date("h:i:sa") . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadError = 0;

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadError = 1;
        $uploadOk = 0;
    }

    // Allow certain file formats
    // if (
    //     $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "odt"
    //     && $imageFileType != "doc"
    // ) {
    //     //echo "Sorry, only PDF, DOCX, DOC & ODT files are allowed.";
    //     $uploadError = 2;
    //     $uploadOk = 0;
    // }

    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        $uploadError = 3;
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
            $uploadError = 4;
        }
    }


    // get the choosed translators
    if (!empty($_POST['traducteurs_ckecked'])) {

        session_start();

        $t = $_SESSION["userId"];
        echo '' . $_SESSION["userId"];
        echo "<br>";
        echo "<br>";
        $demandeDevis = new DemandeDevisModel();

        echo 'flutter' . $_SESSION["userId"];

        foreach ($_POST['traducteurs_ckecked'] as $value) {
            $demandeDevis->createDemandeDevis($clientId, $value['idTraducteur'], null, $target_file, $langueSource, $langueDestination, $typeTraduction, $lastName, $firstName, $telephone, $adresse, 'open');
        }

        echo '<script >
        alert("Demande transmise avec Succès");
        location="index.php";
        </script>';
    }
}
