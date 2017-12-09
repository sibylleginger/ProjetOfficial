
<?php

if ($typeError == "badParameter") echo "Ces paramètres n'existent pas";

if($typeError == "noUser") echo "Cet utilisateur n'existe pas !! (Raisons: suppression ou pas encore créé)";

if($typeError == "noIdu") echo "Il faut un identifiant utilisateur!!";

if($typeError == "login") echo "Ce login est déjà utilisé!! <a href='index.php?action=create&controller=utilisateur'>Créer à nouveau</a>";

if($typeError == "diffPassword") echo 'Les mots de passe ne sont pas identiques.<br><a href="index.php?action=update&password=modifier&controller=utilisateur&idu='
    .$_GET['idu']. '" > Changer de mot de passe</a>';

if($typeError == "diffLastPassword") echo 'Vous n\'avez pas saisi le même ancien mot de passe.<a href="index.php?action=update&password=modifier&controller=utilisateur&idu='
    .$_GET['idu']. '" > Changer de mot de passe</a>';

if($typeError == "samePassword") echo 'Le mot de passe est le même que l\'ancien.';

if($typeError == "emptyCase") echo "Il faut remplir tous les champs !";

if($typeError == "badLog") echo "Il faut être admin ou connecté avec le compte lié à cette page pour y acceder!";

if($typeError == "notConnected") echo "Il faut être connecté pour accéder à cette page!!";

if($typeError == "isNotAdmin") echo "Il faut être admin pour acceder à cette page!";

?>
