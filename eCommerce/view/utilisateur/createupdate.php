<form method="get" action='index.php'>
    <fieldset>
        <legend><?php echo $nom_action; ?> : </legend>
        <input type='hidden' name='action' value=<?php echo $v_action; ?> >
        <input type="hidden" name="controller" value=<?php echo $controller; ?> >
        <?php echo $v_admin;
        
        echo $html_login;

        echo $html_nom;

        echo $html_prenom;

        echo $html_password;
        
        echo $html_email;

        echo $html_admin;
        ?>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
