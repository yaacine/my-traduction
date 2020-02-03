<?php
require_once __DIR__ . '/../models/articleModel.php';
require_once __DIR__ . '/../models/traducteurModel.php';
require_once __DIR__ . '/../controllers/authController.php';


class IndexView
{
  public function getContent()
  {
    //   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    //  header("Cache-Control: post-check=0, pre-check=0", false);
    //  header("Pragma: no-cache");

    $g = new GlobalItems();
    $g->getPageHead();
    $g->getNavbar();

    $a = new ArticleModel();
    $t = new TraducteurModel();
    $articles = $a->getAllArticles();
    $langues = $t->getAllLanguages();
    $langues2 = $t->getAllLanguages();

?>

    <div class="carousel carousel-slider my-carousel-slider" style="height: 40vmin;">
      <a class="carousel-item" href="#one!"><img src="./assets/slider/download.jpeg" alt="test"></a>
      <a class="carousel-item" href="#two!"><img src="./assets/slider/download.jpeg"></a>
      <a class="carousel-item" href="#three!"><img src="./assets/slider/download.jpeg"></a>
      <a class="carousel-item" href="#four!"><img src="./assets/slider/download.jpeg"></a>
    </div>
    <div id="content">

      <div class="row">
        <div id="articles-section" class="col s5">
          <h3 style="text-align: center">Lire les derniers articles</h4>

            <?php
            foreach ($articles as $row) {
              echo '
             <div class="card">
             <div class="card-image waves-effect waves-block waves-light">
               <img class="activator" src="./assets/slider/download.jpeg">
             </div>
             <div class="card-content">
               <span class="card-title activator grey-text text-darken-4">' . $row['title'] . '<i class="material-icons right">more_vert</i></span>
               <p>Enim deserunt quis veniam esse excepteur laborum exercitation culpa duis sunt sint ut. Nisi laborum eu sint sit ea nulla voluptate officia et et aute. Pariatur veniam esse Lorem consectetur reprehenderit elit. Magna ea laboris proident sunt labore voluptate eu velit nostrud commodo culpa in. Ad eu ipsum ad est aliqua ex dolor ad consequat velit do qui esse.</p>
               <p><a href="#">Lire la suite</a></p>
             </div>
             <div class="card-reveal">
               <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
               <p>Here is some more information about this product that is only revealed once clicked on.</p>
             </div>
           </div>';
            }

            ?>



        </div>
        <div id="empty-sction" class="col s1 "></div>

        <!-- partie droite (formulaire de demande de devis) -->
        <div id="form-sction" class="col s6 center-align collection blue-grey lighten-5">

          <?php
          if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
            echo '<div id="user-control">
           <a href="#login" class="waves-effect waves-light btn-large  blue-grey darken-3 modal-trigger">Connecion</a>
           Ou
           <a href="#register-modal" class="waves-effect waves-light btn-large blue-grey darken-3 modal-trigger">Inscription</a>
         </div>
         <div class="divider"></div>
         <span>
           <h4>Ou</h4>
         </span>';
          }elseif(!isset($_SESSION["loggedin"]) ){
            echo '<div id="user-control">
            <a href="#login" class="waves-effect waves-light btn-large  blue-grey darken-3 modal-trigger">Connecion</a>
            Ou
            <a href="#register-modal" class="waves-effect waves-light btn-large blue-grey darken-3 modal-trigger">Inscription</a>
          </div>
          <div class="divider"></div>
          <span>
            <h4>Ou</h4>
          </span>';
          }
          ?>
         
          <span>
            <h5>Demandez votre devis Maintenant !</h5>
          </span>
          <div class="divider"></div>

          <div id="form-data">
            <div class="row">
              <form class="col s12" method="post" enctype="multipart/form-data" action="demandeDevis.php">
                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="Prenom" id="first_name" name="first_name" type="text" class="validate" />
                    <label for="first_name">Prenom</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="last_name" name="last_name" type="text" class="validate" />
                    <label for="last_name">Nom</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input id="email" name="email" type="email" class="validate" />
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field col s6" >
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" name="telephone" type="tel" class="validate" />
                    <label for="icon_telephone">Telephone</label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="adresse" name="adresse" class="materialize-textarea"></textarea>
                    <label for="adresse">Adresse</label>
                  </div>
                </div>

                <!-- languages sources & destination choice ramener les langues dynamiquement -->
                <div class="row">
                  <div class="input-field col s6">
                    <select id="langue_source_select" name="langue_source">
                      <option value="" disabled selected>Choisir une langue</option>

                      <?php
                      foreach ($langues as $row) {
                        echo '<option value="' . $row['idLangue'] . '">' . $row['designation'] . '</option>';
                      }

                      ?>

                    </select>
                    <label>Langue Source</label>
                  </div>

