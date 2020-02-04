<?php

require_once __DIR__ . '/globalItems.php';
require_once __DIR__ . '/../../models/signalModel.php';


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

    $signalM = new SignalModel();
    $signalements = $signalM->getAllSignal();
    ?>

<main style="margin: 10px;">

<table id="example" class="mdl-data-table" style="width:100%">
    <thead>
        <tr>
            <th>Id_signal</th>
            <th>Id_Traducteur</th>
            <th>Id_Client</th>
            <th>Motif</th>
            <th>Date</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($signalements as $row){
                echo'
                <tr>
                <td>'.$row['idSignal'].'</td>
                <td>'.$row['traducteur_id'].'</td>
                <td>'.$row['client_id'].'</td>
                <td>'.$row['motif'].'</td>
                <td>'.$row['date'].'</td>
                </tr> ';
            }
        ?>
       
       
    </tbody>
    <tfoot>
        <tr>
            <th>Id_signal</th>
            <th>Id_Traducteur</th>
            <th>Id_Client</th>
            <th>Motif</th>
            <th>Date</th>
        </tr>
    </tfoot>
</table>
</main>

    <?php
    $g->getFooter();

  }
}
