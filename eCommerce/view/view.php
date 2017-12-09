<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
<?php
//stockage des liens dans des variables
$p_create = '<li><a href="index.php?action=create" > Créer Peluche </a> </li>';
$u_create = '<li><a href="index.php?action=create&controller=utilisateur" > Créer Utilisateur </a> </li>';
$u_connexion = '<li><a href="index.php?action=connexion&controller=utilisateur" > Connexion </a> </li>';
$u_disconnect = '<li><a href="index.php?action=deconnected&controller=utilisateur" > Déconnexion </a> </li>';
$u_readAll = '<li><a href="index.php?action=readAll&controller=utilisateur" > Utilisateurs </a></li>';
$pannier_readAll = '<li><a href="index.php?action=readAll&controller=panier" > Panier </a> </li>';
//debut du nav
echo '<ul style="border: 1px solid black;text-align:right;padding-right:1em;">';
//onglet disponible pour tous
echo '<li><a href="index.php?action=readAll" > Accueil </a> </li>';
if (Session::isConnected()) {
    $idu = $_SESSION['idu'];
    echo '<li><a href="index.php?action=read&controller=utilisateur&idu='.$idu.'">Mon Profil</a>';
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
echo '</ul>';


// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"

$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
</body>
</html>