
<form method="get" action="index.php?controller=utilisateur&action=created">
    <fieldset>
        <legend>Inscription : </legend>
        <input type='hidden' name='action' value='created'>
        <input type='hidden' name='controller' value='utilisateur'>
        <p>
            <label for="login">Login</label> :
            <input type="text" placeholder="Ex : ColonelMoutarde" name="login" id="login" required/>
        </p>

        <p>
            <label for="nom">Nom</label> :
            <input type="text" placeholder="Ex : Moutarde" name="nom" id="nom" required/>
        </p>

        <p>
            <label for="prenom">Prénom</label> :
            <input type="text" placeholder="Ex : Corentin" name="prenom" id="prenom" required/>
        </p>

        <p>
            <label for="email">Email</label> :
            <input type="email" placeholder="Ex : Corentin.moutarde@gamil.com" name="email" id="email" required/>
        </p>

        <p>
            <label for="mdp">Mot de passe</label> :
            <input type="password" name="mdp" required/>
        </p>

        <p>
            <label for="mdp1">Confirmation du mot de passe</label> :
            <input type="password" name="mdp1" required/>
        </p>

        <p>
            <input type="submit" value="S'inscrire" />
        </p>
    </fieldset>
</form>
