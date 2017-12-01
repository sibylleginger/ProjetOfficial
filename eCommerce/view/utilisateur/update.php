<form method="get" action='index.php'>
    <fieldset>
        <legend>Update de l'utilisateur : </legend>
        <input type='hidden' name='action' value='updated'>
        <input type="hidden" name="controller" value='utilisateur'>
        <input type='hidden' name='idu' value="<?php $id = $_GET['idu']; echo $id;?>">
        <p>
            <label for="login_id">Login</label> :
            <input type="text" name="login" id="login" value="<?php $u = ModelUtilisateur::getUtilisateurByIdu($id); echo $u->getLogin(); ?>" readonly/>
        </p>

        <p>
            <label for="nom">Nom</label> :
            <input type="text" value="<?php $nom = $u->getNom(); echo $nom; ?>" name="nom" id="nom" required/>
        </p>

        <p>
            <label for="prenom">Prénom</label> :
            <input type="text" value="<?php $prenom = $u->getPrenom(); echo $prenom; ?>" name="prenom" id="prenom" required/>
        </p>

        <p>
            <label for="mdp">mdp</label> :
            <input type="mdp" name="mdp" id="mdp" required/>
        </p>

        <p>
            <label for="mdp1">Vérification du mdp</label> :
            <input type="mdp" name="mdp1" id="mdp1" required/>
        </p>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
