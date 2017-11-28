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
    $login_query = $_GET['login'];
    $utilisateur = ModelUtilisateur::getUtilisateurByLogin($login_query);
    if ($utilisateur == false) {
      /*  $view = 'error';
      $pagetitle = 'Attention erreur fatale mouahah';
      $controller = 'voiture';
      //require_once File::build_path(array('view', 'voiture','error.php'));
      require File::build_path(array('view', 'view.php')); */
      $typeError = "noUser";
      require File::build_path(array('view', 'utilisateur', 'error.php'));
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
    $password = $_GET['password'];
    $password1 = $_GET['password1'];
    if ($password == $password1) {        
      $utilisateur = new ModelUtilisateur($login, $nom, $prenom, $password);
      $utilisateur->save();
      $utilisateurs = ModelUtilisateur::getAllUtilisateurs();
      $view = 'Created';
      $pagetitle = 'Oki';
      $controller = 'utilisateur';
      //require_once File::build_path(array('view', 'voiture','create.php'));
      require File::build_path(array('view', 'view.php'));
    } else {
      $typeError = "diffPasswordCreate";
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

    $login = $_GET['login'];
    $utilisateur = ModelUtilisateur::deleteByLogin($login);
    $utilisateurs = ModelUtilisateur::getAllUtilisateurs();
    $view = 'deleted';
    $pagetitle = 'deleted';
    $controller = 'utilisateur';
    require_once File::build_path(array('view', 'view.php'));
  }

  public static function updated() {

    $login = $_GET['login'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $password = $_GET['password'];
    $password1 = $_GET['password1'];

    if ($password == $password1) {
      $utilisateur = Modelutilisateur::updateByLogin($login, $nom, $prenom, $password);

      $utilisateurs = Modelutilisateur::getAllUtilisateurs();

      $view = 'updated';
      $pagetitle = 'updated';
      $controller = 'utilisateur';
          //require_once File::build_path(array('view', 'voiture','create.php'));
      require File::build_path(array('view', 'view.php'));
    } else {
      $typeError = 'diffPasswordUpdate';

    }
  }
}

?>