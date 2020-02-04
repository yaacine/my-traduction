<?php

require_once __DIR__ . '/globalItems.php';
require_once __DIR__ . '/../../models/demandeTraductionModel.php';


class TraductionViewAdmin
{
    public function getContent()
    {
        //   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        //  header("Cache-Control: post-check=0, pre-check=0", false);
        //  header("Pragma: no-cache");

        $g = new GlobalItems();
        $g->getPageHead();
        $g->getNavbar();
      
        $traductionM = new DemandeTraductionModel();
        $result = $traductionM->getAllDemandeTraduction();
        
        echo '
    <nav>
    <div class="nav-wrapper indigo darken-2">
      <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
      <a class="breadcrumb" href="#!">Traductions</a>

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
                        <th>Date</th>
                        <th>Traducteur</th>
                        <th>Client</th>
                        <th>Document</th>
                        <th>Resultat</th>
                        <th>Montant</th>
                        <th>Etat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $trad){
                            $classe ='';
                            if(empty( $trad['resultFileLink'])){
                                $classe ='disabled';
                            }
                            echo'
                                <tr>
                                    <td>'.$trad['idDemandeTrad'].'</td>
                                    <td>'.$trad['date'].'</td>
                                    <td>'.$trad['traducteur_id'].'</td>
                                    <td>'.$trad['client_id'].'</td>
                                    <td><a class="btn"  href="../'.$trad['fileLink'].'" target="_blank">Document </a></td>
                                    <td><a class="btn '.$classe.'" href="../'.$trad['resultFileLink'].'" target="_blank">Resultat</a></td>
                                    <td>'.$trad['montant'].'</td>
                                    <td>'.$trad['status'].'</td>                              
                                </tr>
                            ';
                        }
                    ?>
                 

                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Traducteur</th>
                        <th>Client</th>
                        <th>Document</th>
                        <th>Resultat</th>
                        <th>Montant</th>
                        <th>Etat</th>
                    </tr>
                </tfoot>
            </table>
        </main>

<?php
        $g->getFooter();
    }
}
