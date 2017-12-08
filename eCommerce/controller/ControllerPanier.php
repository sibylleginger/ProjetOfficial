<?php
require_once File::build_path(array('model', 'ModelPanier.php')); // chargement du modèle

class ControllerPanier {

  public static function addPanier() {
    //Si la peluche n'existe pas
    if(!isset($_GET['idp'])) {
      self::error('noPeluches');
    } else {
      $idp = $_GET['idp'];
      echo $idp;
      //si le panier est vide
      if (!isset($_COOKIE['panier'])) {
        $nbp = 1;
        //setcookie('panier', serialize(array()), time()+3600);
        //$panier = unserialize($_COOKIE["panier"]);
        //$panier[] = array(
        $_COOKIE['panier'] = array(
          'peluche'.$idp => array(
            'idp' => $idp,
            'nbp' => $nbp
          )
        );
        setcookie('panier', serialize($_COOKIE['panier']), time()+3600);
        echo unserialize($_COOKIE['panier']);
      } else {
        //si la peluche n'est pas déjà présente
        if(!isset($_COOKIE['panier']['peluche'.$idp])) {
          $nbp = 1;
          $_COOKIE['panier']['peluche'.$idp] = array(
            'idp' => $idp,
            'nbp' => $nbp
          );
        } else {
          $_COOKIE['panier']['peluche'.$idp]['nbp'] ++;
        }
      }
      
    }
  }

  public static function removePeluchePanier() {
    if(!isset($_GET['idp'])) {
      self::error('noPeluche');
    } else {
      $idp = $_GET['idp'];
      $_COOKIE['panier']['peluche'.$idp]['nbp'] --;
      setcookie('panier', serialize($_COOKIE['panier']['peluche'.$idp]['nbp']), time()+3600);
      $nbp = unserialize($_COOKIE['panier']['peluche'.$idp]['nbp']);
      if($nbp <=0) {
        setcookie('panier', serialize($_COOKIE['panier']['peluche'.$idp]), time()-1);
      }
      if(count($_COOKIE['panier']) == 0) {
        unset($_COOKIE['panier']);
      }
    }
    self::readPanier();
  }

  public static function readAll() {
    $controller = 'panier';
    $view = 'list';
    $pagetitle = 'Mon Panier';
    require File::build_path(array('view', 'view.php'));
  }

  public static function removePanier() {
    if(!isset($_COOKIE['panier'])) {
      self::error('noPeluche');
    } else {
      setcookie('panier', serialize($_COOKIE['panier']), time()-1);
      self::readAll();
    }
  }

  public static function error($error) {
        //paramètres de la vue et de l'erreur désirées
      $view = 'error';
      $typeError = $error;
      $controller = 'utilisateur';
        //redirige vers la vue
      require_once File::build_path(array('view', 'view.php'));
    }
}
?>