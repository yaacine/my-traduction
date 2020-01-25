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
            <meta http-equiv="pragma" content="no-cache" />
            <!-- <link rel="stylesheet" href="styles/signupForm.css" />
    <link rel="stylesheet" href="styles/signinForm.css" /> -->
            <script type="text/javascript" src="./javascript/jquery.js"></script>
            <script type="text/javascript" src="styles/materialize/js/materialize.min.js"></script>

            <title>Acceuil</title>

            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

            <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="styles/materialize/css/materialize.min.css" media="screen,projection" />



            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

            <link rel="stylesheet" href="./styles/home.css" />

            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



            <script type="text/javascript" src="./javascript/navBar.js"></script>
            <script type="text/javascript" src="./javascript/manageModals.js"></script>

            <link rel="stylesheet" href="./styles/nosTraducteurs.css" />
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        </head>

    <?php
    }


    public function getNavbar()
    {
    ?>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
        </ul>

        <div class="navbar-fixed">
            <nav id="navbar">
                <div class="nav-wrapper blue-grey darken-3">
                    <a href="#!" class="brand-logo">Logo</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down menu-items">
                        <li><a href="index.php">Acceuil</a></li>
                        <li><a href="badges.php">Nos Offres</a></li>
                        <?php
                        if (isset($_SESSION["isTraducteur"]) && $_SESSION["isTraducteur"] == false) {
                            echo '<li><a href="nosTraducteurs.php">Nos Traducteurs</a></li>';
                        }
                         elseif (!isset($_SESSION["isTraducteur"])) {
                            echo '<li><a href="nosTraducteurs.php">Nos Traducteurs</a></li>';
                        }
                        ?>

                        <li><a href="blog.html">Blog</a></li>
                        <?php
                        if (isset($_SESSION["isTraducteur"]) && $_SESSION["isTraducteur"] == false) {
                            echo '<li><a href="recrutement.php">Devenir Traducteur</a></li>';
                        }
                        //  elseif (!isset($_SESSION["isTraducteur"])) {
                        //     echo '<li><a href="recrutement.php">Devenir Traducteur</a></li>';
                        // }
                        ?>

                        <?php
                        session_start();
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                            echo '  <li style="display= flex">
                             <a class="dropdown-trigger tooltipped" data-position="bottom" data-tooltip="Mon Historique d\'activité" href="logout.php" data-target="dropdown1">
                                  <i class=" material-icons left ">person</i>
                                  ' . strtoupper($_SESSION["name"])  . '
                                  </a></li>
                            
                             ';
                        }
                        ?>

                    </ul>
                    <ul class="right    social-media-icons">

                        <li>
                            <a href=""><img src="./assets/png/001-linkedin.png" alt="linkedin logo" />
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="./assets/png/006-facebook-1.png" alt="facebook logo" />
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="./assets/png/005-twitter.png" alt="twitter logo" />
                            </a>
                        </li>


                        <?php
                        session_start();
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                            echo '
                             <a class="dropdown-trigger   btn right" href="logout.php" >Deconnexion
                                  
                             </a></li>
                             ';
                        }
                        ?>
                    </ul>

                </div>
            </nav>
        </div>

    <?php
    }
    public function getFooter()
    {
    ?>

        <footer class="page-footer grey darken-2">
            <div class="container">
                <div class="row">
                    <div class="col s12 l4 m10">
                        <h5 class="white-text">Follow "BlogName"</h5>
                        <p class="white-text">Get every new post delivered to your inbox.</p>
                        <form>

                            <div class="input-field">
                                <i class="mdi-communication-email prefix"></i>
                                <input id="icon_prefix" type="email" class="validate">
                                <label for="icon_prefix">Email</label>
                            </div>

                        </form>

                        <a class="waves-effect waves-light btn">Sign Up
                            <i class="fa fa-sign-in right"></i></a>
                    </div>
                    <!--col-->


                    <div id="categories" class="col l3 offset-l1 s12 m8">
                        <h5 class="white-text">Categories</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Category1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Category2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Category3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Category4</a></li>
                        </ul>
                    </div>
                    <!--col-->



                    <div class="col l3 s12 m8">
                        <h5 class="white-text">Archives</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">March 2015</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">April 2015</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">May 2015</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">June 2015</a></li>
                        </ul>
                    </div>
                    <!--col-->

                </div>
                <!--row-->

                <div class="row">
                    <div class="col s12 l3 offset-l5">


                        <a href="#"><i style="font-size: 38px;" class="fa fa-facebook-square"></i></a> &nbsp;&nbsp;&nbsp;
                        <a href="#"><i style="font-size: 38px;" class="fa fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="#"><i style="font-size: 38px;" class="fa fa-google-plus-square"></i></a>
                    </div>

                </div>
                <!--row-->
            </div>
            <!--conatiner-->
            <div class="footer-copyright">
                <div class="container">
                    <p>Copyright © Your website name</p>
                    <br>
                </div>
            </div>
        </footer>
<?php
    }
}

?>