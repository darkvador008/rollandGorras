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
        <script type="text/javascript" src="vue/js/ajax.js"></script>
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
                    <a class="navbar-brand" href="index.php">Rolland Gorras</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php print("$nom_projet/index.php?page=_joueur"); ?>">Liste des Joueurs</a>
                        </li>
                        <li>
                            <a href="<?php print("$nom_projet/index.php?page=_parties_client"); ?>">Tournoi</a>
                        </li>
                        <li>
                            <a href="<?php print("$nom_projet/index.php?page=_live"); ?>">Live</a>
                        </li>

                        <?php
                        // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
                        //session_start ();
                        // On récupère nos variables de session
                        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

                            echo'<li><a href="' . $nom_projet . '/index.php?page=_admin_joueur">Gestion de joueur</a></li>';
                            echo'<li><a href="' . $nom_projet . '/index.php?page=_admin_partie">Gestion des parties</a></li>';
                            echo'<li><a href="' . $nom_projet . '/index.php?page=_admin_creer_partie">Création de partie</a></li>';
                            

                            //echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['password'].'.';
                            //echo '<br />';
                            // On affiche un lien pour fermer notre session
                            echo '</ul><li><ul class="nav pull-right"><a href="' . $nom_projet . '/model/logout.php" class="glyphicon glyphicon-off"> Logout</a></ul> </li>';
                        } else {
                            echo '</ul><li><ul class="nav pull-right"><a href="' . $nom_projet . '/index.php?page=_login" class="glyphicon glyphicon-off"> Login</a></ul></li>';
                        }
                        ?>






                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Full Width Image Header with Logo -->
        <!-- Image backgrounds are set within the full-width-pics.css file. -->
        <header class="image-bg-fluid-height">
            <img class="img-responsive img-center imgHeader " src="<?php print("$nom_projet/vue/img/tenis.jpg");?>"  alt="">
        </header>
        <!-- Content Section -->



