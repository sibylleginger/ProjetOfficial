<?php
    $p_nom = htmlspecialchars($peluche->getNom());
    $p_couleur = htmlspecialchars($peluche->getCouleur());
    $p_prix = htmlspecialchars($peluche->getPrix());
    $p_description = htmlspecialchars($peluche->getDescription());
    $p_taille = htmlspecialchars($peluche->getTaille());
?>
<form method="get" action="index.php">
    <fieldset>
        <legend>Modifier une peluche : </legend>
        <input type='hidden' name='action' value='updated'>
        <input type='hidden' name='idp' value="<?php $id = $_GET['idp']; echo $id;?>">
        <p>
            <label for="nom">Nom</label> :
            <input type="text" value="<?php echo $p_nom; ?>" name="nom" id="nom" required/>
        </p>

        <p>
            <label for="couleur">Couleur</label> :
            <input type="text" value="<?php echo $p_couleur; ?>" name="couleur" id="couleur" readonly />
        </p>

        <p>
            <label for="prix">Prix</label> :
            <input type="number" step="any" value="<?php echo $p_prix; ?>" name="prix" id="prix" required/>
        </p>

        <p>
            <label for="description">Description</label> :
            <input type="text" value="<?php echo $p_description; ?>" name="description" id="description" required/>
        </p>

        <p>
            <label for="taille">Taille</label>
            <input type="taille" name="taille" value="<?php echo $p_taille; ?>" readonly>
        </p>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
