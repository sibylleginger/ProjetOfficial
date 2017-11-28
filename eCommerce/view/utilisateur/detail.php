
<?php
echo "Login: {$utilisateur->getLogin()} <br>";
echo "Nom: {$utilisateur->getNom()} <br>";
echo "Prénom: {$utilisateur->getPrenom()} <br>";

$login = rawurlencode($_GET['login']);
echo '<p><a href="index.php?action=delete&controller=utilisateur&login='
    . $login . '" > supprimer</a> <a href="index.php?action=update&controller=utilisateur&login='
    . $login . '" > modifier</a> <a href="index.php?action=readAll&controller=utilisateur"> Retour</a> </p>';
?>
