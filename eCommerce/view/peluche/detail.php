
<?php

$id = rawurlencode($_GET['idp']);
$p_idp = $peluche->getIdp();
$p_nom = $peluche->getNom();
$p_description = $peluche->getDescription();
$p_taille = $peluche->getTaille();
$p_prix = $peluche->getPrix();

echo "<ul> <li>Identifiant : ".$p_idp."</li>";
echo "<li>Nom : ".$p_nom."</li>";
echo "<li>Description : ".$p_description."</li>";
echo "<li>Prix : ".$p_prix."</li>";
echo "<li>Taille : ".$p_taille."</li></ul>";
echo '<a href="index.php?action=addPanier&controller=panier&idp='.$id.'">Ajouter au panier</a>';

/*if(!isset($_SESSION['idu']) && $_SESSION['isAdmin'] == 1) {
	echo '<br> <a href="index.php?action=delete&idp='
	    . $id . '" > supprimer</a> <a href="index.php?action=update&idp='
	    . $id . '" > modifier</a> <a href="index.php?action=readAll"> Retour</a> </p>';
}*/
?>
