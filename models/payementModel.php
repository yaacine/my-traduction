<?php

require_once __DIR__ . '/dbManager.php';

class PayementModel
{

    public function getAllPayements()
    {
        if (DBManager::$conn == NULL) {
            DBManager::connection();
        }
        $formationsQuery = "SELECT * FROM `Payement`";
        $articles = (DBManager::$conn)->query($formationsQuery);



        return $articles;
    }


    // get all payements joined with treaduction
    public function getAllPayementsPerOperation()
    {
        DBManager::connection();
        $formationsQuery = "SELECT t.* , p.idPayement ,p.etat ,p.payementFile, p.date as paydate   FROM DemandeTraduction t JOIN Payement p WHERE p.traduction_id= t.idDemandeTrad";
        //echo $formationsQuery;
        $articles = (DBManager::$conn)->query($formationsQuery);

        return $articles;
    }

    public function createPayement($idTraduction, $payementfile)
    {
        DBManager::connection();
        $creatQuery = 'INSERT INTO `Payement`( `etat`, `date`, `traduction_id`, `payementFile`) VALUES ("non-valide",NOW(),' . $idTraduction . ',"' . $payementfile . '")';
        $articles = (DBManager::$conn)->query($creatQuery);
       // echo $creatQuery;
        return $articles;
    }

    public function validatePayement($idPayement)
    {
        DBManager::connection();
        $creatQuery = 'UPDATE `Payement` SET `etat`="valide" WHERE idPayement='.$idPayement.';';
        $articles = (DBManager::$conn)->query($creatQuery);
       // echo $creatQuery;
        return $articles;
    }
    
}
