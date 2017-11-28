
<h1> Liste des utilisateurs </h1>

<?php
foreach ($utilisateurs as $u) {


    $uLogin = htmlspecialchars($u->getLogin());

    $uurlLogin = rawurlencode($u->getLogin());
    //Attention : Il ne faut pas encoder l’immatriculation déjà échappée pour le HTML. Il faut créer deux variables : 
    //une immatriculation pour le HTML et une pour les URLs.
    // rawurlencode sert à ne pas interpréter ce truc

    
    echo '<p> <a href="index.php?action=read&controller=utilisateur&login='
    . $uurlLogin . '" >' . $uLogin . '</a> </p>';
}
?>
