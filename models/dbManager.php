<?php

class DBManager{
   public static $conn = 'NULL';
   public static function connection(){
    // import database configuration
        include 'config.php';
        $hostname=$config['DB_HOST'];
        $dbname=$config['DB_DATABASE'];
        $username = $config['DB_USERNAME'];
        $password=$config['DB_PASSWORD'];
    
        try {
            DBManager::$conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            DBManager::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully" ;
                
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
   }
 
}

?>