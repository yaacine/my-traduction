<?php
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__ . '/../models/userModel.php';
require_once __DIR__ . '/../models/demandeDevisModel.php';
require_once __DIR__ . '/../models/demandeTraductionModel.php';
require_once __DIR__ . '/globalItems.php';

class PublicTraducteurProfileView
{

    public $id ;
    function __construct($idT){
        $this->id= $idT;
    }
    
    public function getContent()
    {
        $g = new GlobalItems();
        $g->getPageHead();
        $g->getNavbar();

        $userId = $this->id;
        $userM = new TraducteurModel();

        $users = $userM->getTraducteurById($userId);


        //get the user
        foreach ($users as $row) {

            $user = $row;
        }

        $langues=$userM->getLanguagesForSingleTraducteur( $userId );
        $note=$userM->getTraducteurNote( $userId );
        

        echo '
        
        <div id="content">
            <div class="row">
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/slider/download.jpeg">
                         
                        </div>
                        <div class="card-content">
                            <span class="card-title" style="color: black"> ' . $user['nom'] . ' ' . $user['prenom'] . ' </span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                            
                        </div>
                    </div>

                </div>


        <div class="col s12 m8">          
                         <div class="blue-grey lighten-5 " style="padding:10px;">
                               <p><b>Nom:</b> ' . $user['nom'] . '</p> 
                               <p><b>Prenom:</b> ' . $user['prenom'] . '</p> 
                               <p><b>email:</b> ' . $user['email'] . '</p> 
                               <p><b>Wilaya:</b> ' . $user['wilaya'] . '</p> 
                               <p><b>Commune:</b> ' . $user['commune'] . '</p> 
                               <p><b>Adresse:</b> ' . $user['adresse'] . '</p> 
                               <p><b>Telephone:</b> ' . $user['telephone'] . '</p> 
                               <p><b>Fax:</b> ' . $user['fax'] . '</p> <br>
                         
            ';
            for ($x = 0; $x <$note; $x++) {
                echo  '<i class="material-icons ">grade</i>';
              }
  
              //complete with white stars
              if($note<5){
                for ($x; $x <5; $x++) {
                  echo  '<i class="material-icons " style="color:#FFF">grade</i>';
                }
              }
              ?>
              <br>

     
              <br>
              <?php
              if($langues !=NULL && count($langues)>0){
                foreach($langues as $rowLangue){
                  
                    if(!empty($rowLangue['designation'])){
                    echo'
                    <div class="chip">
                    '.$rowLangue['designation'].'
                    </div>
                    ';}
                }
            }
             
            
            echo'
            
            <br>
            <br>
            <br>'
            ;
            session_start();
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                echo'
                <div class="red lighten-3" style="padding:30px ;border-radius: 10px ">
                
             <h4>Attention</h4>
             <p>Cette section est réservée pour signaler ce Traducteur en cas de mauvais service</p>
             
                <form action="controllers/signalTraducteur.php" method="post">
                  <input type="hidden" name="idTraducteur" value="'.$userId.'">
                  <textarea name="motif" id="mitif" cols="100" rows="10"></textarea>
                  <input type="submit" class="btn" name="submitSignal" value="Signaler">
                </form>
                </div>
              
                ';
            }
            echo'
            </div>
        </div>
        
        ';
    }
}
?>

