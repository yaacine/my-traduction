<?php
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__ . '/../models/userModel.php';

require_once __DIR__ . '/globalItems.php';

class TraducteurProfileView
{
    public function getContent()
    {
        
        $g = new GlobalItems();
        $g->getPageHead();
        $g->getNavbar();

        $userId= $_SESSION["userId"] ;
        $userM = new UserModel();
        $users =$userM->getUserById($userId);
        
        $user =array_pop(array_reverse($users));
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
                        </div>
                    </div>
                    <div class="blue-grey lighten-5">
                        flutter
                    </div>
                </div>
                <div class="col s12 m8">

                    <ul id="tabs-swipe-demo black" class="tabs ">
                        <li class="tab col s4"><a href="#test-swipe-1">Mes demandes de devis</a></li>
                        <li class="tab col s4"><a class="active" href="#test-swipe-2">Mes demandes de Traduction</a></li>
                        <li class="tab col s4"><a href="#test-swipe-3">Test 3</a></li>
                    </ul>
                    <div id="test-swipe-1" class="col s12 ">
                        <ul class="collapsible popout">
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
                                <div class="collapsible-header"><i class="material-icons">arrow_forward</i>Second</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                            </li>
                        </ul>
                        
                    </div>
                    <div id="test-swipe-2" class="col s12">
                        <ul class="collapsible popout">
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

                                    <div>
                                        <p> <b>Montant: </b> 12345 DZD</p>
                                    </div>
                                    <p> <b>Commentaire : </b> Lorem ipsum dolor sit amet.</p>
                                    <div style="display:flex; justify-content:space-between">
                                        <a class="waves-effect waves-teal btn-flat grey lighten-3">Voir Le fichier</a>
                                        <button class="btn waves-effect waves-light modal-trigger"  href="#modal1" name="action">Annuler
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">arrow_forward</i>Second</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                            </li>
                        </ul>
                    </div>
                    <div id="test-swipe-3" class="col s12 green">Test 3</div>

                </div>
            </div>

        </div>

        <!-- modal of cancelling demande devis -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Confirmation</h4>
                <p>Etes-vous sur de vouloir annuler cette demande de devis</p>
            </div>
            <div class="modal-footer " style="display:flex; justify-content:space-between">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Confirmer</a>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Retour</a>
            </div>
        </div>

        <!-- modal of cancelling demande traduction -->
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4>Confirmation</h4>
                <p>Etes-vous sur de vouloir annuler cette demande de traduction</p>
            </div>
            <div class="modal-footer" style="display:flex; justify-content:space-between">
            <a href="#!" class="modal-close waves-effect waves-red btn-flat">Disagree</a>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
          </div>
        </div>
<?php

    }
}
?>