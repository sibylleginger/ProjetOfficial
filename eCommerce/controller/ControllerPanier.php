<?php
require_once File::build_path(array('model', 'ModelPanier.php')); // chargement du modèle

class ControllerPanier {

  public static function addPanier() {
    //Si la peluche n'existe pas
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
        $panier[] = array( //on ajoute la peluche
          'idp' => $idp,
          'nbp' => $nbp
          );
        setcookie('panier', serialize($panier), time()+3600); //on l'enregistre dans le cookie
        header('location:index.php?action=readAll&controller=panier'); //affichage panier
        
      } else {
        $panier = unserialize($_COOKIE['panier']); //on recupere les données du cookie
        foreach ($panier as $peluche) {
          $count = 0;
          $ligneProduit = array_search($idp, $peluche['idp']);
          if ($ligneProduit != false) { //si^peluche existe deja
            $panier[$count]['nbp'] = $panier[$count]['nbp'] + 1; //qté + 1
            $_COOKIE['panier'] = serialize($panier); //on l'enregistre dans le cookie
            header('location:index.php?action=readAll&controller=panier');//affichage panier
          }
          $count++;
        }
        //si la peluche n'est pas déjà présente
        if($ligneProduit == false) {
          $nbp = 1;
          $peluche = array('idp' => $idp, 'nbp' => $nbp);
          $panier[]=$peluche; //ajout peluche
          $_COOKIE['panier'] = serialize($panier); //on l'enregistre dans le cookie
          header('location:index.php?action=readAll&controller=panier');//affichage panier

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
    if(isset($_COOKIE['panier'])) { //si le panier existe
      $panier = unserialize($_COOKIE['panier']); //on recupere les donees
      var_dump($_COOKIE);
      var_dump($panier);
    }
    require File::build_path(array('view', 'view.php')); //affiche panier
  }

  public static function removePanier() {
    setcookie('panier','',-1); //supprimer cookie
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