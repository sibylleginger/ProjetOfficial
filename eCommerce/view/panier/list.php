<h1> Votre panier </h1>

<?php
	if(!isset($_COOKIE['panier'])) {
		echo "<h3>Votre panier est vide ! </h3>";
	}else {
		foreach ($panier as $peluche) {

			$peluche1 = ModelPeluche::select($peluche['idp']);
			echo $peluche1->getNom(). ' quantité ' . $peluche['nbp']. '<br>';
		}
		echo '<a href="index.php?action=removePanier&controller=panier">Retirer tous les articles du panier</a>';
	}

?>

