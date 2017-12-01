<!doctype html>
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
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <h1>PELUCHE</h1>
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=readAll">Accueil</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=readAll">Nos Peluches</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php/view/panier/details.php">Mon Panier</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php?action=create">Créer</a>
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <h1>PELUCHE</h1>
          </span>
        </div>
      </div>

      <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <h1>PELUCHE</h1>
        </span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Accueil</a>
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="peluches.html">Nos Peluches</a>
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="panier.html">Mon Panier</a>
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="contact.html">Contact</a>
          <div class="android-drawer-separator"></div>
        </nav>
      </div>

<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
</body>
</html>
