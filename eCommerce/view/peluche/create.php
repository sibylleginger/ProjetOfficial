
<form method="get" action="index.php">
    <fieldset>
        <legend>Ajouter une peluche : </legend>
        <input type='hidden' name='action' value='created'>
        <p>
            <label for="nom">Nom</label> :
            <input type="text" placeholder="Ex : Bébert" name="nom" id="nom" required/>
        </p>

        <p>
            <label for="couleur">Couleur</label> :
            <input type="text" placeholder="Ex : Moutarde" name="couleur" id="couleur" required/>
        </p>

        <p>
            <label for="prix">Prix</label> :
            <input type="number" step="any" placeholder="Ex : 17.99" name="prix" id="prix" required/>
        </p>

        <p>
            <label for="description">Description</label> :
            <input type="text" placeholder="Ex : Bébert est un canard de couleur moutarde. Il est très doux et est de ce fait adoré par les bambins." name="description" id="description" required/>
        </p>

        <p>
            <label for="taille">Taille</label>
            <SELECT name="taille" size="1">
                <OPTION>petit
                <OPTION>moyen
                <OPTION>grand
                <OPTION>géant
            </SELECT>
        </p>

        <p><input type="submit" value="Soumettre" /></p>

    </fieldset>
</form>
