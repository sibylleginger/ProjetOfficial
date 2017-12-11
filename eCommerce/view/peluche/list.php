
<h3 style="margin-left:50px"> Nos peluches </h3>
<!-- Square card -->
<style>
.demo-card-square.mdl-card {
  width: 350px;
  height: 320px;
  margin: 10px;
}
.demo-card-square > .mdl-card__title {
  color: #fff;
  /*background: url("view/images/babar.jpg") center / cover;
  /* bottom right 15% no-repeat #46B6AC*/
}
#grid {
	display: flex;
	flex-wrap: wrap;
	margin: 50px;
}
</style>
<div id="grid">


<?php
foreach ($tab_p as $p) {


    $pNom = htmlspecialchars($p->getNom());

    $purlId = rawurlencode($p->getIdp());

    $pDes = htmlspecialchars($p->getDescription());

    $pImage = htmlspecialchars($p->getImage());
    //Attention : Il ne faut pas encoder l’immatriculation déjà échappée pour le HTML. Il faut créer deux variables : 
    //une immatriculation pour le HTML et une pour les URLs.
    // rawurlencode sert à ne pas interpréter ce truc

    
    echo '<div class="demo-card-square mdl-card mdl-shadow--2dp">
	  		<div class="mdl-card__title mdl-card--expand" style="background: url('.$pImage.') center / contain no-repeat;">
	    		<h2 class="mdl-card__title-text" style="color:black">'. $pNom .'</h2>
	  		</div>
	  		<div class="mdl-card__supporting-text">'. $pDes .'</div>
	  		<div class="mdl-card__actions mdl-card--border">
	    		<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="index.php?action=read&idp='. $purlId . '"> Voir les détails</a>
	    		<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="index.php?action=add&controller=panier&idp='.$purlId.'&qte=1=">Ajouter au panier</a>
	  		</div>
		</div> ';
}
?>
</div>
