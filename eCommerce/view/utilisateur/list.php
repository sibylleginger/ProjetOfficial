
<h3 style="margin-left:50px"> Liste des utilisateurs </h3>

<ul class="demo-list-icon mdl-list">

<?php
foreach ($utilisateurs as $u) {


    $uLogin = htmlspecialchars($u->getLogin());

    $uurlIdu = rawurlencode($u->getIdu());
    //Attention : Il ne faut pas encoder l’immatriculation déjà échappée pour le HTML. Il faut créer deux variables : 
    //une immatriculation pour le HTML et une pour les URLs.
    // rawurlencode sert à ne pas interpréter ce truc

    
    echo '<li class="mdl-list__item">
    	<span class="mdl-list__item-primary-content">
    		<i class="material-icons mdl-list__item-icon">person</i>
    		<a href="index.php?action=read&controller=utilisateur&idu='. $uurlIdu . '" >' . $uLogin . '</a> </span></li>';
}
?>
</ul>
