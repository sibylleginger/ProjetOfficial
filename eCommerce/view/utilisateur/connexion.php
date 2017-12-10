<form method="get" action="index.php">
	<fieldset>
		<h3>Connexion</h3>
        <input type='hidden' name='action' value='connected'>		
        <input type='hidden' name='controller' value='utilisateur'>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    		<input class="mdl-textfield__input" type="text" name="login" required>
    		<label class="mdl-textfield__label" for="login">Login</label>
  		</div>
  		<br>
  		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    		<input class="mdl-textfield__input" type="password" name="mdp" required>
    		<label class="mdl-textfield__label" for="mdp">Mot de passe</label>
  		</div>
		<p>
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Se connecter">
				Se connecter
			</button>
			<a href="index.php?controller=utilisateur&action=create">Pas encore inscrit ?</a>
		</p>
	</fieldset>
</form>