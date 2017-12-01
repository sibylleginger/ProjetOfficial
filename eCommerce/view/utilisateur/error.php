
<?php

if ($typeError == "badParameter") echo "Ces paramètres n'existent pas";

if($typeError == "noUser") echo "Cet utilisateur n'existe pas !!";

if($typeError == "diffmdpCreate") echo 'Les mots de passe ne sont pas identiques.<br><a href="index.php?action=create&controller=utilisateur">retour</a>';

if($typeError == "diffmdpUpdate") echo 'Les mots de passe ne sont pas identiques.<br><a href="index.php?action=create&controller=utilisateur">retour</a>';

?>
