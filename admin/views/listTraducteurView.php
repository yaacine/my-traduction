<?php

require_once __DIR__ . '/globalItems.php';
require_once __DIR__ . '/../../models/traducteurModel.php';



class ListTraductionViewAdmin
{
  public function getContent()
  {
    //   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    //  header("Cache-Control: post-check=0, pre-check=0", false);
    //  header("Pragma: no-cache");

    $g = new GlobalItems();
    $g->getPageHead();
    $g->getNavbar();

    $traducteurM = new TraducteurModel();
    $traducteurs = $traducteurM->getAllTraducteurs();
   // $tradM = new TraducteurModel();
    echo'
    <nav>
    <div class="nav-wrapper indigo darken-2">
      <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
      <a class="breadcrumb" href="#!">Traducteurs</a>

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
            <th>Nbr Traductions</th>
            <th>Nbr Devis</th>
            <th>Etat</th>
        </tr>
    </thead>
    <tbody>

    <?php
            foreach ($traducteurs as $row){
                $nbDemandesDevisResponse = $traducteurM->getNbDemabdesDevis($row['idTraducteur']);
                foreach ($nbDemandesDevisResponse as $demande) {
                    $nbDemandesDevis = $demande['nbDemandesDevis'];
                }

                $nbDemandeesTrad = $traducteurM->getNbDemabdesTraductions($row['idTraducteur']);
                foreach ($nbDemandeesTrad as $demande) {
                    $nbDemandesTrad = $demande['nbDemandesTrad'];
                }
                $languagesResponse = $traducteurM->getLanguagesForSingleTraducteur($row['idTraducteur']);
               
                echo'    
                <tr>
                    <td>'.$row['idTraducteur'].'</td>
                    <td> <a href="controllers/traducteur-profile.php?id='.$row['idTraducteur'].'" </a> '.$row['nom'].'</td>
                    <td>'.$row['prenom'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>';
                    foreach($languagesResponse as $lang){
                        echo $lang['designation'].'<br>';
                    }
                    
                    echo'</td>
                    <td>' . $nbDemandesDevis . '</td>
                    <td>' . $nbDemandesTrad . '</td>';

                                if ($row['status'] == "active") {
                                    echo '
                                    <td style="text-align: center;"> 
                                    <b>Actif</b>  
                                    <br> 
                                    <form action="controllers/blockTraducteur.php" method="post">
                                        <input type="hidden" name="idTraducteurAdmin" value="'.$row['idTraducteur'].'"/>
                                        <input class="btn" type="submit"  name="block" value="Bloquer" />

                                    </form>
                                    </td>
                                    ';
                                }
                                elseif($row['status'] == "blocked"){
                                    echo '
                                    <td style="text-align: center;"> 
                                    <b>Bloqué</b>  
                                    <br> 
                                    <form action="controllers/deblockTraducteur.php" method="post">
                                        <input type="hidden" name="idTraducteurAdmin" value="'.$row['idTraducteur'].'">
                                        <input class="btn" type="submit"  name="deblock" value="Débloquer" />
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
