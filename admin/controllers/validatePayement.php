<?php

require_once __DIR__ . '/../../models/payementModel.php';
require_once __DIR__ . '/../../models/demandeTraductionModel.php';

if (isset($_POST['validatePayement'])) {

    if (isset($_POST['validatePayementId'])) {

        $idPayement = $_POST['validatePayementId'];
        $idPayementDemandeTrad = $_POST['validatePayementTraductionId'];
        $payM = new PayementModel();
        $demandeTrad = new  DemandeTraductionModel();

        $demandeTrad->updateDemandeTraductionStatus($idPayementDemandeTrad , 'payée');
        $payM->validatePayement($idPayement);

        echo '<script >
                alert("Payement Validé !");
                location="../tradPay.php";
             </script>';
    }
}
