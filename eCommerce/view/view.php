<!DOCTYPE html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Ma petite peluche</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
    <link rel="stylesheet" href="./styles/style_nav.css">
    <!--<link rel="stylesheet" href="./styles/main_style.css">-->
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" href="view/images/icon.png" sizes="16x16">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
    </head>
    <body>

    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <!--<div aria-expanded="false" id="burgerlink" role="button" tabindex="0" class="mdl-layout__drawer-button" onclick="toggle('burger', 'burgerlink')">
            <i class="material-icons"></i>
        </div>-->
        <div class="mdl-layout__header-row">
            <img src="view/images/icon.png" height="90%" style="margin: 10px;">
            <span class="android-title mdl-layout-title mdl-typography--text-uppercase">
                <a style="color: white; text-decoration: none;" href="index.php?action=readAll">Ma petite peluche</a>
            </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            
            <?php
                //stockage des liens dans des variables
                $p_create = '<a class="mdl-navigation__link mdl-typography--text-uppercase" style="color: grey;" href="index.php?action=create">Créer Peluche</a>';
                $u_create = '<a class="mdl-navigation__link mdl-typography--text-uppercase" style="color: grey;" href="index.php?action=create&controller=utilisateur">Créer utilisateur</a>';
                $u_connexion = '<a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=connexion&controller=utilisateur">Connexion</a>';
                $u_disconnect = '<a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=deconnected&controller=utilisateur">Déconnexion</a>';
                $u_readAll = '<a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a>';
                $pannier_readAll = '<a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=readAll&controller=panier">Panier</a>';
                //debut du nav
                //onglet disponible pour tous
                echo '<div class="android-navigation-container">
                    <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=readAll" > Accueil </a>';
                if (Session::isConnected()) {
                    $idu = $_SESSION['idu'];
                    echo '<a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=read&controller=utilisateur&idu='.$idu.'" style="87.885px">Mon Profil</a>';
                    echo $pannier_readAll;
                    echo $u_readAll;
                    echo $u_disconnect.'</nav></div>';
                    if (Session::isAdmin()) {
                        echo 
                        '<span class="android-mobile-title mdl-layout-title">
                            <img class="android-logo-image" src="images/android-logo.png">
                        </span>
                        <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                            <li class="mdl-menu__item">'.$p_create.'</li>
                            <li class="mdl-menu__item">'.$u_create.'</li>
                        </ul>';
                    }
                } else {
                    echo $u_connexion;
                    echo $u_create.'</nav></div>';
                    
                }
                echo
        '</div>
    </div>';
    /*<div class="android-drawer mdl-layout__drawer" area-hidden="true" id="burger">
            <span class="mdl-layout-title">
                <img class="android-logo-image" src="images/android-logo-white.png">
            </span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=readAll" > Accueil </a>';
                if (Session::isConnected()) {
                    $idu = $_SESSION['idu'];
                    echo '<a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=read&controller=utilisateur&idu='.$idu.'">Mon Profil</a>';
                    echo $pannier_readAll;
                    echo $u_readAll;
                    echo $u_disconnect;
                    if (Session::isAdmin()) {
                        echo $p_create;
                        echo $u_create;
                    }
                } else {
                    echo $u_connexion;
                    echo $u_create;
                    
                }
                echo '<div class="android-drawer-separator"></div>
            </nav>
    </div>';*/


// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"

$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
</body>
</html>