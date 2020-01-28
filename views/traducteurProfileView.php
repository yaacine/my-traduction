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
                                flutter trad
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
                            $ListDemandesDevis = $demandeDevisM->getDemandeDevisForTraducteur($userId);
                            foreach ($ListDemandesDevis as $row) {
                                
                                $phpdate = strtotime( $row['date']  );
                                $mysqldate = date( 'Y-m-d à H:i', $phpdate );
                                echo ' 
                                <li>
                                <div class="collapsible-header ">
                                    <i class="material-icons">announcement</i>
                                    <div style="width:100%;display:flex; justify-content:space-between">
                                        <div class="col s8 "> <a href="http://" target="_blank" rel="noopener noreferrer">
                                                <h6>' . $row['nomClient'] . ' ' . $row['prenomClient'] . '</h6>
                                            </a></div>
                                        <div class="col s4 ">Recue le : ' . $mysqldate. '</div>
                                        <div class="col s4 ">Etat : ' . $row['status'] . '</div>
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

                                    if(isset($row['commentaire']) &&  !empty( $row['commentaire']) ){
                                        echo ' <p><b>Commentaire : </b> ' . $row['commentaire'] . ' </p>';
                                    }
                                    if(isset( $row['responseCommentaire']) &&  !empty($row['responseCommentaire']) ){
                                        echo '<p><b>Votre commentaire de réponse : </b> ' . $row['responseCommentaire'] . ' </p>';
                                    }
                                    if(isset( $row['montant']) &&  !empty($row['montant']) ){
                                        echo '<p><b>Montant proposé: </b> ' . $row['montant'] . ' </p>';
                                    }
                                   
                                    echo'
                                    <div style="display:flex; justify-content:space-between">
                                        <a class="waves-effect waves-teal btn-flat grey lighten-3">Voir Le fichier</a>';
                                        if( $row['status']== 'ouverte'){
                                            echo'<button class="btn waves-effect waves-light modal-trigger" onclick=respondeDemandeDevis(' . $row['idDemandeDevis'] . ') href="#modal1" name="action">Repondre
                                            <i class="material-icons right">send</i>
                                        </button>';
                                        }
                                        echo'
                                        
                                    </div>

                                </div>
                            </li>';
                            }
                            ?>
                            <li>
                                <div class="collapsible-header ">
                                    <i class="material-icons">announcement</i>
                                    <div class="row" style="width:100%">
                                        <div class="col s8 "> <a href="http://" target="_blank" rel="noopener noreferrer">
                                                <h6>Zidelmal Traducteur</h6>
                                            </a></div>
                                        <div class="col s4 ">Soumise le : date</div>
                                    </div>


                                </div>
                                <div class="collapsible-body ">
                                    <div style="display:flex; justify-content:space-between">
                                        <div>
                                            <span id="langue-source" class="chip">Zidelmal yacine </span>
                                            <i class="material-icons">arrow_forward</i>
                                            <span id="langue-source" class="chip">Zidelmal yacine </span>
                                        </div>
                                        <div>
                                            <p><b>Etat : </b> En attente </p>
                                        </div>
                                    </div>

                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <div style="display:flex; justify-content:space-between">
                                        <a class="waves-effect waves-teal btn-flat grey lighten-3">Voir Le fichier</a>
                                        <button class="btn waves-effect waves-light modal-trigger" href="#modal2" name="action">Repondre
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                            </li>
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
                                $phpdate = strtotime( $row['date']  );
                                $mysqldate = date( 'Y-m-d à H:i', $phpdate );
                                echo ' 
                              <li>
                              <div class="collapsible-header ">
                                  <i class="material-icons">announcement</i>
                                  <div  style="width:100%;display:flex; justify-content:space-between">
                                      <div "> <a href="http://" target="_blank" rel="noopener noreferrer">
                                              <h6>' . $row['nomClient'] . ' ' . $row['prenomClient'] . '</h6>
                                          </a></div>
                                      <div  ">Soumise le : ' .$mysqldate . '</div>
                                      <div  ">Soumise le : ' .$row['status'].'</div>
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
                                  if(isset($row['commentaire']) &&  !empty( $row['commentaire']) ){
                                    echo ' <p><b>Commentaire : </b> ' . $row['commentaire'] . ' </p>';
                                }
                                if(isset( $row['responseCommentaire']) &&  !empty($row['responseCommentaire']) ){
                                    echo '<p><b>Votre commentaire de réponse : </b> ' . $row['responseCommentaire'] . ' </p>';
                                }
                                if(isset( $row['montant']) &&  !empty($row['montant']) ){
                                    echo '<p><b>Montant proposé: </b> ' . $row['montant'] . ' </p>';
                                }
                               
                                echo'
                                <div style="display:flex; justify-content:space-between">
                                    <a class="waves-effect waves-teal btn-flat grey lighten-3">Voir Le fichier</a>';
                                  
                                    if( $row['status']== 'ouverte'){
                                        echo'<button class="btn waves-effect waves-light modal-trigger" onclick=respondeDemandeTraduction(' . $row['idDemandeTrad'] . ') href="#modal2_traducion" name="action">Repondre
                                        <i class="material-icons right">send</i>
                                    </button>';
                                    }
                                    echo'
                                    
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
                    <input type="hidden" name="hiddenResponseDemandeDevis"  value="none" id="hiddenResponseDemandeDevis">
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
<?php

    }
}
?>