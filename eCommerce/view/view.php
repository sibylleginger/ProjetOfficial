<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>

    <ul style="border: 1px solid black;text-align:right;padding-right:1em;">
    <li><a href="index.php?action=readAll" > Accueil </a> </li>
    <li><a href="index.php?action=create" > Créer </a> </li>
    <li><a href="index.php?action=readAll&controller=utilisateur" > Utilisateurs </a></li>
    <li><a href="index.php?action=readAll&controller=panier" > Panier </a> </li>
    </ul>

<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"

$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
</body>
</html>