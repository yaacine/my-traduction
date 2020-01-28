<?php
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__ . '/../models/userModel.php';
require_once __DIR__ . '/../models/demandeDevisModel.php';
require_once __DIR__ . '/../models/demandeTraductionModel.php';
require_once __DIR__ . '/globalItems.php';

class ClientProfileView
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

?>

        <div id="content">
            <div class="row">
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/slider/download.jpeg">
                            <a class="btn-floating halfway-fab  waves-light red"><i class="material-icons blue-grey">edit</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title" style="color: black">User Name</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                            <br>
                            <div class="blue-grey lighten-5">
                                flutter
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col s12 m8">

                    <ul id="tabs-swipe-demo black" class="tabs ">
                        <li class="tab col s4"><a href="#test-swipe-1">Mes demandes de devis</a></li>
                        <li class="tab col s4"><a class="active" href="#test-swipe-2">Mes demandes de Traduction</a></li>
                        <li class="tab col s4"><a href="#test-swipe-3">Test 3</a></li>
                    </ul>

                    <!-- demandes de devis -->
                    <div id="test-swipe-1" class="col s12 ">
                        <ul class="collapsible popout">
                            <?php

                            $demandeDevisM = new DemandeDevisModel();
                            $ListDemandesDevis = $demandeDevisM->getDemandeDevisForClient($userId);
                            foreach ($ListDemandesDevis as $row) {

                                $phpdate = strtotime($row['date']);
                                $mysqldate = date('Y-m-d à H:i', $phpdate);
                                if ($row['status'] != 'archivée') {
                                    echo ' 
                                    <li>
                                    <div class="collapsible-header ">
                                        <i class="material-icons">announcement</i>
                                        <div style="width:100% ;display:flex; justify-content:space-between">
                                            <div class=""> <a href="http://" target="_blank" rel="noopener noreferrer">
                                                    <h6>' . $row['nomTrad'] . ' ' . $row['prenomTrad'] . '</h6>
                                                </a></div>
                                            <div class=""> <b>Soumise le :</b> ' . $mysqldate . '</div>
                                            <div class=""><b>Etat :</b>  ' . $row['status'] . '</div>
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
                                    if (isset($row['commentaire']) && !empty($row['commentaire'])) {
                                        echo ' <p><b>Mon Commentaire : </b> ' . $row['commentaire'] . ' </p>';
                                    }

                                    if (isset($row['montant']) && !empty($row['montant'])) {
                                        echo ' <p><b>Montant Proposé: </b> ' . $row['montant'] . ' DZD</p>';
                                    }

                                    if (isset($row['responseCommentaire']) && !empty($row['responseCommentaire'])) {
                                        echo ' <p><b>Commentaire du traducteur: </b> ' . $row['responseCommentaire'] . ' </p>';
                                    }


                                    echo '
                                        <div style="display:flex; justify-content:space-between">
                                            <a class="waves-effect waves-teal btn-flat grey lighten-3">Document Original</a>';
                                    if ($row['status'] == "ouverte") {
                                        echo '
                                                     <button class="btn waves-effect waves-light modal-trigger" onclick=deleteDemandeDevis(' . $row['idDemandeDevis'] . ') href="#modal1" name="action">Annuler
                                                    <i class="material-icons right">send</i>
                                                    </button>
                                                ';
                                    } elseif ($row['status'] == "refusée") {
                                        echo '
                                                    <form action="controllers/ressoumettreDemandeDevis.php" enctype="multipart/form-data" method="post">
                                                        <input type="hidden" name="idDemandeDevisResoumettre" value="' . $row['idDemandeDevis'] . '" id="hiddenResoumettreDemandeDevis">
                                                        <button type="submit" class="btn waves-effect waves-light modal-trigger"  name="action">Ressoumettre
                                                        <i class="material-icons right">send</i>
                                                        </button>
                                                    </form>
                                                ';
                                    } elseif ($row['status'] == "acceptée") {
                                        echo '
                                                 <form action="controllers/demanderTraductionDemandeDevis.php" enctype="multipart/form-data" method="post">
                                                    <input type="hidden" name="idDemandeDevisTraduire" value="' . $row['idDemandeDevis'] . '" id="hiddenTraduireDemandeDevis">
                                                     <button type="submit" class="btn waves-effect waves-light modal-trigger" name="action">Demander La Traduction
                                                    <i class="material-icons right">send</i>
                                                    </button>
                                                </form>';
                                    } elseif ($row['status'] == "soumise pour traduction") {
                                        echo ' <form action="controllers/archiverDemandeDevis.php" enctype="multipart/form-data" method="post">
                                                    <input type="hidden" name="idDemandeDevisArchiver" value="' . $row['idDemandeDevis'] . '" id="hiddenArchiverDemandeDevis">
                                                    <button type="submit" class="btn waves-effect waves-light modal-trigger"  name="action">Archiver
                                                    <i class="material-icons right">send</i>
                                                    </button>
                                                </form>';
                                    }
                                    echo '  
                                        </div>
    
                                    </div>
                                </li>';
                                }
                            }
                            ?>

                        </ul>
                    </div>

                    <!-- demandes de traductions  -->
                    <div id="test-swipe-2" class="col s12">
                        <ul class="collapsible popout">
                            <?php

                            $demandeDevisM = new DemandeDevisModel();
                            $demandeTraductionM = new DemandeTraductionModel();
                            $ListDemandesTrad = $demandeTraductionM->getDemandeTraductionForClient($userId);
                            foreach ($ListDemandesTrad as $row) {

                                $phpdate = strtotime($row['date']);
                                $mysqldate = date('Y-m-d à H:i', $phpdate);
                                if ($row['status'] != 'archivée') {
                                    echo ' 
                                    <li>
                                    <div class="collapsible-header ">
                                        <i class="material-icons">announcement</i>
                                        <div style="width:100% ;display:flex; justify-content:space-between">
                                            <div class=""> <a href="http://" target="_blank" rel="noopener noreferrer">
                                                    <h6>' . $row['nomTrad'] . ' ' . $row['prenomTrad'] . '</h6>
                                                </a></div>
                                            <div class=""> <b>Soumise le :</b> ' . $mysqldate . '</div>
                                            <div class=""><b>Etat :</b>  ' . $row['status'] . '</div>
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
                                    if (isset($row['commentaire']) && !empty($row['commentaire'])) {
                                        echo ' <p><b>Mon Commentaire : </b> ' . $row['commentaire'] . ' </p>';
                                    }

                                    if (isset($row['montant']) && !empty($row['montant'])) {
                                        echo ' <p><b>Montant Proposé: </b> ' . $row['montant'] . ' DZD</p>';
                                    }

                                    if (isset($row['responseCommentaire']) && !empty($row['responseCommentaire'])) {
                                        echo ' <p><b>Commentaire du traducteur: </b> ' . $row['responseCommentaire'] . ' </p>';
                                    }


                                    echo '
                                        <div style="display:flex; justify-content:space-between">
                                            <a class="waves-effect waves-teal btn-flat grey lighten-3" href="uploads/01:40:11pmEssay Form_Internship _2019.pdf" target="_blank">Document Original <i class="material-icons right">attach_file</i></a>';
                                    if ($row['status'] == "ouverte") {
                                        echo '
                                                     <button class="btn waves-effect waves-light modal-trigger" onclick=deleteDemandeTraduction(' . $row['idDemandeTrad'] . ') href="#modal2" name="action">Annuler
                                                    <i class="material-icons right">send</i>
                                                    </button>
                                                ';
                                    } elseif ($row['status'] == "refusée") {
                                        echo '
                                                    <form action="controllers/ressoumettreDemandeTraduction.php" enctype="multipart/form-data" method="post">
                                                        <input type="hidden" name="idDemandeTraductionResoumettre" value="' . $row['idDemandeTrad'] . '" id="hiddenResoumettreDemandeDevis">
                                                        <button type="submit" class="btn waves-effect waves-light modal-trigger"  name="action">Ressoumettre
                                                        <i class="material-icons right">send</i>
                                                        </button>
                                                    </form>
                                                ';
                                    } elseif ($row['status'] == "acceptée") {
                                        echo '
                   
                                                     <button id="payer_btn" type="submit" class="btn waves-effect waves-light modal-trigger"  onclick=payerDemandeTraduction(' . $row['idDemandeTrad'] . ')  href="#modal-payement"   name="action">Payer
                                                    <i class="material-icons right">send</i>
                                                    </button>
                                         ';
                                    } elseif ($row['status'] == "payée") {
                                        echo ' <form action="controllers/archiverDemandeDevis.php" enctype="multipart/form-data" method="post">
                                                    <input type="hidden" name="idDemandeDevisArchiver" value="' . $row['idDemandeTrad'] . '" id="hiddenArchiverDemandeDevis">
                                                    <button type="submit" class="btn waves-effect waves-light modal-trigger"  name="action">Archiver
                                                    <i class="material-icons right">send</i>
                                                    </button>
                                                </form>';
                                    } elseif ($row['status'] == "terminée") {
                                        echo '
                                                     <button type="submit" class="btn waves-effect waves-light modal-trigger"  onclick=noterDemandeTraduction('. $row['idDemandeTrad'] .','.$row['idTraducteur']. ')  href="#modal-notation" name="action">Resultat
                                                    <i class="material-icons right">send</i>
                                                    </button>
                                         ';
                                    }
                                    elseif ($row['status'] == "achevée") {
                                        echo '
                                        <button type="submit" class="btn waves-effect waves-light modal-trigger">Document Traduit
                                        <i class="material-icons right">attach_file</i>
                                        </button>    
                                         ';
                                    }
                                    echo '  
                                        </div>
    
                                    </div>
                                </li>';
                                }
                            }
                            ?>

                        </ul>
                    </div>
                    <div id="test-swipe-3" class="col s12 green">Test 3</div>

                </div>
            </div>

        </div>


        <!-- payement feature discovery  -->
        <!-- Tap Target Structure -->
  <div class="tap-target" data-target="payer_btn">
    <div class="tap-target-content">
      <h5>Title</h5>
      <p>A bunch of text</p>
    </div>
  </div>

        <!-- modal of cancelling demande devis -->
        <div id="modal1" class="modal ">
            <div class="modal-content">
                <h4>Confirmation</h4>
                <p>Etes-vous sur de vouloir annuler cette demande de devis ?</p>
            </div>
            <div class="modal-footer">
                <form action="controllers/cancelDemandeDevis.php" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="deleteDemandeDevisId" value="none" id="hiddenDeleteDemandeDevis">
                    <button type="submit" class="modal-close waves-effect waves-green btn-flat">Confirmer</button>
                </form>

            </div>
        </div>

        <!-- modal of cancelling demande traduction -->
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4>Confirmation</h4>
                <p>Etes-vous sur de vouloir annuler cette demande de traduction ?</p>
            </div>
            <div class="modal-footer">
                <form action="controllers/cancelDemandeTraduction.php" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="deleteDemandeTraductionId" value="none" id="hiddenDeleteDemandeTraduction">
                    <button type="submit" class="modal-close waves-effect waves-green btn-flat">Confirmer</button>
                </form>
            </div>

        </div>


        <!-- modal of responding demande traduction payement -->
        <div id="modal-payement" class="modal">
            <form action="controllers/payerTraduction.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="payementDemandeTraductionId" value="none" id="payementDemandeTraductionId">
                <div class="modal-content">

                    <h4>Payement</h4>
                    <p>Demande de traduction</p>

                    <div>
                        <input type="number" placeholder="1200" name="montantTraductionInput" id="montantTraductionInput" class="validate">
                        <label for="montantTraduction">Montant Payé</label>
                        <div>
                            <!-- file uploader -->
                            <div>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="fileToUpload" multiple>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" name="fileToUpload" type="text" id="fileToUpload" placeholder="Upload one or more files">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" name="submitDemandeTraductionPayement" class=" waves-effect waves-green btn right">Confirmer</button>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ResponseDemandeTraductionId" value="none" id="hiddenResponseDemandeTraduction">
                </div>
            </form>

        </div>



            <!-- modal of responding demande traduction notation -->
            <div id="modal-notation" class="modal">
            <form action="controllers/noterTraduction.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="hiddenNotertraducteurID" value="none" id="hiddenNotertraducteurID">
                <div class="modal-content">

                    <h4>Service Fait</h4>
                    <p>Pour un meilleure service prière de noter le travail de travail du traducteur</p>

                    <div>
                        <input type="number" min="0" max="5" placeholder="1200" name="noteTraductionInput" id="noteTraductionInput" class="validate">
                        <label for="montantTraduction">Montant Payé</label>
                        <br>
                        <br>
                        <div>
                        <a class="waves-effect waves-teal btn-flat grey lighten-3">Document Traduit</a>
                        </div>
                    </div>

                    <br>
                    <button type="submit" name="submitDemandeTraductionPayement" class=" waves-effect waves-green btn right">Confirmer</button>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ResponseDemandeTraductionId" value="none" id="ResponseDemandeTraductionId">
                </div>
            </form>

        </div>
<?php

    }
}
?>