<form method="get" action='index.php'>
    <fieldset>
        <h3><?php echo $nom_action; ?> : </h3>
        <input type='hidden' name='action' value=<?php echo $v_action; ?> >
        <input type="hidden" name="controller" value=<?php echo $controller; ?> >
        <?php echo $v_admin;
        
        echo $html_login;

        echo $html_nom;

        echo $html_prenom;

        echo $html_password;
        
        echo $html_email;

        echo $html_admin.'<br>';
        ?>

        <p>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Soumettre">
                Soumettre
            </button>
        </p>

    </fieldset>
</form>