                  <div class="input-field col s6">
                    <select id="langue_destination_select" name="langue_destination">
                      <option value="" disabled selected>Choisir une langue</option>
                      <?php
                      foreach ($langues2 as $row) {
                        echo '<option value="' . $row['idLangue'] . '">' . $row['designation'] . '</option>';
                      }
                      ?>
                    </select>
                    <label>Langue Destination</label>
                  </div>
                </div>


                <!-- type de traduction général, scientifique, site web -->
                <div class="row">
                  <p>Type de Traduction</p>
                  <div class="row">
                    <p class="col s4">
                      <label>
                        <input class="with-gap" name="type_traduction" type="radio" checked />
                        <span>Générale</span>
                      </label>
                    </p>
                    <p class="col s4">
                      <label>
                        <input class="with-gap" name="type_traduction" type="radio" checked />
                        <span>Scientifique</span>
                      </label>
                    </p>
                    <p class="col s4">
                      <label>
                        <input class="with-gap" name="type_traduction" type="radio" checked />
                        <span>Site web</span>
                      </label>
                    </p>
                  </div>
                </div>

                <!-- assermenté ou pas  -->
                <div class="row">
                  <p class="col s4">Interprète Assermenté ?</p>
                  <div class="switch col s4">
                    <label>
                      Pas forcément
                      <input id="assermente_switch" name="assermente" type="checkbox">
                      <span class="lever"></span>
                      Oui
                    </label>
                  </div>
                </div>


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

                <!-- commantaire optionnel -->

                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea name="comment" id="textarea1" class="materialize-textarea"></textarea>
                      <label for="textarea1">Commantaire (Optionnel) </label>
                    </div>
                  </div>
                </div>

                <script type="text/javascript">
                  $(document).ready(function() {
                    $("#getTraducteurs").click(function() {
                      $.ajax({ //create an ajax request to display.php
                        type: "POST",
                        url: "traducteursSearch.php",
                        data: { langueSrcFilter: $("#langue_source_select").children("option:selected").val() , 
                                langueDestFilter :$("#langue_destination_select").children("option:selected").val(),
                                assermenteFilter:$("#assermente_switch").val() 
         
                              },
                        dataType: "html", //expect html to be returned                
                        success: function(response) {
                          $("#responsecontainer").html(response);
                          
                          //alert(response);
                        }

                      });
                    });
                  });
                </script>



                <input type="button" id="getTraducteurs" class="btn" value="Choisir un traducteur" />
                <br>

                <p>Choisissez un Traducteur</p>
                <div id="responsecontainer" align="center">
                  <div class="row">
                  
                  </div>

                </div>
                <br><br>
                <button type="submit" class="waves-effect waves-light btn" name="submit-ask">Envoyer la demande de devis</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    </div>




    <!-- login modal btn -->

    <!-- login modal  -->

    <?php
    $b = new AuthController();
    ?>
    <div id="login" class="modal">
      <h5 class="modal-close">&#10005;</h5>
      <div class="modal-content center">
        <h4>Connexion</h4>
        <br>
        <form class="" method="post" action="login.php">
          <div class="input-field">
            <i class="material-icons prefix">person</i>
            <input type="text" name="email-login" id="name">
            <label for="name">Email</label>
          </div>
          <br>

          <div class="input-field">
            <i class="material-icons prefix">lock</i>
            <input type="password" name="password-login" id="pass">
            <label for="pass">Password</label>
          </div>
          <br>

          <div class="left" style="margin-left:20px;">
            <input type="checkbox" id="check">
            <label for="check">Remember Me</label>
          </div>
          <br>

          <input type="submit" name="submit" value="Login" class="btn btn-large">

        </form>

      </div>
    </div>


    <!-- register modal -->


    <!-- Modal Body -->
    <?php
    $a = new AuthController();
    ?>
    <div id="register-modal" class="modal">
      <div class="modal-content">
        <h4>Register</h4>
        <div class="col s6">
          <form class="" method="post" action="register.php">
            <div class="row">
              <div class="input-field col s12">
                <input id="Name" type="text" name="name" class="validate">
                <label for="Name">Name</label>
              </div>
              <div class="input-field col s12">
                <input id="Email" type="email" name="email" class="validate">
                <label for="Email">Email</label>
              </div>
              <!-- <div class="input-field col s12">
              <input id="Phone" type="text" class="validate">
              <label for="Phone">Phone</label>
            </div> -->
              <div class="input-field col s12">
                <input id="Password" type="password" name="password" class="validate">
                <label for="Password">Password</label>
              </div>
              <div class="input-field col s12">
                <input id="CnfPassword" type="password" name="confirm_password" class="validate">
                <label for="CnfPassword">Confirm Password</label>
              </div>
              <div class="input-field col s12">
                <button type="submit" class="waves-effect waves-light btn" name="submit">Register</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <h5 class="modal-close">&#10005;</h5>
        <!-- <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a> -->
      </div>
    </div>

<?php


    $g->getFooter();
  }
}


?>


