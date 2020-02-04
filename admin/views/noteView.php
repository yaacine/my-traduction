<?php

require_once __DIR__ . '/globalItems.php';
require_once __DIR__ . '/../../models/noteModel.php';


class NotesViewAdmin
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
      <a class="breadcrumb" href="#!">Notation</a>

      <div style="margin-right: 20px;" id="timestamp" class="right"></div>
    </div>
  </nav>
</header>
';


        $noteM = new NoteModel();
     
        $notes = $noteM->getAllNotes();
        

?>

        <main style="margin: 10px;">

            <table id="example" class="mdl-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th>Id Note</th>
                        <th>Id Traducteur</th>
                        <th>Id Client</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Id Demande Traductions</th>
                     
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($notes as $row){
                            echo'
                            <tr>
                        <td>'.$row['idNote'].'</td>
                        <td>'.$row['traducteur_id'].'</td>
                        <td>'.$row['client_id'].'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['note'].'</td>
                        <td>'.$row['idDemandeTraduction'].'</td>
                        </tr>
                            ';
                        }
                    ?>
                    
                 
                </tbody>
                <tfoot>
                    <tr>
                      <th>Id Note</th>
                        <th>Id Traducteur</th>
                        <th>Id Client</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Id Demande Traductions</th>
                    </tr>
                </tfoot>
            </table>
        </main>

<?php
        $g->getFooter();
    }
}
