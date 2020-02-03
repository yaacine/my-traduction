<?php

require_once __DIR__ . '/globalItems.php';
require_once __DIR__ . '/../../models/payementModel.php';



class TradPayViewAdmin
{
    public function getContent()
    {
        //   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        //  header("Cache-Control: post-check=0, pre-check=0", false);
        //  header("Pragma: no-cache");

        $g = new GlobalItems();
        $g->getPageHead();
        $g->getNavbar();
        echo '
    <nav>
    <div class="nav-wrapper indigo darken-2">
      <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
      <a class="breadcrumb" href="#!">Payement Des Traductions</a>

      <div style="margin-right: 20px;" id="timestamp" class="right"></div>
    </div>
  </nav>
</header>
';

        $paymentM = new PayementModel();
        //get payement join demandeTraduction
        $payements = $paymentM->getAllPayementsPerOperation();
?>

        <main style="margin: 10px;">
            <table id="example" class="mdl-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Montant</th>
                        <th>Traducteur</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Fichier</th>
                        <th>Etat</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($payements as $payement) {
                        echo '
                <tr>
                <td>' . $payement['idPayement'] . '</td>
                <td>' . $payement['montant'] . '</td>
                <td>' . $payement['traducteur_id'] . '</td>
                <td>' . $payement['client_id'] . '</td>
                <td>' . $payement['paydate'] . '</td>
                <td><a class="btn" href="../'. $payement['payementFile'] .'" target="_blank">Document Payement</a></td>';
                    
                if ($payement['etat'] == "non-valide") {
                    echo '
                    <td style="text-align: center;"> 
                    <b>Non Validé</b>  
                    <br> 
                    <form action="controllers/validatePayement.php" method="post">
                        <input type="hidden" name="validatePayementId" value="'.$payement['idPayement'] .'">
                        <input type="hidden" name="validatePayementTraductionId" value="'.$payement['idDemandeTrad'] .'">
                        <input class="btn" type="submit"  name="validatePayement" value="Valider" />

                    </form>
                    </td>
                    ';
                }elseif($payement['etat'] == "valide"){
                    echo '
                    <td style="text-align: center;"> 
                    <b>Validé</b>  
                    
                    </td>
                    '; 
                }

               echo' </tr>
                ';
                    }
                    ?>
                   

                </tbody>
                <tfoot>
                    <tr>
                    <th>N°</th>
                        <th>Montant</th>
                        <th>Traducteur</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Fichier</th>
                        <th>Etat</th>
                    </tr>
                </tfoot>
            </table>
        </main>
<?php
        $g->getFooter();
    }
}
