<?php

require_once __DIR__ . '/../../models/userModel.php';

if(isset($_POST['deblock'])){
    if(isset($_POST['idUserAdmin'])){
    $idTrad= $_POST['idUserAdmin'] ;
    $tradM = new UserModel();
    $tradM->deblockClient($idTrad);
    echo '<script >
    alert("Client débloqué !");
    location="../listClients.php";
    </script>';
    }
}