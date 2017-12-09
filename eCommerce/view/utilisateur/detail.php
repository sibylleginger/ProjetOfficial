
<?php
$id = rawurlencode($_GET['idu']);
$u_idu = $utilisateur->getIdu();
$u_login = $utilisateur->getLogin();
$u_nom = $utilisateur->getNom();
$u_prenom = $utilisateur->getPrenom();

echo "<ul> <li>Identifiant : ".$u_idu."</li>";
echo "<li>Login : ".$u_login."</li>";
echo "<li>Nom : ".$u_nom."</li>";
echo "<li>Prenom : ".$u_prenom."</li></ul>";
echo $html_admin;

echo '<p><a href="index.php?action=delete&controller=utilisateur&idu='
    . $id . '" > supprimer</a> <a href="index.php?action=update&controller=utilisateur&idu='
    . $id . '" > modifier</a> <a href="index.php?action=readAll&controller=utilisateur"> Retour</a> </p>';
?>
