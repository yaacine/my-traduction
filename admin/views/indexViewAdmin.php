<?php

require_once __DIR__ . '/globalItems.php';
require_once __DIR__ . '/../models/statistics.php';


class IndexViewAdmin
{
  public function getContent()
  {
    //   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    //  header("Cache-Control: post-check=0, pre-check=0", false);
    //  header("Pragma: no-cache");

    $g = new GlobalItems();
    $g->getPageHead();
    $g->getNavbar();
    $statM = new StatisticsModel();

    $nbTraducteur = $statM->getNbTraducteur();
    $nbClient = $statM->getNbClient();
    $nbDemandeDevis = $statM->getNbDemandesDevis();
    $nbDemandeTrad  =$statM->getNbDemandesTraduction();

    foreach($nbTraducteur as $c){
      $nbTraducteur = $c['nbTraducteur'];
    }

    foreach($nbClient as $c){
      $nbClient = $c['nbClient'];
    }

    foreach($nbDemandeDevis as $c){
      $nbDemandeDevis = $c['nbDemandeDevis'];
    }

    foreach($nbDemandeTrad as $c){
      $nbDemandeTrad = $c['nbDemandeTrad'];
    }
    echo '
    <nav>
    <div class="nav-wrapper indigo darken-2">
      <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
      <a class="breadcrumb" href="#!">Dashboard</a>

      <div style="margin-right: 20px;" id="timestamp" class="right"></div>
    </div>
  </nav>
</header>
';
?>

    <main>

    <div class="row">
        <div class="col s12 m4">
          <div class="card blue white-text">
            <div class="card-content valign-wrapper">
              <div class="card-text">
              
                <?php
                  echo'
                  <h5>'.$nbTraducteur.'  Traducteurs</h5>
                  <h5> '.$nbClient.' Clients</h5>
                  ';
                
                ?>   
               
                <h6>Utilisateurs</6>
              </div>
              <div class="card-icon"><i class="material-icons medium valign">pie_chart</i></div>
            </div>
            <div class="card-action"><a href="#">Voir le rapport</a></div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue white-text">
            <div class="card-content valign-wrapper">
              <div class="card-text">
                <?php
                  echo '
                  <h5>'.$nbDemandeDevis.'</h5>
                  
                  ';
                ?>

                <h6>Demandes De Devis</h6>
                <br>
              </div>
              <div class="card-icon"><i class="material-icons medium valign">check_circle</i></div>
            </div>
            <div class="card-action"><a href="#">Voir le rapport</a></div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue white-text">
            <div class="card-content valign-wrapper">
              <div class="card-text">
              <?php
                  echo '
                  <h5>'.$nbDemandeTrad.'</h5>
                  
                  ';
                ?>
              <br>
                <p>Demandes De Traduction</p>
              </div>
              <div class="card-icon"><i class="material-icons medium valign">build</i></div>
            </div>
            <div class="card-action"><a href="#">Voir le rapport</a></div>
          </div>
        </div>
      </div>
    <div class="row" style="margin: 5px">
    <div class="col s6 m6">
    <canvas  style="margin: 5px" id="myChart" ></canvas>
    </div>
     <div class="col s6 m6">
    <canvas  style="margin: 5px" id="myChart1" ></canvas>
    </div>
   
   
    </div>
   
<script>
var ctx = document.getElementById('myChart').getContext('2d');
data: [{
    x: new Date(),
    y: 1
}, {
    t: new Date(),
    y: 10
}]
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Traductions',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<script>
var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Devis',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
      </div>
   
      <div class="row">
        <div class="col s6">
          <div style="padding: 35px;" align="center" class="card">
            <div class="row">
              <div class="left card-title">
                <b>Gestion Des Utilisateurs</b>
              </div>
            </div>

            <div class="row">
              <a href="#!">
                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                  <i class="indigo-text text-lighten-1 large material-icons">person</i>
                  <span class="indigo-text text-lighten-1">
                    <h5>Traducteurs</h5>
                  </span>
                </div>
              </a>
              <div class="col s1">&nbsp;</div>
              <div class="col s1">&nbsp;</div>

              <a href="#!">
                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                  <i class="indigo-text text-lighten-1 large material-icons">people</i>
                  <span class="indigo-text text-lighten-1">
                    <h5>Clients</h5>
                  </span>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="col s6">
          <div style="padding: 35px;" align="center" class="card">
            <div class="row">
              <div class="left card-title">
                <b>Gestion des Services</b>
              </div>
            </div>
            <div class="row">
              <a href="#!">
                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                  <i class="indigo-text text-lighten-1 large material-icons">store</i>
                  <span class="indigo-text text-lighten-1">
                    <h5>Traductions</h5>
                  </span>
                </div>
              </a>

              <div class="col s1">&nbsp;</div>
              <div class="col s1">&nbsp;</div>

              <a href="#!">
                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                  <i class="indigo-text text-lighten-1 large material-icons">assignment</i>
                  <span class="indigo-text text-lighten-1">
                    <h5>Devis</h5>
                  </span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s6">
          <div style="padding: 35px;" align="center" class="card">
            <div class="row">
              <div class="left card-title">
                <b>Gestion Des Payements</b>
              </div>
            </div>

            <div class="row">
              <a href="#!">
                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                  <i class="indigo-text text-lighten-1 large material-icons">local_offer</i>
                  <span class="indigo-text text-lighten-1">
                    <h5>Devis</h5>
                  </span>
                </div>
              </a>

              <div class="col s1">&nbsp;</div>
              <div class="col s1">&nbsp;</div>

              <a href="#!">
                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                  <i class="indigo-text text-lighten-1 large material-icons">loyalty</i>
                  <span class="indigo-text text-lighten-1">
                    <h5>Traductions</h5>
                  </span>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="col s6">
          <div style="padding: 35px;" align="center" class="card">
            <div class="row">
              <div class="left card-title">
                <b>Gestion Des Conflits</b>
              </div>
            </div>
            <div class="row">
              <a href="#!">
                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                  <i class="indigo-text text-lighten-1 large material-icons">view_list</i>
                  <span class="indigo-text text-lighten-1">
                    <h5>Signalements</h5>
                  </span>
                </div>
              </a>
              <div class="col s1">&nbsp;</div>
              <div class="col s1">&nbsp;</div>

              <a href="#!">
                <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                  <i class="indigo-text text-lighten-1 large material-icons">view_list</i>
                  <span class="truncate indigo-text text-lighten-1">
                    <h5>Notes</h5>
                  </span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="fixed-action-btn click-to-toggle" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large pink waves-effect waves-light">
          <i class="large material-icons">add</i>
        </a>

        <ul>
          <li>
            <a class="btn-floating red"><i class="material-icons">note_add</i></a>
            <a href="" class="btn-floating fab-tip">Add a note</a>
          </li>

          <li>
            <a class="btn-floating yellow darken-1"><i class="material-icons">add_a_photo</i></a>
            <a href="" class="btn-floating fab-tip">Add a photo</a>
          </li>

          <li>
            <a class="btn-floating green"><i class="material-icons">alarm_add</i></a>
            <a href="" class="btn-floating fab-tip">Add an alarm</a>
          </li>

          <li>
            <a class="btn-floating blue"><i class="material-icons">vpn_key</i></a>
            <a href="" class="btn-floating fab-tip">Add a master password</a>
          </li>
        </ul>
      </div>
    </main>

<?php
    $g->getFooter();
  }
}
