<?php
require_once __DIR__ . '/../models/NoteModel.php';
require_once __DIR__ . '/../models/signalModel.php';
require_once __DIR__ . '/../models/demandeTraductionModel.php';

session_start();


if (isset($_POST['submitSignal'])) {

    // get the id
    $idTrad= $_POST['idTraducteur'];
    $motif = $_POST['motif'];
    //get montant 
    $clientId =  $_SESSION["userId"];


    $trad = $_POST['hiddenNotertraducteurID'];
    $signalM = new SignalModel();

    $signalM->addSignal($clientId, $idTrad, $motif);
  
   echo '<script >
   alert("Réussi , Merci pour votre contribution ' . $userName . ' !");
   location="../nosTraducteurs.php";
   </script>';

}
