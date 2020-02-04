<?php

require_once __DIR__ .'/models/dbManager.php';
require_once __DIR__ .'/models/userModel.php';
require_once __DIR__ . '/models/traducteurModel.php';


$t = new TraducteurModel();
$traducteurs =$t->getAllTraducteurs();


 if(isset( $_POST['langueSrcFilter'])){$langSrc = $_POST['langueSrcFilter'];}
 if(isset( $_POST['langueDestFilter'])){$langDst = $_POST['langueDestFilter'];}
 if(isset( $_POST['assermenteFilter'])){$assermented = $_POST['assermenteFilter'];}

 if($assermented=='on'){
  $assermentedVal = 1;
 }
 else{
  $assermentedVal = 0;
 }
 //$traducteurs =$t->getFiltredTraducteur($langSrc, $langDst , $assermentedVal);

echo ' <ul class="collection">';

foreach($traducteurs as $row){
    
  $langues=null;
  $note=null;
    //getting the mastered languages for singleTranslator 
    $langues=$t->getLanguagesForSingleTraducteur($row['idTraducteur']);
    $note=$t->getTraducteurNote($row['idTraducteur']);
    
    echo'
   
    <li class="collection-item avatar   card-panel hoverable">
    <div style="z-index:0; margin:5px" class="left">
    <label>
    <input  type="checkbox" name="traducteurs_ckecked[]" value="'.$row['idTraducteur'].'" class="filled-in"  style="pointer-events: auto;" />
    <span>Choisir</span>
    </label>
    </div>
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
    <a class="waves-effect waves-teal btn-flat   blue lighten-3" href="public-traducteur-profile.php?id='.$row['idTraducteur'].'" target="_blank">Profile</a>

  </li>   </br>';
}

echo '</ul>';
?>

   
   