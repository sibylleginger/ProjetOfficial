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

  public static function create(){
    if (!isset($_COOKIE['panier'])){
      ModelPanier::createPanier();
    }
    return true;
  }

  public static function addProduct(){
    $idp = $_GET['idp'];
    $qteProduct = $_GET['qteProduct'];
    ModelPanier::addQuantity($qteProduct);
    $view = 'details';
    $controller = 'panier';
    $pagetitle = 'mon panier';
    require File::build_path(array('view', 'view.php' ));

      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($idp, $_COOKIE["panier"]);

      if ($positionProduit !== false) {
        $_COOKIE['panier'][$idp]['qteProduit'] += serialize($qteProduit) ;
      }else {
        //Sinon on ajoute le produit
        array_push( $_COOKIE['panier'][idp]= q ['idp'],serialize($idp));
        array_push( $_COOKIE['panier']['qteProduit'],serialize($qteProduit));
        //array_push( $_COOKIE['panier']['prix'],serialize($prix));
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

  public static function supprimerArticle(){
    $idp = $_GET['idp'];
   //Si le panier existe
    if (creationPanier() && !isVerrouille()) {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['idp'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prix'] = array();
      $tmp['verrou'] = $_COOKIE['panier']['verrou'];

      for($i = 0; $i < count($_COOKIE['panier']['idp']); $i++) {
          if ($_COOKIE['panier']['idp'][$i] !== $nomProduit) {
            array_push( $tmp['idp'],$_COOKIE['panier']['idp'][$i]);
            array_push( $tmp['qteProduit'],$_COOKIE['panier']['qteProduit'][$i]);
            array_push( $tmp['prix'],$_COOKIE['panier']['prix'][$i]);
          }
      }
      //On remplace le panier en COOKIE par notre panier temporaire à jour
      $_COOKIE['panier'] =  $tmp;
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
    for($i = 0; $i < count($_COOKIE['panier']['idp']); $i++) {
      $total += $_COOKIE['panier']['qteProduit'][$i] * $_COOKIE['panier']['prix'][$i];
    }
    return $total;
  }

  public static function modifierQTeArticle($idp,$qteProduit){
    //Si le panier éxiste
    if (creationPanier() && !isVerrouille()) {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0) {
        //Recharche du produit dans le panier
        $positionProduit = array_search($idp,  $_COOKIE['panier']['idp']);
        if ($positionProduit !== false) {
          $_COOKIE['panier']['qteProduit'][$positionProduit] = $qteProduit ;
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