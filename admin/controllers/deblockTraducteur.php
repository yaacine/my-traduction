<?php

require_once __DIR__ . '/../../models/TraducteurModel.php';

if(isset($_POST['deblock'])){
    if(isset($_POST['idTraducteurAdmin'])){
    $idTrad= $_POST['idTraducteurAdmin'] ;
    $tradM = new TraducteurModel();
    $tradM->deblockTraducteur($idTrad);
    echo '<script >
    alert("Traducteur débloqué !");
    location="../listTraducteurs.php";
    </script>';
    }
}
