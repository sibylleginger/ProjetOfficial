<form method="get" action="index.php">
	<fieldset>
		<legend>Connexion</legend>
        <input type='hidden' name='action' value='connected'>		
        <input type='hidden' name='controller' value='utilisateur'>
		<div>
			<label for="login">Login</label> :
			<input type="text" name="login" placeholder="JulietteArz" required/>
		</div>
		<div>
			<label for="mdp">Mot de passe</label> :
			<input type="password" name="mdp" required/>
		</div>
		<div>
			<input type="submit" value="Se connecter" />
			<a href="index.php?controller=utilisateur&action=create">Pas encore inscrit ?</a>
		</div>
	</fieldset>
</form>