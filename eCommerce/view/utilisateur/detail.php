
<style>
.demo-list-item {

  margin: 20px 50px;
}
</style>
<?php
$id = rawurlencode($_GET['idu']);
$u_idu = $utilisateur->getIdu();
$u_login = $utilisateur->getLogin();
$u_nom = $utilisateur->getNom();
$u_prenom = $utilisateur->getPrenom();

echo '<ul class="demo-list-item mdl-list">'
	. $html_admin.
  		'<br><li class="mdl-list__item">
  			<span class="mdl-list__item-primary-content">Identifiant : '.$u_idu.'</span>
  		</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Login : '.$u_login.'</span>
  	</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Nom : '.$u_nom.'</span>
  	</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Prenom : '.$u_prenom.'</span>
  	</li>';
echo '<p><a href="index.php?action=delete&controller=utilisateur&idu='
    . $id . '" > Supprimer</a> <a href="index.php?action=update&controller=utilisateur&idu='
    . $id . '" > Modifier</a> <a href="index.php?action=update&password=modifier&controller=utilisateur&idu='
    . $id . '" > Changer de mot de passe</a><br> <a href="index.php?action=readAll&controller=utilisateur"> Retour</a> </p>
    </ul>';
?>
