<?php
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__.'/globalItems.php';

class NosTraducteursView{
    public function getContent(){
       
        $g= new GlobalItems();
        $g->getPageHead(); 
        $g->getNavbar();
        $t = new TraducteurModel();
        $traducteurs =$t->getAllTraducteurs();

        ?>

    <div class="nosTraducteurs-content">
    <div class="row">
    
      <div class="col s2"> </div>
      <div class="col s12 m8">
        <h4>Nos Traducteurs</h4>
       
        <ul class="collection">

        <?php
        foreach($traducteurs as $row){
          $langues=null;
          $note=null;
            //getting the mastered languages for singleTranslator 
            $langues=$t->getLanguagesForSingleTraducteur($row['idTraducteur']);
            $note=$t->getTraducteurNote($row['idTraducteur']);
            
            echo'
            
            <li class="collection-item avatar    card-panel hoverable">
            <img src="assets/img_avatar2.png" alt="" class="circle responsive-img">
            <h4 >'.$row['nom'].' '.$row['prenom'].'</h4>
            <h5 >'.$row['wilaya'].'</h5>
            <p><b>Commune :  </b> '.$row['commune'].' </p>
            <p><b>Adresse :  </b>  '.$row['adresse'].' </p>
            <p><b>Email :  </b> '.$row['email'].'</p>
            <p><b>Telephone :  </b>  '.$row['telephone'].'</p>
            <p><b>Fax :  </b>  '.$row['fax'].'</p>
            <a href="#!" class="secondary-content">';

            for ($x = 0; $x <$note; $x++) {
              echo  '<i class="material-icons ">grade</i>';
            }

            //complete with white stars
            if($note<5){
              for ($x; $x <5; $x++) {
                echo  '<i class="material-icons " style="color:#eeeeee">grade</i>';
              }
            }
           
             echo '</a>
            ';
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
              <a class="waves-effect waves-teal btn" href="public-traducteur-profile.php?id='.$row['idTraducteur'].'">Visiter le profile</a>
          </li>   </br>';
        }
        ?>
        </ul>
      </div>
      <div class="col s2"></div>
    </div>
    </div>
        <?php
    }
}
?>   
