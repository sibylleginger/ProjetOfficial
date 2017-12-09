<form method="get" action='index.php'>
    <fieldset>
        <legend><?php echo $nom_action; ?> : </legend>
        <input type='hidden' name='action' value=<?php echo $v_action; ?> >
        <input type="hidden" name="controller" value=<?php echo $controller; ?> >
        <?php echo $v_admin; ?>
        <p>
            <label for="login_id">Login</label> :
            <input type="text" name="login" id="login" <?php echo $affichage."='$u_login'"; ?> required/>
        </p>

        <p>
            <label for="nom">Nom</label> :
            <input type="text" <?php echo $affichage."='$u_nom'"; ?> name="nom" id="nom" required/>
        </p>

        <p>
            <label for="prenom">Prénom</label> :
            <input type="text" <?php echo $affichage."='$u_prenom'"; ?> name="prenom" id="prenom" required/>
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
            <input type="email" <?php echo $affichage."='$u_email'"; ?> name="email" id="email" required/>
        </p>

        <?php
            echo $html_admin;
        ?>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
