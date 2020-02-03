<?php
echo 'flutter ';
require_once __DIR__ . '/globalItems.php';
require_once __DIR__ . '/../../models/demandeDevisModel.php';


class DevisViewAdmin
{
    public function getContent()
    {
        //   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        //  header("Cache-Control: post-check=0, pre-check=0", false);
        //  header("Pragma: no-cache");

        $g = new GlobalItems();
        $g->getPageHead();
        $g->getNavbar();

        $devisModel = new DemandeDevisModel();
        $devis =$devisModel->getAllDemandeDevis();
        echo '
    <nav>
    <div class="nav-wrapper indigo darken-2">
      <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
      <a class="breadcrumb" href="#!">Devis</a>

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
                        
                        <th>Montant</th>
                        <th>Etat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($devis as $trad){
                            echo '
                            <tr>
                                <td>'.$trad['idDemandeDevis'].'</td>
                                <td>'.$trad['date'].'</td>
                                <td>'.$trad['traducteur_id'].'</td>
                                <td>'.$trad['client_id'].'</td>
                                <td><a class="btn"  href="../'.$trad['fileLink'].'" target="_blank">Document </a></td>
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
