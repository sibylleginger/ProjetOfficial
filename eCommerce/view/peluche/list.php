
<h1> Liste des peluches </h1>

<?php
foreach ($tab_p as $p) {


    $pNom = htmlspecialchars($p->getNom());

    $purlNom = rawurlencode($p->getNom());
    //Attention : Il ne faut pas encoder l’immatriculation déjà échappée pour le HTML. Il faut créer deux variables : 
    //une immatriculation pour le HTML et une pour les URLs.
    // rawurlencode sert à ne pas interpréter ce truc

    
    echo '<p> <a href="index.php?action=read&nom='
    . $purlNom . '" >' . $pNom . '</a> </p>';
}
?>
