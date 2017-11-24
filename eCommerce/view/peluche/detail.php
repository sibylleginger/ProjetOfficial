
<?php
$nom = $_GET['nom'];
echo "{$nom} : <br>";
echo "{$peluche->getDescription()}<br>";

echo " C'est une peluche de taille : {$peluche->getTaille()}.";
echo "<br> Prix : {$peluche->getPrix()} €";

echo '<br> <a href="index.php?action=delete&nom='
    . $nom . '" > supprimer</a> <a href="index.php?action=update&nom='
    . $nom . '" > modifier</a> <a href="index.php?action=readAll"> Retour</a> </p>';


?>
