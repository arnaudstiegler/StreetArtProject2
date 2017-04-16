<?php

require_once 'printForms.php';

$page_list = array(
    array("name" => "welcome",
        "title" => "Accueil de notre site",
        "menutitle" => "Accueil",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "map",
        "title" => "Carte",
        "menutitle" => "La carte",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Nous contacter",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "changePassword",
        "title" => "Changer le mot de passe",
        "menutitle" => "Changer le mot de passe",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "submit",
        "title" => "Soumettre une image",
        "menutitle" => "Soumettre",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "signin",
        "title" => "S'identifier",
        "menutitle" => "S'identifier",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "register",
        "title" => "S'inscrire",
        "menutitle" => "S'inscrire",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "deleteUser",
        "title" => "Se désinscrire",
        "menutitle" => "Se désinscrire",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "mesImages",
        "title" => "Mes images",
        "menutitle" => "Mes images",
        "unitegallery" => "tiles/ug-theme-tiles"),
    array("name" => "deconnect",
        "title" => "Se déconnecter",
        "menutitle" => "Se déconnecter",
        "unitegallery" => "slider/ug-theme-slider"),
    array("name" => "description",
        "title" => "Détail",
        "menutitle" => "description",
        "unitegallery" => "slider/ug-theme-slider"));

function checkPage($askedPage) {
    $boolean = false;
    global $page_list;
    foreach ($page_list as $page) {
        if ($page['name'] == $askedPage) {
            $boolean = true;
        }
    }
    return $boolean;
}

function getPageTitle($nom) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page['name'] == $nom) {
            return $page['title'];
        }
    }
}

function generateMenuConnexion($askedPage) {
//        <!-- Collect the nav links, forms, and other content for toggling -->
    echo <<<CHAINE_DE_FIN
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Street Art Map</a>
    </div>
    
    <style>
        .navbar{
            margin-bottom: 0px;
        }
    </style>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
CHAINE_DE_FIN;
    global $pageTitle;
    global $page_list;
    foreach ($page_list as $page) {

        if (isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"]) {
            if ($page['title'] == "Se désinscrire" and $pageTitle == "Se désinscrire") {
                echo '<li class="active"><a href="index.php?page=deleteUser">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Se désinscrire" and $pageTitle != "Se désinscrire") {
                echo '<li><a href="index.php?page=deleteUser">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Changer le mot de passe" and $pageTitle == "Changer le mot de passe") {
                echo '<li class="active"><a href="index.php?page=changePassword">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Changer le mot de passe" and $pageTitle != "Changer le mot de passe") {
                echo '<li><a href="index.php?page=changePassword">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Mes images" and $pageTitle == "Mes images") {
                echo '<li class="active"><a href="index.php?page=mesImages">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Mes images" and $pageTitle != "Mes images") {
                echo '<li><a href="index.php?page=mesImages">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Soumettre une image" and $pageTitle == "Soumettre une image") {
                echo '<li class="active"><a href="index.php?page=submit">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Soumettre une image" and $pageTitle != "Soumettre une image") {
                echo '<li><a href="index.php?page=submit">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "Se déconnecter") {
                echo <<<CHAINE_DE_FIN
                </ul>
                <ul class='nav navbar-nav navbar-right'>
                    <form class="form-inline" action="index.php?todo=logout" method="post" >
                        <button type="submit" class="btn navbar-btn">Se déconnecter</button>
                    </form>
                </ul>
CHAINE_DE_FIN;
            }
        }
        if (!isset($_SESSION["loggedIn"]) or ! $_SESSION["loggedIn"]) {
            if ($page['title'] == "S'identifier" and $pageTitle == "S'identifier") {
                echo '<li class="active"><a href="index.php?page=signin">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "S'identifier" and $pageTitle != "S'identifier") {
                echo '<li><a href="index.php?page=signin">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "S'inscrire" and $pageTitle == "S'inscrire") {
                echo '<li class="active"><a href="index.php?page=register">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] == "S'inscrire" and $pageTitle != "S'inscrire") {
                echo '<li><a href="index.php?page=register">' . $page['menutitle'] . '</a></li>';
            }
        }
    }



    echo <<<CHAINE_DE_FIN

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
CHAINE_DE_FIN;
}

