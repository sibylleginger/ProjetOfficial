
<form method="get" action="index.php?controller=utilisateur&action=created">
    <fieldset>
        <legend>Inscription : </legend>
        <input type='hidden' name='action' value='created'>
        <input type='hidden' name='controller' value='utilisateur'>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="login" id="login" required>
            <label class="mdl-textfield__label" for="login">Login</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="nom" id="nom" required>
            <label class="mdl-textfield__label" for="nom">Nom</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="prenom" id="prenom" required>
            <label class="mdl-textfield__label" for="prenom">Prénom</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="email" name="email" id="email" required>
            <label class="mdl-textfield__label" for="email">Email</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" name="mdp" required>
            <label class="mdl-textfield__label" for="mdp">Mot de passe</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" name="mdp1" required>
            <label class="mdl-textfield__label" for="mdp1">Confirmation du mot de passe</label>
        </div>

        <p>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="S'inscrire">
                S'inscrire
            </button>
        </p>
    </fieldset>
</form>
