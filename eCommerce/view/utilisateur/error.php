
<?php

if ($typeError == "badParameter") echo "Ces paramètres n'existent pas";

if($typeError == "nuUser") echo "Cet utilisateur n'existe pas !!";

if($typeError == "diffPasswordCreate") echo 'Les mots de passe ne sont pas identiques.<br><a href="index.php?action=create&controller=utilisateur">retour</a>';
if($typeError == "samePassword") echo 'Le mot de passe est le même que l\'ancien.';

if($typeError == "emptyCase") echo "Il faut remplir tous les champs !";

?>
