<?php
  /* require_once ('../model/Modelutilisateur.php'); 
    // chargement du modèle
    $tab_v = Modelutilisateur::getAllutilisateurs();
    //appel au modèle pour gerer la BD
    require ('../view/utilisateur/list.php');
    //redirige vers la vue */
    require_once File::build_path(array('model', 'Model.php'));
require_once File::build_path(array('model', 'ModelUtilisateur.php')); // chargement du modèle
class controllerUtilisateur {
  public static function readAll() {
    $utilisateurs = ModelUtilisateur::getAllUtilisateurs();
    //appel au modèle pour gerer la BD
    //require File::build_path(array('view', 'utilisateur','list.php'));  //"redirige" vers la vue
    $view = 'list';
    $pagetitle = 'Liste des utilisateurs';
    $controller = 'utilisateur';
    require File::build_path(array('view', 'view.php'));
  }
  public static function read() {
    $idu_query = $_GET['idu'];
    $utilisateur = ModelUtilisateur::getUtilisateurByidu($idu_query);
    if ($utilisateur == false) {
      /*  $view = 'error';
      $pagetitle = 'Attention erreur fatale mouahah';
      $controller = 'voiture';
      //require_once File::build_path(array('view', 'voiture','error.php'));
      require File::build_path(array('view', 'view.php')); */
      $typeError = "noUser";
      $view = 'error';
      $pagetitle = 'Error';
      $controller = 'utilisateur';
      require File::build_path(array('view', 'view.php'));
    } else {
      $view = 'detail';
      $pagetitle = 'Notre utilisateur';
      $controller = 'utilisateur';
      //require_once File::build_path(array('view', 'voiture','detail.php'));
      require File::build_path(array('view', 'view.php'));
    }
  }
  public static function create() {
    $view = 'create';
    $pagetitle = 'Inscription';
    $controller = 'utilisateur';
    //require_once File::build_path(array('view', 'voiture','create.php'));
    require File::build_path(array('view', 'view.php'));
  }
  public static function created() {
    $login = $_GET['login'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $mdp = $_GET['mdp'];
    $mdp1 = $_GET['mdp1'];
    if ($mdp == $mdp1) {        
      $utilisateur = new ModelUtilisateur($login, $nom, $prenom, $mdp);
      $utilisateur->save();
      $utilisateurs = ModelUtilisateur::getAllUtilisateurs();
      $view = 'Created';
      $pagetitle = 'Oki';
      $controller = 'utilisateur';
      //require_once File::build_path(array('view', 'voiture','create.php'));
      require File::build_path(array('view', 'view.php'));
    } else {
      $typeError = "diffmdpCreate";
      $view = 'error';
      $pagetitle = 'Error';
      $controller = 'utilisateur';
      require File::build_path(array('view', 'view.php'));
    }
  }
  public static function update() {
    $view = 'update';
    $pagetitle = 'Modifiez votre compte';
    $controller = 'utilisateur';
    //require_once File::build_path(array('view', 'voiture','create.php'));
    require File::build_path(array('view', 'view.php'));
  }
  public static function delete() {
    $idu = $_GET['idu'];
    $utilisateur = ModelUtilisateur::deleteByidu($idu);
    $utilisateurs = ModelUtilisateur::getAllUtilisateurs();
    $view = 'deleted';
    $pagetitle = 'deleted';
    $controller = 'utilisateur';
    require_once File::build_path(array('view', 'view.php'));
  }
  public static function updated() {
    $idu = $_GET['idu'];
    $login = $_GET['login'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $mdp = $_GET['mdp'];
    $mdp1 = $_GET['mdp1'];
    if ($mdp == $mdp1) {
      $utilisateur = Modelutilisateur::updateByidu($idu, $login, $nom, $prenom, $mdp);
      $utilisateurs = Modelutilisateur::getAllUtilisateurs();
      $view = 'updated';
      $pagetitle = 'updated';
      $controller = 'utilisateur';
          //require_once File::build_path(array('view', 'voiture','create.php'));
      require File::build_path(array('view', 'view.php'));
    } else {
      $typeError = 'diffmdpUpdate';
      $view = 'error';
      $pagetitle = 'error';
      $controller = 'utilisateur';
      require File::build_path(array('view', 'view.php'));
    }
  }

  public static function error($error) {
    $typeError = $error;
    $view = 'error';
    $pagetitle = 'Error';
    $controller = 'utilisateur';
    require_once File::build_path(array('view','view.php'));
  }

}

?>