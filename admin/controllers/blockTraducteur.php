<?php

require_once __DIR__ . '/../../models/TraducteurModel.php';

if(isset($_POST['block'])){
    if(isset($_POST['idTraducteurAdmin'])){
    $idTrad= $_POST['idTraducteurAdmin'] ;
    $tradM = new TraducteurModel();
    $tradM->blockTraducteur($idTrad);
    echo '<script >
    alert("Traducteur bloqué !");
    location="../listTraducteurs.php";
    </script>';
    }
}
