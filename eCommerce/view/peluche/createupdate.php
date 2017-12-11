<style type="text/css">
  form {
    margin: 20px 50px;
  }
</style>
<form method="get" action="index.php">
    <fieldset>
        <h3><?php echo $html_legend; ?></h3>
        <input type='hidden' name='action' value="<?php echo $html_vaction; ?>">
        <?php echo $html_update; ?>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" <?php echo $affichage.'="'.$p_nom.'"'; ?> name="nom" id="nom" required>
            <label class="mdl-textfield__label" for="nom">Nom</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" <?php echo $affichage.'="'.$p_couleur.'"'; ?> name="couleur" id="couleur" <?php echo $modification; ?>/>
            <label class="mdl-textfield__label" for="couleur">Couleur</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" <?php echo $affichage.'="'.$p_prix.'"'; ?> name="prix" id="prix" required/>
            <label class="mdl-textfield__label" for="prix">Prix</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" type="text" rows= "2" <?php echo $affichage.'="'.$p_description.'"'; ?> name="description" id="description" required></textarea>
            <label class="mdl-textfield__label" for="nom">Description</label>
        </div><br>
        <?php
            echo $html_taille;
        ?>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" <?php echo $affichage.'="'.$p_image.'"'; ?> name="image" id="image" required>
            <label class="mdl-textfield__label" for="image">Image</label>
        </div>

        <p>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Soumettre">
                Soumettre
            </button>

    </fieldset>
</form>
