<h1> Votre panier </h1>

<?php
	if(!isset($_COOKIE['panier'])) {
		echo "<h3>Votre panier est vide ! </h3>";
	} else {
		foreach ($_COOKIE['panier'] as $key) {
			$idp = $KEY['idp'];
			$nbp = $KEY['nbp'];
			$peluche = ModelPanier::select($idp);
			echo $peluche->getNom();
		}
	}

?>

<a href="index.php?action=removePanier&controller=panier">Retirer tous les articles du panier</a>