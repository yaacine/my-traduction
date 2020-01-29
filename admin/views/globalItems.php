<?php

class GlobalItems
{
    public function getPageHead()
    {

?>

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <link rel="stylesheet" href="styles.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff" />

            <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
            <script src="logic.js"></script>
            <title>Document</title>

            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">

            <script src=" https://code.jquery.com/jquery-3.3.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.material.min.js"></script>



        </head>

    <?php
    }


    public function getNavbar()
    {
    ?>
        <ul id="slide-out" class="side-nav fixed z-depth-2">
            <li class="center no-padding">
                <div class="indigo darken-2 white-text" style="height: 180px;">
                    <div class="row">
                        <img style="margin-top: 5%;" width="100" height="100" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463990208/photo_dkkrxc.png" class="circle responsive-img" />
                        <br>
                        <a href="#!" class="brand-logo"> T'Raduiz</a>
                    </div>
                </div>
            </li>

            <li id="dash_dashboard">
                <a class="waves-effect" href="index.php"><b>Dashboard</b></a>
            </li>

            <ul class="collapsible" data-collapsible="accordion">
                <li id="dash_users">
                    <div id="dash_users_header" class="collapsible-header waves-effect">
                        <b>Utilisateurs</b>
                    </div>
                    <div id="dash_users_body" class="collapsible-body">
                        <ul>
                            <li id="users_Traducteurs">
                                <a class="waves-effect" style="text-decoration: none;" href="listTraducteurs.php">Traducteurs</a>
                            </li>

                            <li id="users_Clients">
                                <a class="waves-effect" style="text-decoration: none;" href="listClients.php">Clients</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li id="dash_products">
                    <div id="dash_products_header" class="collapsible-header waves-effect">
                        <b>Services</b>
                    </div>
                    <div id="dash_products_body" class="collapsible-body">
                        <ul>
                            <li id="products_product">
                                <a class="waves-effect" style="text-decoration: none;" href="traductions.php">Traductions</a>
                                <a class="waves-effect" style="text-decoration: none;" href="devis.php">Devis</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li id="dash_brands">
                    <div id="dash_brands_header" class="collapsible-header waves-effect">
                        <b>Payements</b>
                    </div>
                    <div id="dash_brands_body" class="collapsible-body">
                        <ul>
                            <li id="brands_brand">
                                <a class="waves-effect" style="text-decoration: none;" href="tradPay.php">Traductions</a>
                            </li>

                            <li id="brands_sub_brand">
                                <a class="waves-effect" style="text-decoration: none;" href="devisPay.php">Devis</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li id="dash_categories">
                    <div id="dash_categories_header" class="collapsible-header waves-effect">
                        <b>Conflits</b>
                    </div>
                    <div id="dash_categories_body" class="collapsible-body">
                        <ul>
                            <li id="categories_category">
                                <a class="waves-effect" style="text-decoration: none;" href="signalement.php">Signalements</a>
                            </li>

                            <li id="categories_sub_category">
                                <a class="waves-effect" style="text-decoration: none;" href="notes.php">Notes</a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </ul>

        <header>
            <ul class="dropdown-content" id="user_dropdown">
                <li><a class="indigo-text" href="#!">Profile</a></li>
                <li><a class="indigo-text" href="#!">Logout</a></li>
            </ul>

            <nav class="indigo" role="navigation">
                <div class="nav-wrapper">
                    <a data-activates="slide-out" class="button-collapse show-on-" href="#!"><img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" /></a>

                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a class="right dropdown-button" href="" data-activates="user_dropdown"><i class=" material-icons">account_circle</i></a>
                        </li>
                    </ul>

                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                </div>
            </nav>



        <?php
    }
    public function getFooter()
    {
        ?>

            <footer class="indigo page-footer">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <h5 class="white-text">Icon Credits</h5>
                            <ul id='credits'>
                                <li>
                                    Elit non nisi ullamco occaecat reprehenderit adipisicing est ipsum velit aliqua.Excepteur ut est in ad consectetur.
                                </li>
                                <li>
                                    Icons made by <a href="https://material.io/icons/">Google</a>, available under <a href="https://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License Version 2.0</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        <span>Made By <a style='font-weight: bold;' href="https://github.com/yaacine" target="_blank">Yacine ESI</a></span>
                    </div>
                </div>
            </footer>
    <?php
    }
}

    ?>