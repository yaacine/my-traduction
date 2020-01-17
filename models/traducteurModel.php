<?php


class TraducteurModel{
   private $conn = null;
   private function connection(){
    
    // import database configuration
        include 'config.php';
        $hostname=$config['DB_HOST'];
        $dbname=$config['DB_DATABASE'];
        $username = $config['DB_USERNAME'];
        $password=$config['DB_PASSWORD'];

        try {
            $this->conn = new PDO("mysql:host= $hostname;dbname= $dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
   }

   private function getAllTraducteurs(){
        if($this->conn==null){
            $this->connection();
        }
        $formationsQuery ="SELECT * FROM Traducteur t LEFT OUTER JOIN MaitriseLangue m ON t.idTraducteur=m.traducteur_id 
                        LEFT OUTER JOIN Langue l on m.langue_id=l.idLangue";
        return ($this->conn->query($formationsQuery) );
   }
   

 
}

?>