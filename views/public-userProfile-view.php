<?php
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__ . '/../models/userModel.php';
require_once __DIR__ . '/../models/demandeDevisModel.php';
require_once __DIR__ . '/../models/demandeTraductionModel.php';
require_once __DIR__ . '/globalItems.php';

class PublicClientProfileView
{
    public function getContent()
    {
        $g = new GlobalItems();
        $g->getPageHead();
        $g->getNavbar();

        $userId = $_SESSION["userId"];
        $userM = new UserModel();

        $users = $userM->getUserById($userId);

        //get the user
        foreach ($users as $row) {

            $user = $row;
        }

        echo '
        
        <div id="content">
            <div class="row">
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/slider/download.jpeg">
                            <a class="btn-floating halfway-fab  waves-light red modal-trigger" href="#modal-profile"><i class="material-icons blue-grey">edit</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title" style="color: black"> ' . $user['nom'] . ' ' . $user['prenom'] . ' </span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                            
                        </div>
                    </div>

                </div>


        <div class="col s12 m8">
                    <br>
                            <div class="blue-grey lighten-5 " style="padding:10px;">
                               <p><b>Nom:</b> ' . $user['nom'] . '</p> 
                               <p><b>Prenom:</b> ' . $user['prenom'] . '</p> 
                               <p><b>email:</b> ' . $user['email'] . '</p> 
                               <p><b>Wilaya:</b> ' . $user['wilaya'] . '</p> 
                               <p><b>Commune:</b> ' . $user['commune'] . '</p> 
                               <p><b>Adresse:</b> ' . $user['adresse'] . '</p> 
                               <p><b>Telephone:</b> ' . $user['telephone'] . '</p> 
                               <p><b>Fax:</b> ' . $user['fax'] . '</p> <br>
                            </div>
        </div>';
    }
}
?>

