<h1> Votre panier </h1>

<?php
	if(!isset($_COOKIE['panier'])) {
		echo "<h3>Votre panier est vide ! </h3>";
	}else {
		$nbPeluche = count($panier);
		var_dump($panier);
		foreach ($panier as $peluche) {

			$peluche = ModelPeluche::select($peluche['idp']);
			echo $peluche->getNom(). ' quantité ' . $peluche['nbp']. '<br>';
		}
		echo '<a href="index.php?action=removePanier&controller=panier">Retirer tous les articles du panier</a>';
	}

?>

