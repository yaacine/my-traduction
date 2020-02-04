<?php

require_once __DIR__ . '/../../models/userModel.php';

if(isset($_POST['block'])){
    if(isset($_POST['idUserAdmin'])){
    $idTrad= $_POST['idUserAdmin'] ;
    $tradM = new UserModel();
    $tradM->blockClient($idTrad);
    echo '<script >
    alert("Client bloqué !");
    location="../listClients.php";
    </script>';
    }
}
