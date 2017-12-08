<?php
    $u_login = htmlspecialchars($utilisateur->getLogin());
    $u_nom = htmlspecialchars($utilisateur->getNom());
    $u_prenom = htmlspecialchars($utilisateur->getPrenom());
    $u_email = htmlspecialchars($utilisateur->getEmail());
?>
<form method="get" action='index.php'>
    <fieldset>
        <legend>Update de l'utilisateur : </legend>
        <input type='hidden' name='action' value='updated'>
        <input type="hidden" name="controller" value='utilisateur'>
        <input type='hidden' name='idu' value="<?php $id = $_GET['idu']; echo $id;?>">
        <p>
            <label for="login_id">Login</label> :
            <input type="text" name="login" id="login" value="<?php echo $u_login; ?>" required/>
        </p>

        <p>
            <label for="nom">Nom</label> :
            <input type="text" value="<?php echo $u_nom; ?>" name="nom" id="nom" required/>
        </p>

        <p>
            <label for="prenom">Prénom</label> :
            <input type="text" value="<?php echo $u_prenom; ?>" name="prenom" id="prenom" required/>
        </p>

        <p>
            <label for="mdp">mdp</label> :
            <input type="password" name="mdp" id="mdp" required/>
        </p>

        <p>
            <label for="mdp1">Vérification du mdp</label> :
            <input type="password" name="mdp1" id="mdp1" required/>
        </p>

        <p>
            <label for="email">email</label> :
            <input type="email" value="<?php echo $u_email; ?>" name="email" id="email" required/>
        </p>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
