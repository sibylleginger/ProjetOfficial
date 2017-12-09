
<?php


echo "<ul> <li>Identifiant : ".$p_idp."</li>";
echo "<li>Nom : ".$p_nom."</li>";
echo "<li>Description : ".$p_description."</li>";
echo "<li>Prix : ".$p_prix."</li>";
echo "<li>Taille : ".$p_taille."</li></ul>";
echo '<a href="index.php?action=addPanier&controller=panier&idp='.$id.'">Ajouter au panier</a><br><a href="index.php?action=readAll"> Retour</a>';

echo $html_admin;
?>
