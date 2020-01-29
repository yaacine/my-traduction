<?php

require_once __DIR__ . '/globalItems.php';


class SignalementViewAdmin
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
      <a class="breadcrumb" href="#!">Signalement</a>

      <div style="margin-right: 20px;" id="timestamp" class="right"></div>
    </div>
  </nav>
</header>
';

    ?>

<main style="margin: 10px;">

<table id="example" class="mdl-data-table" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Langues</th>
            <th>Nombre de Traductions</th>
            <th>Profile</th>
            <th>Etat</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Zidelmal</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>2011/04/25</td>
            <td > Actif <br><a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Blocker</a>
            </td>
            
        </tr>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
       
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Langues</th>
            <th>Nombre de Traductions</th>
            <th>Profile</th>
            <th>Etat</th>
        </tr>
    </tfoot>
</table>
</main>

    <?php
    $g->getFooter();

  }
}
