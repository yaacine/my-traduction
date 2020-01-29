<?php
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__ . '/../models/userModel.php';
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__ . '/../models/demandeDevisModel.php';
require_once __DIR__ . '/../models/demandeTraductionModel.php';
require_once __DIR__ . '/globalItems.php';

class TraducteurProfileView
{
    public function getContent()
    {


        $g = new GlobalItems();
        $g->getPageHead();
        $g->getNavbar();

        $userId = $_SESSION["userId"];
        $userM = new TraducteurModel();

        $users = $userM->getTraducteurById($userId);
        $languages = $userM->getLanguagesForSingleTraducteur($userId);
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
                            <span class="card-title" style="color: black">' . $user['nom'] . ' ' . $user['nom'] . '</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
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
                            <br>
                            <div>
                                <!-- Default with no input (automatically generated)  -->
                                ';
                                foreach($languages as $lang){
                                    echo '<div class="chip">
                                            '.$lang['designation'].'
                                         </div>';
                                }
                                echo'
                                
                            </div>
                            
                        </div>
                    </div>

                </div>';

?>


        <div id="content">
            <div class="row">

                <div class="col s12 m8">

                    <ul id="tabs-swipe-demo black" class="tabs ">
                        <li class="tab col s4"><a href="#test-swipe-1"> <b>Devis</b> </a></li>
                        <li class="tab col s4"><a class="active" href="#test-swipe-2"><b>Traduction</b></a></li>
                        <li class="tab col s4"><a href="#test-swipe-3"><b>Archives</b></a></li>
                    </ul>

                    <!-- demandes de devis -->
                    <div id="test-swipe-1" class="col s12 ">
                        <ul class="collapsible popout">
                            <?php

                            $demandeDevisM = new DemandeDevisModel();
                            $ListDemandesDevis = $demandeDevisM->getDemandeDevisForTraducteur($userId);
                            foreach ($ListDemandesDevis as $row) {

                                $phpdate = strtotime($row['date']);
                                $mysqldate = date('Y-m-d à H:i', $phpdate);
                                echo ' 
                                <li>
                                <div class="collapsible-header ">
                                    <i class="material-icons">announcement</i>
                                    <div style="width:100%;display:flex; justify-content:space-between">
                                        <div class="col s5 "> <a href="http://" target="_blank" rel="noopener noreferrer">
                                                <h6>' . $row['nomClient'] . ' ' . $row['prenomClient'] . '</h6>
                                            </a></div>
                                        <div class="col s3 "><b>Recue le : </b>' . $mysqldate . '</div>
                                        <div class="col s4 "><b>Etat : </b>' . $row['status'] . '</div>
                                    </div>


                                </div>
                                <div class="collapsible-body ">
                                    <div style="display:flex; justify-content:space-between">
                                        <div>
                                            <span id="langue-source" class="chip">' . $row['lngSrc'] . '</span>
                                            <i class="material-icons">arrow_forward</i>
                                            <span id="langue-source" class="chip">' . $row['lngDest'] . ' </span>
                                        </div>
                                        <div>
                                            <p><b>Etat : </b> ' . $row['status'] . ' </p>
                                        </div>
                                    </div>

                                   
                                    ';

                                if (isset($row['commentaire']) &&  !empty($row['commentaire'])) {
                                    echo ' <p><b>Commentaire : </b> ' . $row['commentaire'] . ' </p>';
                                }
                                if (isset($row['responseCommentaire']) &&  !empty($row['responseCommentaire'])) {
                                    echo '<p><b>Votre commentaire de réponse : </b> ' . $row['responseCommentaire'] . ' </p>';
                                }
                                if (isset($row['montant']) &&  !empty($row['montant'])) {
                                    echo '<p><b>Montant proposé: </b> ' . $row['montant'] . ' </p>';
                                }

                                echo '
                                    <div style="display:flex; justify-content:space-between">
                                        <a class="waves-effect waves-teal btn-flat grey lighten-3">Voir Le fichier</a>';
                                if ($row['status'] == 'ouverte') {
                                    echo '<button class="btn waves-effect waves-light modal-trigger" onclick=respondeDemandeDevis(' . $row['idDemandeDevis'] . ') href="#modal1" name="action">Repondre
                                            <i class="material-icons right">send</i>
                                        </button>';
                                }
                                echo '
                                        
                                    </div>

                                </div>
                            </li>';
                            }
                            ?>

                        </ul>

                    </div>

                    <!-- demandes de traductions  -->
                    <div id="test-swipe-2" class="col s12">
                        <ul class="collapsible popout">
                            <?php

                            //   $demandeDevisM = new DemandeDevisModel();
                            $demandeTraductionM = new DemandeTraductionModel();
                            $ListDemandesTrad = $demandeTraductionM->getDemandeTraductionForTraducteur($userId);
                            foreach ($ListDemandesTrad as $row) {
                                $phpdate = strtotime($row['date']);
                                $mysqldate = date('Y-m-d à H:i', $phpdate);
                                echo ' 
                              <li>
                              <div class="collapsible-header ">
                                  <i class="material-icons">announcement</i>
                                  <div  style="width:100%;display:flex; justify-content:space-between">
                                      <div class="col s5 "> <a href="http://" target="_blank" rel="noopener noreferrer">
                                              <h6>' . $row['nomClient'] . ' ' . $row['prenomClient'] . '</h6>
                                          </a></div>
                                      <div  class="col s3 "><b>Soumise le :</b> ' . $mysqldate . '</div>
                                      <div  class="col s4 "> <b>Etat : </b>' . $row['status'] . '</div>
                                  </div>


                              </div>
                              <div class="collapsible-body ">
                                  <div style="display:flex; justify-content:space-between">
                                      <div>
                                          <span id="langue-source" class="chip">' . $row['lngSrc'] . '</span>
                                          <i class="material-icons">arrow_forward</i>
                                          <span id="langue-source" class="chip">' . $row['lngDest'] . ' </span>
                                      </div>
                                      <div>
                                          <p><b>Etat : </b> ' . $row['status'] . ' </p>
                                      </div>
                                  </div>';
                                if (isset($row['commentaire']) &&  !empty($row['commentaire'])) {
                                    echo ' <p><b>Commentaire : </b> ' . $row['commentaire'] . ' </p>';
                                }
                                if (isset($row['responseCommentaire']) &&  !empty($row['responseCommentaire'])) {
                                    echo '<p><b>Votre commentaire de réponse : </b> ' . $row['responseCommentaire'] . ' </p>';
                                }
                                if (isset($row['montant']) &&  !empty($row['montant'])) {
                                    echo '<p><b>Montant proposé: </b> ' . $row['montant'] . ' </p>';
                                }

                                echo '
                                <div style="display:flex; justify-content:space-between">
                                    <a class="waves-effect waves-teal btn-flat grey lighten-3">Voir Le fichier</a>';

                                if ($row['status'] == 'ouverte') {
                                    echo '<button class="btn waves-effect waves-light modal-trigger" onclick=respondeDemandeTraduction(' . $row['idDemandeTrad'] . ') href="#modal2_traducion" name="action">Repondre
                                        <i class="material-icons right">send</i>
                                    </button>';
                                } elseif ($row['status'] == 'payée') {
                                    echo '  
                                         <form action="controllers/entammerTraduction.php" enctype="multipart/form-data" method="post">
                                            <input type="hidden" name="idDemandeTraductionPayee" value="' . $row['idDemandeTrad'] . '" id="idDemandeTraductionPayee">
                                            <button type="submit" class="btn waves-effect waves-light modal-trigger"  name="submitDemandeTraductionPayee">Marquer Entammée
                                            <i class="material-icons right">assignment_turned_in</i>
                                            </button>
                                        </form>
                                    ';
                                } elseif ($row['status'] == 'entammée') {
                                    echo '<button class="btn waves-effect waves-light modal-trigger" onclick=resultDemandeTraduction(' . $row['idDemandeTrad'] . ') href="#modal2_resultat" name="action">Soumttre 
                                        <i class="material-icons right">done</i>
                                    </button>';
                                }
                                echo '
                                    
                                </div>

                            </div>
                        </li>';
                            }
                            ?>

                        </ul>
                    </div>
                    <div id="test-swipe-3" class="col s12 green">Test 3</div>

                </div>
            </div>

        </div>

        <!-- modal of responding for demande devis -->
        <div id="modal1" class="modal ">
            <form action="controllers/responseDemandeDevis.php" enctype="multipart/form-data" method="post">

                <div class="modal-content">

                    <h4>Repondre</h4>
                    <p>Demande de devis de traduction</p>
                    <select id="demandeDevisReponse" name="demandeDevisReponse" class="validate">
                        <option value="" disabled selected>Choisir une Reponse</option>
                        <option value="refuser">Refuser</option>
                        <option value="accepter">Accepter</option>
                    </select>
                    <input type="hidden" name="hiddenResponseDemandeDevis" value="none" id="hiddenResponseDemandeDevis">
                    <div id="montantDevisTraduction">
                        <input type="number" placeholder="1200" name="montantDevisTraductionInput" id="montantDevisTraductionInput" class="validate">
                        <label for="montantDevisTraduction">Montant</label>
                    </div>
                    <textarea name="commentReponseDemandeDevis" id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Commantaire (Optionnel) </label>
                    <br>
                    <button type="submitResponseDemandeDevis" name="submitResponseDemandeDevis" class=" waves-effect waves-green btn right">Confirmer</button>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ResponseDemandeDevisId" value="none" id="hiddenResponseDemandeDevis">
                </div>
            </form>
        </div>

        <!-- modal of responding demande traduction -->
        <div id="modal2_traducion" class="modal ">
            <form action="controllers/responseDemandeTraduction.php" enctype="multipart/form-data" method="post">

                <div class="modal-content">

                    <h4>Repondre</h4>
                    <p>Demande de traduction</p>
                    <select id="demandeTraductionReponse" name="demandeTraductionReponse" class="validate">
                        <option value="" disabled selected>Choisir une Reponse</option>
                        <option value="refuser">Refuser</option>
                        <option value="accepter">Accepter</option>
                    </select>

                    <div id="montantTraduction">
                        <input type="number" placeholder="1200" name="montantTraductionInput" id="montantTraductionInput" class="validate">
                        <label for="montantTraduction">Montant</label>
                    </div>
                    <textarea name="commentReponseDemandeTraduction" id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Commantaire (Optionnel) </label>
                    <br>
                    <button type="submit" name="submitResponseDemandeTraduction" class=" waves-effect waves-green btn right">Confirmer</button>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ResponseDemandeTraductionId" value="none" id="ResponseDemandeTraductionId">
                </div>
            </form>

        </div>



        <!-- modal of  traduction result submitting -->
        <div id="modal2_resultat" class="modal">
            <form action="controllers/terminerTraduction.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="hiddenNotertraducteurID" value="none" id="hiddenNotertraducteurID">
                <div class="modal-content">

                    <h4>Fin De Traduction</h4>
                    <p>Veuillez vous assurez de soumettres les bons documents </p>

                    <!-- file uploader -->
                    <div>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="fileToUploadResult" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="fileToUploadResult" type="text" id="fileToUploadResult" placeholder="Upload one or more files">
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" name="submitDemandeTraductionResult" class=" waves-effect waves-green btn right">Soumettre</button>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ResultDemandeTraductionId" value="none" id="ResultDemandeTraductionId">
                </div>
            </form>

        </div>

        <!-- update profile modal  -->
        <div id="modal-profile" class="modal">
            <div class="modal-content">
                <form action="controllers/editTraducteurProfile.php.php" enctype="multipart/form-data" method="post">

                    <h4>Mon Compte</h4>
                    <p>Mise à jour des informations du compte</p>

                    <div class="row">
                        <div class="input-field col s4">
                            <input placeholder="Prenom" id="first_name" name="first_name" type="text" value="<?php echo $user['prenom'] ?>" class="validate" />
                            <label for="first_name">Prenom</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="last_name" name="last_name" type="text" value="<?php echo $user['nom'] ?>" class="validate" />
                            <label for="last_name">Nom</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="email" name="email" type="email" class="validate" value="<?php echo $user['email'] ?>" />
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="commune" name="commune" type="text" class="validate" value="<?php echo $user['commune'] ?>" />
                            <label for="commune">Commune</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="wilayaicon" name="wilaya" type="text" class="validate" value="<?php echo $user['wilaya'] ?>" />
                            <label for="wilayaicon">Wilaya</label>
                        </div>
                        <div class="input-field col s4">
                            <textarea id="adresse" name="adresse" class="materialize-textarea" value="<?php echo $user['adresse'] ?>"></textarea>
                            <label for="adresse">Adresse</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input id="icon_telephone" name="telephone" type="tel" class="validate" value="<?php echo $user['telephone'] ?>" />
                            <label for="icon_telephone">Telephone</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">local_printshop</i>
                            <input id="icon_fax" name="fax" type="tel" class="validate" value="<?php echo $user['fax'] ?>" />
                            <label for="icon_fax">Fax</label>
                        </div>
                    </div>
                    <br>
                    <div class="mastred-languages">

                        <div class="chips chips-autocomplete"></div>

                    </div>
                    <?php
                        echo " <script>
                        // Or with jQuery

                        $('.chips').chips();
                      
                        $('.chips-autocomplete').chips({
                            placeholder: 'Ajoutez une langue',
                            secondaryPlaceholder: '+Langue',
                            data: [
                                
                                {
                                    tag: 'Francais',
                                  }, {
                                    tag: 'Anglais',
                                  },";

                                foreach ($languages as $chipsLang){
                                    echo" {
                                        tag: 'Apple',
                                      },{
                                        tag: 'allo',
                                    },";
                                }
                                echo"
                               ],
                            autocompleteOptions: {
                                data: {
                                    'Apple': null,
                                    'Microsoft': null,
                                    'Google': null
                                },
                                limit: Infinity,
                                minLength: 1
                            }
                        });
                    </script>";
                    ?>

                    <br>
                    <button type="submit" class="waves-effect waves-green btn right">Appliquer</button>
                </form>
            </div>

            <div class="modal-footer">
                <input type="hidden" name="deleteDemandeDevisId" value="none" id="hiddenDeleteDemandeDevis">
            </div>

        </div>
<?php

    }
}
?>