<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Full Width Pics - Start Bootstrap Template</title>
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
        <script src="vue/js/jquery.js"></script>
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
                    <a class="navbar-brand" href="#">Ronlad Gorras</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php print("$nom_projet/index.php?page=_joueur");?>">Joueurs</a>
                        </li>
                        <li>
                            <a href="#">Parties</a>
                        </li>
                        <li>
                            <a href="<?php print("$nom_projet/index.php?page=_admin_joueur");?>">Admin Joueur</a>
                        </li>
                        <li>
                            <a href="<?php print("$nom_projet/index.php?page=_admin_partie");?>">Admin Partie</a>
                        </li>
                        <li>
                            <a href="#">login</a>
                        </li>
                    </ul>
    <ul class="nav pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                        <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                            <form method="post" action="login" accept-charset="UTF-8">
                                <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                                <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                                <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                                <label class="string optional" for="user_remember_me"> Remember me</label>
                                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
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
            <img class="img-responsive img-center imgHeader" src="http://www.regnumhotels.com/i/content/444_1_banner.jpg" alt="">
        </header>
        <!-- Content Section -->