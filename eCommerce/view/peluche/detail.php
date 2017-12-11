<style>
.demo-list-item {

  margin: 0px;
  padding: 0px 50px;
}

.mdl-list__item {
  padding: 0px;
}

#product {
  display: flex;
  margin: 50px 50px;
}

#nom{
  margin: 0px;
}
</style>
<?php
echo '<div id="product">
      <img src='.$p_image.' height="250px">';
echo '<ul class="demo-list-item mdl-list">
      <h3 id="nom">'.$p_nom.'</h3><br>
      <li class="mdl-list__item">
  			<span class="mdl-list__item-primary-content">Identifiant : '.$p_idp.'</span>
  		</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Prix : '.$p_prix.'</span>
  	</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Description : '.$p_description.'</span>
  	</li>';
echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Couleur : '.$p_couleur.'</span>
  	</li>';
 echo '<li class="mdl-list__item">
  		<span class="mdl-list__item-primary-content">Taille : '.$p_taille.'</span>
  	</li>';
?>
<form method="get" action="index.php">
    <fieldset>
        <legend><?php echo $html_legend; ?> : </legend>
        <input type='hidden' name='action' value='add'>
        <input type='hidden' name='controller' value='panier'>
        <input type='hidden' name='idp' value=<?php echo $p_idp; ?> >
        <?php echo $html_hidden; ?>
        <p>
            <label for="qte">Quantité</label> :
            <input type="number" value=<?php echo $html_value; ?> min="0" max="100" name="qte" id="qte" required/>
        </p>

        <p><input type="submit" value=<?php echo $html_submit; ?> /></p>

    </fieldset>
</form>
<?php
echo $html_admin.'<p><a href="index.php?action=readAll"> Retour</a> </p>
    </ul>
    </div>';
?>
