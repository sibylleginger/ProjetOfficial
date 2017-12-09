
<?php
    
if ($typeError == "badParameter") echo "Ces paramètres n'existent pas";

if($typeError == "noPeluche") echo "Il n'y a pas de peluche lié à cet identifiant";

if($typeError == "nomExist") echo "Ce nom est déjà donné à une peluche ! <a href='index.php?action=create'>Créer à nouveau</a>";

if($typeError == "price") echo "Nous ne donnons pas de l'argent avec nos peluches, veuillez saisir un prix supérieur ou égal à 0! <a href='index.php?action=create'>Créer à nouveau</a>";

?>
