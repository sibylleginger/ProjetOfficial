<?php
require_once File::build_path(array('model', 'ModelPeluche.php'));
require_once File::build_path(array('lib', 'session.php'));

class ControllerPanier {

  public static function add() {
    if(isset($_GET['idp']) && isset($_GET['qte'])) {
      $idp = $_GET['idp'];
      $qte = $_GET['qte'];
      if($qte < 0) {
        self::error('qte');
      } else {
        if(!isset($_SESSION['panier'][$idp])||isset($_GET['lastqte'])) {
          $_SESSION['panier'][$idp] = $qte;
          if(isset($_GET['lastqte'])) {
            $modification = 'La peluche a été mise a jour dans le panier !';
            $pagetitle = 'Updated';
          } else {
            $modification = 'La peluche a été ajoutée au panier !';
            $pagetitle = 'Added';
          }
        } else {
          $_SESSION['panier'][$idp] += $qte;
          $modification = 'La peluche étant déjà dans le panier nous avons additionné les quantités !';
          $pagetitle = 'Added';
        }
        $view = 'updated';
        $controller = 'panier';
        require File::build_path(array("view", "view.php"));
      }
    } else {
      self::error('noPeluche');
    }
  }

  public static function removePeluchePanier() {
    if(!isset($_GET['idp'])) {
      self::error('noPeluche');
    } else {
      $idp = $_GET['idp'];
      unset($_SESSION['panier'][$idp]);
    }
    if ($_SESSION['panier'] == null) {
      unset($_SESSION['panier']);
    }
        $modification = 'La peluche a été supprimée au panier !';
        $view = 'updated';
        $controller = 'panier';
        $pagetitle = 'Deleted';
        require File::build_path(array("view", "view.php"));
  }

  public static function readAll() {
    $controller = 'panier';
    $view = 'list';
    $pagetitle = 'Mon Panier';
    require File::build_path(array('view', 'view.php')); //affiche panier
  }

  public static function removePanier() {
    unset($_SESSION['panier']);
    $pagetitle = 'Panier';
    $controller = 'panier';
    $view = 'list';
    require File::build_path(array('view', 'view.php'));
  }

  public static function error($typeError) {
      if($typeError == 'badParameter') $error = 'Les paramêtres ne sont pas corrects !';
      if($typeError == 'qte') $error = 'Vous pouvez commander 0 à 100 peluche(s) !';
        //paramètres de la vue et de l'erreur désirées
      $view = 'error';
      $pagetitle = 'Error';
      $controller = 'peluche';
        //redirige vers la vue
      require_once File::build_path(array('view', 'view.php'));
    }
}
?>