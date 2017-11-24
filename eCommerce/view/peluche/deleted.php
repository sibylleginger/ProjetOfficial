<?php  
	$nom = rawurlencode($_GET['nom']);
	echo '<p>La peluche '. $nom . ' a bien été supprimée !</p>';
	require File::build_path(array('view', 'peluche', 'list.php'));
?>

