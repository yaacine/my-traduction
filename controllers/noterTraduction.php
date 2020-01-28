<?php
require_once __DIR__ . '/../models/NoteModel.php';
require_once __DIR__ . '/../models/demandeTraductionModel.php';

session_start();

if (isset($_POST['submitDemandeTraductionPayement'])) {


    // get the id
    $demandeTradId = $_POST['ResponseDemandeTraductionId'];
    $userId = $_SESSION['userId'];
    //get montant 
    $note = $_POST['noteTraductionInput'];
    $trad = $_POST['hiddenNotertraducteurID'];
 
    $demandeTradM = new DemandeTraductionModel();
    $demandeTradM->updateDemandeTraductionStatus($demandeTradId, 'achevée');

   $noteM = new NoteModel();
   echo 'flutter' ;
   $noteM->addNote($userId, $trad, $note, $demandeTradId); 
   echo '<script >
   alert("Réussi , Merci pour votre contribution ' . $userName . ' !");
   location="../user-profile.php#test-swipe-2";
   </script>';

}
