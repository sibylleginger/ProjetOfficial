<form method="get" action='index.php'>
    <fieldset>
        <legend>Update de l'utilisateur : </legend>
        <input type='hidden' name='action' value='updated'>
        <input type="hidden" name="controller" value='utilisateur'>
        <p>
            <label for="login_id">Login</label> :
            <input type="text" name="login" id="login" value=<?php $login = rawurlencode($_GET['login']); $u = ModelUtilisateur::getUtilisateurByLogin($login); echo $login; ?> readonly/>
        </p>

        <p>
            <label for="nom">Nom</label> :
            <input type="text" placeholder=<?php $nom = $u->getNom(); echo $nom; ?> name="nom" id="nom" required/>
        </p>

        <p>
            <label for="prenom">Prénom</label> :
            <input type="text" placeholder=<?php $prenom = $u->getPrenom(); echo $prenom; ?> name="prenom" id="prenom" required/>
        </p>

        <p>
            <label for="password">Password</label> :
            <input type="password" name="password" id="password" required/>
        </p>

        <p>
            <label for="password1">Vérification du password</label> :
            <input type="password" name="password1" id="password1" required/>
        </p>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
