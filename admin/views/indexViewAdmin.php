<?php

require_once __DIR__ . '/globalItems.php';


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

    echo'
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
                            <h6>25%</h6>
                            <p>Server load</p>
                        </div>
                        <div class="card-icon"><i class="material-icons medium valign">pie_chart</i></div>
                    </div>
                    <div class="card-action"><a href="#">View report</a></div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card blue white-text">
                    <div class="card-content valign-wrapper">
                        <div class="card-text">
                            <h6>156</h6>
                            <p>Users online</p>
                        </div>
                        <div class="card-icon"><i class="material-icons medium valign">check_circle</i></div>
                    </div>
                    <div class="card-action"><a href="#">View report</a></div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card blue white-text">
                    <div class="card-content valign-wrapper">
                        <div class="card-text">
                            <h6>50</h6>
                            <p>Broken links</p>
                        </div>
                        <div class="card-icon"><i class="material-icons medium valign">build</i></div>
                    </div>
                    <div class="card-action"><a href="#">View report</a></div>
                </div>
            </div>
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
                      <span class="indigo-text text-lighten-1"><h5>Traducteurs</h5></span>
                    </div>
                  </a>
                  <div class="col s1">&nbsp;</div>
                  <div class="col s1">&nbsp;</div>
      
                  <a href="#!">
                    <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                      <i class="indigo-text text-lighten-1 large material-icons">people</i>
                      <span class="indigo-text text-lighten-1"><h5>Clients</h5></span>
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
                      <span class="indigo-text text-lighten-1"><h5>Traductions</h5></span>
                    </div>
                  </a>
      
                  <div class="col s1">&nbsp;</div>
                  <div class="col s1">&nbsp;</div>
      
                  <a href="#!">
                    <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                      <i class="indigo-text text-lighten-1 large material-icons">assignment</i>
                      <span class="indigo-text text-lighten-1"><h5>Devis</h5></span>
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
                      <span class="indigo-text text-lighten-1"><h5>Devis</h5></span>
                    </div>
                  </a>
      
                  <div class="col s1">&nbsp;</div>
                  <div class="col s1">&nbsp;</div>
      
                  <a href="#!">
                    <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                      <i class="indigo-text text-lighten-1 large material-icons">loyalty</i>
                      <span class="indigo-text text-lighten-1"><h5>Traductions</h5></span>
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
                      <span class="indigo-text text-lighten-1"><h5>Signalements</h5></span>
                    </div>
                  </a>
                  <div class="col s1">&nbsp;</div>
                  <div class="col s1">&nbsp;</div>
      
                  <a href="#!">
                    <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                      <i class="indigo-text text-lighten-1 large material-icons">view_list</i>
                      <span class="truncate indigo-text text-lighten-1"><h5>Notes</h5></span>
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
