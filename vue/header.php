<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Rolland Gorras</title>
        <!-- Bootstrap Core CSS -->
        <link href="vue/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="vue/css/custom.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery -->
        <script src="vue/js/jquery.js" ></script>
        <script src="vue/js/ajax.js"></script>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Ronlad Gorras</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php print("$nom_projet/index.php?page=_joueur"); ?>">Joueurs</a>
                        </li>
                        <li>
                            <a href="<?php print("$nom_projet/index.php?page=_parties_client"); ?>">Parties</a>
                        </li>


                        <?php
                        // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
                        //session_start ();
                        // On récupère nos variables de session
                        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

                            echo'<li><a href="' . $nom_projet . '/index.php?page=_admin_joueur">Admin Joueur</a></li>';
                            echo'<li><a href="' . $nom_projet . '/index.php?page=_admin_partie">Admin Partie</a></li>';
                            echo'<li><a href="' . $nom_projet . '/index.php?page=_admin_creer_partie">Admin Creer Partie</a></li>';

                            //echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['password'].'.';
                            //echo '<br />';
                            // On affiche un lien pour fermer notre session
                            echo '<li><a href="' . $nom_projet . '/model/logout.php">logout</a></li>';
                        } else {
                            echo 'Les variables ne sont pas déclarées.';
                        }
                        ?>



                    </ul>
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                                <form role="form" method="post" action=<?php print($nom_projet."/index.php?page=_login"); ?>>
                                    <input style="margin-bottom: 15px;" type="text" placeholder="Login"  name="login" required="">
                                    <input style="margin-bottom: 15px;" type="password" placeholder="Password"  name="password" required="">

                                    <button type="submit" class="btn btn-info btn-sm" name="adminLogin_btcLogin">S'identifier</button>
                                    <br>
                                </form>
                            </div>
                        </li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Full Width Image Header with Logo -->
        <!-- Image backgrounds are set within the full-width-pics.css file. -->
        <header class="image-bg-fluid-height">
            <img class="img-responsive img-center imgHeader" src="tenis.jpg"  alt="">
        </header>
        <!-- Content Section -->


		
