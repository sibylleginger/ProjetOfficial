<h1> Votre panier </h1>

<?php
	if(!isset($_SESSION['panier'])) {
		echo "<h3>Votre panier est vide ! </h3>";
		echo '<a href="index.php?action=readAll">Commencer les achats</a>';
	}else {
		$total = 0;
		foreach($_SESSION['panier'] as $idp => $qte){
			$peluche = ModelPeluche::select($idp);
			if($peluche == false) {
				echo "Pas de peluche";
			} else {
				$prix = $peluche->getPrix()*$qte;
				echo '<p>'.$peluche->getNom().' quantité : '.$qte.' prix : '.$prix;
				echo '<a href="index.php?action=removePeluchePanier&controller=panier&idp='.$idp.'"> Retirer </a>';
				echo '<a href="index.php?action=read&idp='.$idp.'&lastqte='.$qte.'"> Détails/Modifier la quantité </a></p>';
				$total = $total+$prix;
			}
		}
		echo 'Prix total : '.$total;
		echo '<p><a href="index.php?action=readAll">Continuer les achats </a>';
		echo '<a href="index.php?action=removePanier&controller=panier"> Retirer tous les articles du panier</a></p>';

	}

?>

