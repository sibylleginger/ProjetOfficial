<?php
require_once File::build_path(array('model', 'ModelPanier.php')); // chargement du modèle

class ControllerPanier {

  public static function addPanier() {
    //Si la peluche n'existe pas
    echo "aa";
    if(!isset($_GET['idp'])) {
      self::error('noPeluches');
    } else {
      $idp = $_GET['idp'];
      //si le panier est vide
      if (!isset($_COOKIE['panier'])) {
        $nbp = 1;
        //setcookie('panier', serialize(array()), time()+3600);
        //$panier = unserialize($_COOKIE["panier"]);
        //$panier[] = array(
        $panier[] = array(
          'idp' => $idp,
          'nbp' => $nbp
          );
        setcookie('panier', serialize($panier), time()+3600);
        header('location:index.php?action=readAll&controller=panier');
        
      } else {
        $panier = unserialize($_COOKIE['panier']);
        $ligneProduit = array_search($idp, $panier);
        //si la peluche n'est pas déjà présente
        if($ligneProduit == false) {
          $nbp = 1;
          $peluche = array('idp' => $idp, 'nbp' => $nbp);
          $panier[]=$peluche;
          $_COOKIE['panier'] = serialize($panier);
          self::readAll();

        } else {
          $panier['nbp'] = $panier['nbp'] + 1;
        }
      }
      
    }
  }

  public static function removePeluchePanier() {
    if(!isset($_GET['idp'])) {
      self::error('noPeluche');
    } else {
      $idp = $_GET['idp'];
      $panier = unserialize($_COOKIE['panier']);
      $panier['nbp'] = $panier['nbp']-1;
      $_COOKIE['panier'] = $panier;
      if($panier['nbp'] <=0) {
        unset($_COOKIE['panier']['idp']);
      }
      if(count($_COOKIE['panier']) == 0) {
        unset($_COOKIE['panier']);
      }
    }
    self::readAll();
  }

  public static function readAll() {
    $controller = 'panier';
    $view = 'list';
    $pagetitle = 'Mon Panier';
    if(isset($_COOKIE['panier'])) {
      $panier = unserialize($_COOKIE['panier']);
      var_dump($_COOKIE);
      var_dump($panier);
    }
    require File::build_path(array('view', 'view.php'));
  }

  public static function removePanier() {
    setcookie('panier','',-1);
    header('location:index.php?action=readAll&controller=panier');
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