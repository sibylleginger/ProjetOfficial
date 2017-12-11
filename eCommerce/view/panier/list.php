<div style="margin: 20px 50px;">
<h1> Votre panier </h1>

<?php
	if(!isset($_SESSION['panier'])) {
		echo "<h3>Votre panier est vide ! </h3>";
		echo '<a href="index.php?action=readAll">Commencer les achats</a>';
	}else {
		echo '<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
  				<thead>
    				<tr>
      					<th class="mdl-data-table__cell--non-numeric">Nom de la peluche</th>
      					<th>Quantité</th>
      					<th>Prix</th>
      					<th>Retirer</th>
      					<th>Modifier quantité</th>
    				</tr>
  				</thead>
 				<tbody>';
		$total = 0;
		foreach($_SESSION['panier'] as $idp => $qte){
			$peluche = ModelPeluche::select($idp);
			if($peluche == false) {
				echo "Pas de peluche";
			} else {
				$prix = $peluche->getPrix()*$qte;
				echo '<tr>
      					<td class="mdl-data-table__cell--non-numeric">'.$peluche->getNom().'</td>
      					<td>'.$qte.'</td>
      					<td>'.$prix.'€</td>
      					<td><a href="index.php?action=removePeluchePanier&controller=panier&idp='.$idp.'"><img src="view/images/delete.png"> </a></td>
      					<td style="text-align:center;"><a href="index.php?action=read&idp='.$idp.'&lastqte='.$qte.'" ><img src="view/images/quantite.png" style="margin: auto;"></a></td>
    				</tr>';
				echo '';
				echo '';
				$total = $total+$prix;
			}
		}
		//echo '';
		echo '<tr>
				<td>Prix total : '.$total. '€</td>
			</tr>
			</tbody>
			</table>
			<br>';
		echo '<p><a href="index.php?action=readAll">Continuer les achats </a><br>';
		echo '<a href="index.php?action=removePanier&controller=panier"> Retirer tous les articles du panier</a></p></div>';

	}

?>

