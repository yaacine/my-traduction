<?php
require_once __DIR__ . '/dbManager.php';


class TraducteurModel
{

    public function getAllTraducteurs()
    {

        DBManager::connection();

        $traducteursQuery = "SELECT * FROM Traducteur";
        $traducteurs = (DBManager::$conn)->query($traducteursQuery);

        return ($traducteurs);
    }

    public function getLanguagesForSingleTraducteur($id)
    {
        $languesQuery = 'SELECT l.designation FROM Traducteur t LEFT OUTER JOIN MaitriseLangue m ON t.idTraducteur=m.traducteur_id 
       LEFT OUTER JOIN Langue l on m.langue_id=l.idLangue 
       WHERE t.idTraducteur =' . $id;
        $langues = (DBManager::$conn)->query($languesQuery);
        return ($langues);
    }

    public function getTraducteurNote($id)
    {
        $noteQuery = 'SELECT AVG(n.note) note FROM Note n WHERE traducteur_id=' . $id;
        $note = (DBManager::$conn)->query($noteQuery);
        foreach ($note as $row) {
            $stringNote = strval(intval($row['note']));
        }

        return ($stringNote);
    }


    public function getAllTraducteursWilayas()
    {
        DBManager::connection();
        $wilayaQuery = "SELECT wilaya FROM Traducteur GROUP BY wilaya";
        $wilayas = (DBManager::$conn)->query($wilayaQuery);
        return ($wilayas);
    }

    public function getAllLanguages()
    {
        DBManager::connection();
        $langueQuery = "SELECT * FROM `Langue`";
        $langues = (DBManager::$conn)->query($langueQuery);
        return ($langues);
    }

    //gets all trad with specified filtes in index.php 
    // langages + asérmenté
    public function getFiltredTraducteur($langueSrcId, $langueDestId, $asserment)
    {
        DBManager::connection();
        $langueQuery = 'SELECT * FROM
            (SELECT * FROM Traducteur t JOIN MaitriseLangue m on m.traducteur_id=t.idTraducteur and t.assermente=0) tab1 JOIN 
            (SELECT * FROM Traducteur t JOIN MaitriseLangue m on m.traducteur_id=t.idTraducteur and t.assermente=0) tab2 
            on tab1.idTraducteur=tab2.idTraducteur and (tab1.langue_id = ' . $langueSrcId . ' and tab2.langue_id= ' . $langueDestId . ') or (tab1.langue_id = ' . $langueDestId . ' and tab2.langue_id=' . $langueSrcId .')';
        $langues = (DBManager::$conn)->query($langueQuery);
        return ($langues);
    }

    public function getTraducteurByEmail($email)
    {
        if (DBManager::$conn == NULL) {
            DBManager::connection();
        }
        DBManager::connection();
        $traducteurQuery = 'SELECT * FROM Traducteur c WHERE c.email="' . $email . '"';
        $traducteur = (DBManager::$conn)->query($traducteurQuery);

        return $traducteur;
    }

    public function getTraducteurById($id)
    {
        if (DBManager::$conn == NULL) {
            DBManager::connection();
        }
        DBManager::connection();
        $traducteurQuery = 'SELECT * FROM Traducteur c WHERE c.idTraducteur="' . $id . '"';
        $traducteur = (DBManager::$conn)->query($traducteurQuery);

        return $traducteur;
    }


    public function createTraducteur($email, $password)
    {
        if (DBManager::$conn == NULL) {
            DBManager::connection();
        }
        $userQuery = 'INSERT INTO `Client` (`email`, `password`) VALUES ("' . $email . '", "' . $password . '")';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }



    //get number of demandes de devis
    public function getNbDemabdesDevis($id)
    {
        DBManager::connection();

        $userQuery = 'SELECT count(idDemandeDevis) as nbDemandesDevis FROM `DemandeDevis` WHERE traducteur_id=' . $id . ';';
        // echo $userQuery;
        // echo '<br>';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }

    //get number of demandes de traductions
    public function getNbDemabdesTraductions($id)
    {
        DBManager::connection();

        $userQuery = 'SELECT count(idDemandeTrad) as nbDemandesTrad FROM `DemandeTraduction` WHERE traducteur_id=' . $id . ';';
        // echo $userQuery;
        // echo '<br>';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }

    public function blockTraducteur($id){
        DBManager::connection();
        $userQuery = 'UPDATE `Traducteur` SET `status`="blocked" WHERE idTraducteur='.$id.';';
         echo $userQuery;
        // echo '<br>';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }

    public function deblockTraducteur($id){
        DBManager::connection();
       
        $userQuery = 'UPDATE `Traducteur` SET `status`="active" WHERE idTraducteur='.$id.';';
        // echo $userQuery;
        // echo '<br>';
        $user = (DBManager::$conn)->query($userQuery);
        return $user;
    }
}
