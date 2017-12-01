
<?php
echo "Login: {$utilisateur->getLogin()} <br>";
echo "Nom: {$utilisateur->getNom()} <br>";
echo "Prénom: {$utilisateur->getPrenom()} <br>";

$id = rawurlencode($_GET['idu']);
echo '<p><a href="index.php?action=delete&controller=utilisateur&idu='
    . $id . '" > supprimer</a> <a href="index.php?action=update&controller=utilisateur&idu='
    . $id . '" > modifier</a> <a href="index.php?action=readAll&controller=utilisateur"> Retour</a> </p>';
?>
