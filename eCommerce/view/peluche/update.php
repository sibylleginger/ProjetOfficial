<?php
    $p_nom = htmlspecialchars($peluche->getNom());
    $p_couleur = htmlspecialchars($peluche->getCouleur());
    $p_prix = htmlspecialchars($peluche->getPrix());
    $p_description = htmlspecialchars($peluche->getDescription());
    $p_taille = htmlspecialchars($peluche->getTaille());
    $p_image = htmlspecialchars($peluche->getImage());
?>
<style type="text/css">
  form {
    margin: 20px 50px;
  }
</style>
<form method="get" action="index.php">
    <fieldset>
        <h3>Modifier une peluche : </h3>
        <input type='hidden' name='action' value='updated'>
        <input type='hidden' name='idp' value="<?php $id = $_GET['idp']; echo $id;?>">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="nom" id="nom" value="<?php echo $p_nom; ?>" required>
            <label class="mdl-textfield__label" for="nom">Nom</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="couleur" id="couleur" value="<?php echo $p_couleur; ?>" readonly>
            <label class="mdl-textfield__label" for="couleur">Couleur</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="prix" id="prix" value="<?php echo $p_prix; ?>" required>
            <label class="mdl-textfield__label" for="prix">Prix</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" type="text" rows= "2" name="description" id="description" value="<?php echo $p_description; ?>" required></textarea>
            <label class="mdl-textfield__label" for="nom">Description</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="taille" name="taille" id="taille" value="<?php echo $p_taille; ?>" readonly>
            <label class="mdl-textfield__label" for="taille">Taille</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="image" id="image" value="<?php echo $p_image; ?>" required>
            <label class="mdl-textfield__label" for="image">Image (ex: view/images/nomImage.jpg)</label>
        </div>

        <p>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Soumettre">
                Soumettre
            </button>
        </p>

    </fieldset>
</form>
