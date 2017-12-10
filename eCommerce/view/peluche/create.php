<form method="get" action="index.php">
    <fieldset>
        <legend>Ajouter une peluche : </legend>
        <input type='hidden' name='action' value='created'>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="nom" id="nom" required>
            <label class="mdl-textfield__label" for="nom">Nom</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="couleur" id="couleur" required>
            <label class="mdl-textfield__label" for="couleur">Couleur</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" name="prix" id="prix" required>
            <label class="mdl-textfield__label" for="prix">Prix</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" type="text" rows= "2" name="description" id="description" required></textarea>
            <label class="mdl-textfield__label" for="nom">Description</label>
        </div><br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <div>Taille<br>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="petit">
                  <input type="radio" id="petit" class="mdl-radio__button" name="taille" value="1">
                  <span class="mdl-radio__label">Petite</span>
                </label>
                <br>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="moyen">
                  <input type="radio" id="moyen" class="mdl-radio__button" name="taille" value="2">
                  <span class="mdl-radio__label">Moyenne</span>
                </label>
                <br>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="grand">
                  <input type="radio" id="grand" class="mdl-radio__button" name="taille" value="3">
                  <span class="mdl-radio__label">Grande</span>
                </label>
                <br>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="geant">
                  <input type="radio" id="geant" class="mdl-radio__button" name="taille" value="4">
                  <span class="mdl-radio__label">Géante</span>
                </label>
            </div>

        </div><br>
        <!--IMAGE-->

        <p>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Soumettre">
                Soumettre
            </button>

    </fieldset>
</form>