function generateMenuGeneral($adm) {
//        <!-- Collect the nav links, forms, and other content for toggling -->
    echo <<<CHAINE_DE_FIN
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
CHAINE_DE_FIN;
    if($adm){
      echo '<a class="navbar-brand" href="#">Vous êtes administrateur</a>';
    }
    echo <<<CHAINE_DE_FIN
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
CHAINE_DE_FIN;
    global $pageTitle;
    global $page_list;
    foreach ($page_list as $page) {
        if ($page['title'] != "Mes images" and $page['title'] != "S'identifier" and $page['title'] != "Se désinscrire" and $page['title'] != "S'inscrire"and $page['title'] != "Changer le mot de passe" and $page['title'] != "Soumettre une image" and $page['title'] != "Se déconnecter" and $page['title'] != "Détail") {
            if ($page['title'] == $pageTitle) {
                echo '<li class="active"><a href="index.php?page=' . $page['name'] . '">' . $page['menutitle'] . '</a></li>';
            }
            if ($page['title'] != $pageTitle) {
                echo '<li><a href="index.php?page=' . $page['name'] . '">' . $page["menutitle"] . '</a></li>';
            }
        }
    }
    echo <<<CHAINE_DE_FIN
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
CHAINE_DE_FIN;
}

function generateMenuFooter() {
    echo <<<CHAINE_DE_FIN
<nav class="navbar navbar-default navbar-bottom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="col-md-3"><a href="#">Lien 1</a></li>
                <li class="col-md-3"><a href="#">Lien 2</a></li>
                <li class="col-md-3"><a href="#">Lien 3</a></li>
                <li class="col-md-3"><a href="#">Lien 4</a></li>
            </ul>
        </div>
</nav>
CHAINE_DE_FIN;
}

function getUnitegalleryFromPage($askedPage) {
    global $page_list;
    $res = "";
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            $res = $page["unitegallery"];
        }
    }
    return $res;
}

function generateHTMLHeader($title, $askedPage) {
    $res = getUnitegalleryFromPage($askedPage);
    echo<<<CHAINE_DE_FIN
<!DOCTYPE html>
   <html>

    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Nom de l'auteur"/>
        <meta name="keywords" content="Mots clefs relatifs à cette page"/>
        <meta name="description" content="Descriptif court"/>
        
        <script type="text/javascript" src="js/code.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/perso.js"></script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ5Dt9EU5yi6HzVkzsRU-W3RHbZDUKJCA&signed_in=true&callback=initMap">
        </script>
        
        <title>$title</title>
        
        <!-- Google Icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">     
        
        <!-- CSS Bootstrap -->
        <link href="css/perso.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        
        <style>
        /* Always set the map height explicitly to define the size of the div element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        </style>
            
        <!-- CSS Perso -->
        <link rel="stylesheet" type="text/css" href=css/perso.css/>
        
        <!-- Include Unite Gallery core files -->
	<script src='unitegallery/js/unitegallery.min.js' type='text/javascript'  ></script>
        <link  href='unitegallery/css/unite-gallery.css' rel='stylesheet' type='text/css' />
				
        <!-- include Unite Gallery Theme Files -->
	<script src='unitegallery/themes/$res.js' type='text/javascript'></script>
        
        <!-- Transition fondue entre les pages -->
        <!--script type="text/javascript">
            window.onload = function () {
                MakeFluffHappen()
            }
            function MakeFluffHappen() {
                FluffyKittenMaker(0);
                Conflaburator(0);
            }
            function FluffyKittenMaker(SomeNumberThing) {
                document.body.style.opacity = SomeNumberThing / 100;
            }
            function Conflaburator(SomeNumberThing) {
                if (SomeNumberThing <= 100) {
                    FluffyKittenMaker(SomeNumberThing);
                    SomeNumberThing += 10;
                    window.setTimeout("Conflaburator(" + SomeNumberThing + ")", 100);
                }
            }
        </script-->
    </head>
    <body>
CHAINE_DE_FIN;
}

function generateHTMLFooter() {
    echo"</body>";
    echo"</html>";
}
