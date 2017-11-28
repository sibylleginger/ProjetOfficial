
<?php
$id = $_GET['idp'];
echo "{$peluche->getNom()} : <br>";
echo "{$peluche->getDescription()}<br>";

echo " C'est une peluche de taille : {$peluche->getTaille()}.";
echo "<br> Prix : {$peluche->getPrix()} €";

echo '<br> <a href="index.php?action=delete&idp='
    . $id . '" > supprimer</a> <a href="index.php?action=update&idp='
    . $id . '" > modifier</a> <a href="index.php?action=readAll"> Retour</a> </p>';


?>
