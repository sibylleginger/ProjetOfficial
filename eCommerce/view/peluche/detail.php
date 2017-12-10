<style>
.demo-list-item {

  margin: 20px 50px;
}
</style>
<?php
//IMAGE
echo '<ul class="demo-list-item mdl-list"><br><li class="mdl-list__item">
  			<span class="mdl-list__item-primary-content">Identifiant : '.$p_idp.'</span>
  		</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Nom : '.$p_nom.'</span>
  	</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Prix : '.$p_prix.'</span>
  	</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Description : '.$p_description.'</span>
  	</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Prix : '.$p_prix.'</span>
  	</li>';
 echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Taille : '.$p_taille.'</span>
  	</li>';
echo $html_admin.'<p><a href="index.php?action=addPanier&controller=panier&idp='.$id.'">Ajouter au panier</a><br><a href="index.php?action=readAll"> Retour</a> </p>
    </ul>';
?>
