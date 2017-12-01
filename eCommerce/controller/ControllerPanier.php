 <?php

  /* require_once ('../model/Modelutilisateur.php'); 
    // chargement du modèle
    $tab_v = Modelutilisateur::getAllutilisateurs();
    //appel au modèle pour gerer la BD
    require ('../view/utilisateur/list.php');
    //redirige vers la vue */

require_once File::build_path(array('model', 'Model.php'));
require_once File::build_path(array('model', 'ModelPanier.php')); // chargement du modèle

class ControllerPanier {

  public static function creationPanier(){
    if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['idp'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prix'] = array();
      $_SESSION['panier']['verrou'] = false;
    }
    return true;
  }

  public static function ajouterArticle($idp,$qteProduit,$prix){
  //Si le panier existe
    if (creationPanier() && !isVerrouille()) {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['idp']);

      if ($positionProduit !== false) {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }else {
        //Sinon on ajoute le produit
        array_push( $_SESSION['panier']['idp'],$libelleProduit);
        array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
        array_push( $_SESSION['panier']['prix'],$prix );
        $view = 'details';
        $pagetitle = 'mon panier';
        $controller = 'panier';
      //require_once File::build_path(array('view', 'voiture','create.php'));
      require File::build_path(array('view', 'view.php'));
      }
    }else {
      $typeError = "noPanier";
      $view = 'error';
      $pagetitle = 'Error';
      $controller = 'panier';
      require File::build_path(array('view', 'view.php'));
    }
  }

  public static function supprimerArticle($idp){
   //Si le panier existe
    if (creationPanier() && !isVerrouille()) {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['idp'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prix'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['idp']); $i++) {
          if ($_SESSION['panier']['idp'][$i] !== $nomProduit) {
            array_push( $tmp['idp'],$_SESSION['panier']['idp'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prix'],$_SESSION['panier']['prix'][$i]);
          }
      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
    } else {
      $typeError = "noPanier";
      $view = 'error';
      $pagetitle = 'Error';
      $controller = 'panier';
      require File::build_path(array('view', 'view.php'));
    }
  }

  public static function montantGlobal(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['idp']); $i++) {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prix'][$i];
    }
    return $total;
  }

  public static function modifierQTeArticle($idp,$qteProduit){
    //Si le panier éxiste
    if (creationPanier() && !isVerrouille()) {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0) {
        //Recharche du produit dans le panier
        $positionProduit = array_search($idp,  $_SESSION['panier']['idp']);
        if ($positionProduit !== false) {
          $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
        }
      }else {
        supprimerArticle($idp);
      }
    }else {
      $typeError = "noPanier";
      $view = 'error';
      $pagetitle = 'Error';
      $controller = 'panier';
      require File::build_path(array('view', 'view.php'));
    }
  }

  public static function error($error) {
    $typeError = $error;
    $view = 'error';
    $pagetitle = 'Error';
    $controller = 'panier';
    require_once File::build_path(array('view','view.php'));
  }

}

?>