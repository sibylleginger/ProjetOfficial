


<?php  
	$login = rawurlencode($_GET['login']);
	echo '<p>L\'utilisateur '. $login . ' a bien été supprimé !</p>';
	require File::build_path(array('view', 'utilisateur', 'list.php'));
?>

