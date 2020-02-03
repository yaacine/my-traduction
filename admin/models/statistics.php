<?php

require_once __DIR__ . '/../../models/dbManager.php';

class StatisticsModel
{

    public function getNbTraducteur()
    {
        DBManager::connection();
        $formationsQuery = "SELECT COUNT(idTraducteur) as nbTraducteur FROM Traducteur";
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
    }

    public function getNbClient()
    {
        DBManager::connection();
        $formationsQuery = "SELECT COUNT(idClient) as nbClient FROM Client";
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
    }

    public function getNbDemandesDevis(){
        DBManager::connection();
        $formationsQuery = "SELECT COUNT(idDemandeDevis) as nbDemandeDevis FROM DemandeDevis";
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
    }
    
    public function getNbDemandesTraduction(){
        DBManager::connection();
        $formationsQuery = "SELECT COUNT(idDemandeTrad) as nbDemandeTrad FROM DemandeTraduction";
        $articles = (DBManager::$conn)->query($formationsQuery);
        return $articles;
    }
}
