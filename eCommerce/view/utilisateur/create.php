
<form method="get" action="index.php">
    <fieldset>
        <legend>Créer un utilisateur : </legend>
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
            <label for="password"> Password</label>
            <input type="password" name="password">
        </p>

        <p>
            <label for="password1"> Password</label>
            <input type="password" name="password1">
        </p>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
