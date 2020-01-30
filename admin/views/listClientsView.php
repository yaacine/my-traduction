<?php

require_once __DIR__ . '/globalItems.php';
require_once __DIR__ . '/../../models/userModel.php';


class ListClientsViewAdmin
{
    public function getContent()
    {
        //   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        //  header("Cache-Control: post-check=0, pre-check=0", false);
        //  header("Pragma: no-cache");

        $g = new GlobalItems();
        $g->getPageHead();
        $g->getNavbar();

        $clientsM = new UserModel();
        $clients = $clientsM->getAllUsers();

        echo '
    <nav>
    <div class="nav-wrapper indigo darken-2">
      <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
      <a class="breadcrumb" href="#!">Clients</a>

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
                        <th>Demandes Devis</th>
                        <th>Demandes Traductions</th>
                        
                        <th>Etat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($clients as $row) {

                        $nbDemandesDevisResponse = $clientsM->getNbDemabdesDevis($row['idClient']);
                        foreach ($nbDemandesDevisResponse as $demande) {
                            $nbDemandesDevis = $demande['nbDemandesDevis'];
                        }

                        $nbDemandeesTrad = $clientsM->getNbDemabdesTraductions($row['idClient']);
                        foreach ($nbDemandeesTrad as $demande) {
                            $nbDemandesTrad = $demande['nbDemandesTrad'];
                        }


                        echo '    
                        <tr>
                            <td>' . $row['idClient'] . '</td>
                            <td> <a href="../controllers/client-profile.php?id='.$row['idClient'].'" </a> ' . $row['nom'] . '</td>
                            <td>' . $row['prenom'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $nbDemandesDevis . '</td>
                            <td>' . $nbDemandesTrad . '</td>';

                                if ($row['status'] == "active") {
                                    echo '
                                    <td style="text-align: center;"> 
                                    <b>Actif</b>  
                                    <br> 
                                    <form action="controllers/blockUser.php" method="post">
                                        <input type="hidden" name="idTraducteurAdmin" value="'.$row['idTraducteur'].'">
                                        <input class="btn" type="submit"  name="deblock" value="Bloquer" />

                                    </form>
                                    </td>
                                    ';
                                }
                                elseif($row['status'] == "blocked"){
                                    echo '
                                    <td style="text-align: center;"> 
                                    <b>Bloqué</b>  
                                    <br> 
                                    <form action="controllers/deblockUser.php" method="post">
                                        <input type="hidden" name="idTraducteurAdmin" value="'.$row['idTraducteur'].'">
                                        <input class="btn" type="submit"  name="deblock" value="Débloquer" /><
                                    </form>
                                    </td>
                                    '; 
                                }
                        echo '</tr>';
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Demandes Devis</th>
                        <th>Demandes Traductions</th>
                        <th>Etat</th>
                    </tr>
                </tfoot>
            </table>
        </main>

<?php
        $g->getFooter();
    }
}
