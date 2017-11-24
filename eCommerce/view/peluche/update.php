
<form method="get" action="index.php">
    <fieldset>
        <legend>Modifier une peluche : </legend>
        <input type='hidden' name='action' value='updated'>
        <input type='hidden' name='lastname' value=<?php $nom = rawurlencode($_GET['nom']); echo $nom;?>>
        <p>
            <label for="nom">Nom</label> :
            <input type="text" placeholder=<?php $nom = rawurlencode($_GET['nom']); $p = ModelPeluche::getPelucheByNom($nom); echo $nom; ?> name="nom" id="nom" required/>
        </p>

        <p>
            <label for="couleur">Couleur</label> :
            <input type="text" value=<?php $couleur = $p->couleur; echo $couleur; ?> name="couleur" id="couleur" readonly />
        </p>

        <p>
            <label for="prix">Prix</label> :
            <input type="number" step="any" placeholder=<?php $prix = $p->getPrix(); echo $prix; ?> name="prix" id="prix" required/>
        </p>

        <p>
            <label for="description">Description</label> :
            <input type="text" placeholder=<?php $description = $p->getDescription(); echo $description; ?> id="description" required/>
        </p>

        <p>
            <label for="taille">Taille</label>
            <input type="taille" name="taille" value=<?php $taille = $p->getTaille(); echo $taille; ?> readonly>
        </p>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
