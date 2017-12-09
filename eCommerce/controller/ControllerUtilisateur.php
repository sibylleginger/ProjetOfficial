<?php
require_once File::build_path(array('model', 'ModelUtilisateur.php')); // chargement du modèle
require_once File::build_path(array('lib', 'session.php')); // chargement du modèle

class controllerUtilisateur {

  public static function connexion() {
    $controller = "utilisateur";
    $view = "connexion";
    $pagetitle = "Se connecter";
    require File::build_path(array('view', 'view.php'));
  }

  public static function connected() {
    //$_SESSION['message'] = '';
    $pagetitle = '';
    if (empty($_GET['login']) || empty($_GET['mdp'])) { 
      //Oublie d'un champ
      self::error(emptyCase);
      //$_SESSION['message'] = '<h3> Il faut remplir tout les champs. </h3>';
    }
    //extraction des valeurs de l'url
    $login = $_GET['login'];
    $mdp = $_GET['mdp'];
    //stock dans un tableau les données de l'utilisateur avec le login de l'url
    $utilisateur = ModelUtilisateur::checkData($login);
    if ($utilisateur != false) {
      $idu = $utilisateur[0]->getIdu();
      $mdp = self::chiffrer($mdp);
      if ($utilisateur[0]->getMdp() == $mdp  /*&& $utilisateur[0]->getNonce()==''*/) {
        if (isset($_SESSION['login'])) {
          $_SESSION['message'] = '<h3> Vous êtes déjà connecté.</h3> ';
          $pagetitle = "Connected";
        } else {
        //Connexion ok
          $_SESSION['idu'] = $utilisateur[0]->getIdu();
          $_SESSION['login'] = $utilisateur[0]->getLogin();
          $_SESSION['nom'] = $utilisateur[0]->getNom();
          $_SESSION['prenom'] = $utilisateur[0]->getPrenom();
          $_SESSION['email'] = $utilisateur[0]->getEmail();
          $_SESSION['isAdmin'] = $utilisateur[0]->getisAdmin();
          $_SESSION['message'] = '<h3> Bienvenue ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</h3><li>Identifiant : '.$_SESSION['idu']."</li><li>Login : ".$_SESSION['login']."</li><li>Email : ".$_SESSION['email']."</li>";
          $pagetitle = "Bienvenue !";
        }
      } else {
        $_SESSION['message'] = '<h3> Mot de passe incorrect. </h3><a href="index.php?action=connexion&controller=utilisateur">Se connecter à nouveau</a>';
        $pagetitle = "Mot de passe incorrect";
      }
    } else {
      $_SESSION['message'] = '<h3> Login inconnu.</h3> ';
      $pagetitle = "Probleme login";
    }
    $controller = "utilisateur";
    $view = "connected";
    require File::build_path(array('view', 'view.php'));
      // self::read();
  }

  public static function deconnected() {
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 1);
    echo "Vous êtes déconnecté";
    ControllerPeluche::readAll();
  }

  public function validate() {
    $login = $_GET['login'];
    $nonce = $_GET['nonce'];
    try {
      $sql = "SELECT login FROM Utilisateur WHERE login = :login; ";
      $req_prep = Model::$pdo->prepare($sql);
      $values = array("login" => $login);
      $req_prep->execute($values);
      $data = $req_prep->fetch();
    } catch (Exception $e) {
      $data = false;
    }
    if (($data) != false) {
      try {
        $sql2 = "SELECT nonce FROM Utilisateur WHERE login = :login; ";
        $req_prep2 = Model::$pdo->prepare($sql2);
        $values2 = array("login" => $data['login']);
        $req_prep2->execute($values2);
        $data2 = $req_prep2->fetch();
      } catch (Exception $e) {
        $data2 = false;
      }
      if ($data2 != false)
        if (strcmp($data2[0],$nonce)==0) {
          try{
            $sql = "UPDATE Utilisateur SET nonce='' WHERE login = :login; ";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("login" => $data[0]);
            $req_prep->execute($values);
          }catch (Exception $e){
            return false;
          }
          $view = "estConnecte";
          $controller = "utilisateur";
          $pagetitle = "Bienvenue";
          $_SESSION['message'] = "Vous etes bien inscrit !";
          require File::build_path(array('view', 'view.php'));
        } else {
          $view = "estConnecte";
          $controller = "utilisateur";
          $pagetitle = "Probleme d'authentification.";
          $_SESSION['message'] = "Il y a un probleme lors de votre confirmation de mail";
          require File::build_path(array('view', 'view.php'));
        } else {
          $view = "estConnecte";
          $controller = "utilisateur";
          $pagetitle = "Probleme d'authentification.";
          $_SESSION['message'] = "Il y a un probleme avec votre code de confirmation.";
          require File::build_path(array('view', 'view.php'));
        }
      }
    }

    ///////////////////////////////////////////
    //////          SECURITY             //////
    ///////////////////////////////////////////

    static function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', $texte_en_clair);
        $complement = hash('sha256', "securite");
        $texte_chiffre = $texte_chiffre . $complement;
        return $texte_chiffre;
    }

    static function generateRandomHex() {
        // Generate a 32 digits hexadecimal number
        $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
        $bytes = openssl_random_pseudo_bytes($numbytes);
        $hex = bin2hex($bytes);
        return $hex;
    }


    /* ///////////////////////////////////////
      ////             Utilisateur        ////
      ///////////////////////////////////// */


    public static function readAll() {
      if (Session::isConnected()) {
        //créé un tableau contenant tous les utilisateurs
        $utilisateurs = ModelUtilisateur::selectAll();
        //paramètres de la vue désirée
        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';
        $controller = 'utilisateur';
      //redirige vers la vue
        require File::build_path(array('view', 'view.php'));
      } else {
        self::error('notConnected');
      }
    }

    public static function read() {
      if (isset($_GET['idu'])) {
        $idu_query = $_GET['idu'];
        $utilisateur = ModelUtilisateur::select($idu_query);
        if ($utilisateur == false) {
          self::error('noUser');
        } else {
          $login = $utilisateur->getLogin();
          $isAdmin = $utilisateur->getisAdmin();
          if (Session::isUser($login)||Session::isAdmin()) {
            if ($isAdmin == 1) {
              $html_admin = '<h4>Administrateur</h4>';
            } else {
              $html_admin = '';
            }
            //paramètres de la vue désirée
            $view = 'detail';
            $pagetitle = 'Notre utilisateur';
            $controller = 'utilisateur';
            //redirige vers la vue 
            require File::build_path(array('view', 'view.php'));
          } else {
            self::error('badLog');
          }
        }
      } else {
        //fait appel à l'erreur
        self::error('noIdu');
      }
    }

    public static function create() {
      if (Session::isAdmin()) {
        $html_admin = '<p>
          <label for="nom">Admin?</label> :
          <input type="checkbox" value="1" name="nom" id="nom" />
        </p>';
      } else {
        $html_admin = '';
      }
      $nom_action = 'Création de l\'utilisateur';
      $affichage = 'placeholder';

      $u_login = 'Ex : ColonelMoutarde';
      $u_nom = 'Ex : Moutarde';
      $u_prenom = 'Ex : Corentin';
      $u_email = 'Ex : Corentin.moutarde@gamil.com';
      $v_admin = '';

      $html_password = '<p>
        <label for="mdp">mdp</label> :
        <input type="password" name="mdp" id="mdp" required/>
        </p>
        <p>
        <label for="mdp1">Vérification du mdp</label> :
        <input type="password" name="mdp1" id="mdp1" required/>
        </p>'


      $v_action = 'created';
    //paramètres de la vue désirée
      $view = 'createupdate';
      $pagetitle = 'Inscription';
      $controller = 'utilisateur';
    //redirige vers la vue
      require File::build_path(array('view', 'view.php'));
    }

    public static function created() {
    //stockage dans des variables des valeurs de l'url
      $login = $_GET['login'];
      if (ModelUtilisateur::redondance('login', $login)) {
        self::error('login');
      } else {
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $email = $_GET['email'];
        $mdp = $_GET['mdp'];
        $mdp1 = $_GET['mdp1'];

        $mdp = self::chiffrer($mdp);
        $mdp1 = self::chiffrer($mdp1);
        $nonce = self::generateRandomHex();
        $data = array(
          "login" => $login,
          "nom" => $nom,
          "prenom" => $prenom,
          "email" => $email,
          "mdp" => $mdp,
          "isAdmin" => 0,
          "nonce" => $nonce
        );
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
          $message = "Adresse email invalide";
          $pagetitle = "Erreur email";
          //paramètres de la vue désirée
          $view = 'create';
          $pagetitle = 'Inscription';
          $controller = 'utilisateur';
          //redirection vers la vue
          require File::build_path(array('view', 'view.php'));
        } else {
          if ($mdp == $mdp1) {
            //l'utilisateur est créé
            $utilisateur = ModelUtilisateur::save($data);
            if ($utilisateur == false) {
              $message = "Cet utilisateur existe déjà";
              $pagetitle = "Erreur";
              //paramètres de la vue désirée
              $view = 'create';
              $pagetitle = 'Inscription';
              $controller = 'utilisateur';
              //redirection vers la vue
              require File::build_path(array('view', 'view.php'));
            } else {
              $mail = 'Bonjour, pour finaliser votre inscription veuillez cliquer sur ce lien  <a href="index.php?controller=utilisateur&action=validate&login=' . $login . '&nonce=' . $nonce . '">ici</a>';          
              mail($email,"Inscription",$mail);
              $message = "Nous venons de vous envoyer un email, veuillez aller sur votre messagerie afin de confirmer votre inscription.";
              $pagetitle = "Inscription";
            }
          } else {
            $message = "Les champs mot de passe et confirmation du mot de passe doivent être les mêmes.";
            $pagetitle = "Erreur de mot de passe";
            //paramètres de la vue désirée
            $view = 'create';
            $pagetitle = 'Inscription';
            $controller = 'utilisateur';
            //redirection vers la vue
            require File::build_path(array('view', 'view.php'));
          }
          $utilisateurs = ModelUtilisateur::selectAll();
          //paramètres de la vue désirée
          $view = 'created';
          $pagetitle = 'Oki';
          $controller = 'utilisateur';
          //redirection vers la vue
          require File::build_path(array('view', 'view.php'));
        }
      }
    }

    public static function update() {
      if (Session::isAdmin()) {
        $html_admin = '<p>
          <label for="isAdmin">Admin?</label> :
          <input type="checkbox" value="1" name="isAdmin" id="isAdmin" />
        </p>';
      } else {
        $html_admin = '';
      }
      $nom_action = 'Mise à jour de l\'utilisateur';
      $affichage = 'value';

      $v_action = 'updated';
      $idu = $_GET['idu'];
      $utilisateur = ModelUtilisateur::select($idu);
      $login = $utilisateur->getLogin();
      $u_login = htmlspecialchars($utilisateur->getLogin());
      $u_nom = htmlspecialchars($utilisateur->getNom());
      $u_prenom = htmlspecialchars($utilisateur->getPrenom());
      $u_email = htmlspecialchars($utilisateur->getEmail());
      $v_admin = '<input type="hidden" name="idu" value="'.$idu.'">';

      if (Session::isUser($login)||Session::isAdmin()){
        if ($utilisateur != false) {
          //paramètres de la vue désirée
          $view = 'createupdate';
          $pagetitle = 'Modifiez votre compte';
          $controller = 'utilisateur';
          //redirige vers la vue
          require File::build_path(array('view', 'view.php'));
        } else {
          self::error();
        }
    } else {
      self::error('notConnected');
      }
    }

    public static function delete() {
    //stockage de l'id de l'utilisateur dans l'url
      $idu = $_GET['idu'];
      $utilisateur = ModelUtilisateur::select($idu);
      $login = $utilisateur->getLogin();
      if (Session::isUser($login)||Session::isAdmin()){
      //delete l'utilisateur
        $utilisateur = ModelUtilisateur::delete($idu);
      //stock les utilisateurs dans un tableau
         if ($utilisateur == true) {
          if(!Session::isAdmin()){
            self::deconnected();
          }
          $utilisateurs = ModelUtilisateur::selectAll();
            //paramètres de la vue désirée
          $view = 'deleted';
          $pagetitle = 'deleted';
          $controller = 'utilisateur';
            //redirige vers la vue
          require_once File::build_path(array('view', 'view.php'));
          }
          else {
             self::error();
          }
        } else {
          self::error('notConnected');
        }
    }

    public static function updated() {
    //stock dans des variables les valeurs de l'url
      $idu = $_GET['idu'];
      $login = $_GET['login'];
      $nom = $_GET['nom'];
      $prenom = $_GET['prenom'];
      $email = $_GET['email'];
      $mdp = $_GET['mdp'];
      $mdp1 = $_GET['mdp1'];
      if (isset($_GET['isAdmin'])) {
        $isAdmin = $_GET['isAdmin'];
      } else {
        $isAdmin = 0;
      }
      $utilisateur = ModelUtilisateur::select($idu);
      $test = $utilisateur->getLogin();
      if (Session::isUser($test)||Session::isAdmin()){
        $mdp = self::chiffrer($mdp);
        $mdp1 = self::chiffrer($mdp1);
        $data = array(
          "idu" => $idu,
          "login" => $login,
          "nom" => $nom,
          "prenom" => $prenom,
          "email" => $email,
          "mdp" => $mdp,
          "isAdmin" => $isAdmin,
        );
        if ($mdp == $mdp1) {
          $utilisateur = ModelUtilisateur::update($data);
          if ($utilisateur == false) {
            self::error();
          } else {
            $utilisateurs = ModelUtilisateur::selectAll();
            $view = 'updated';
            $controller = 'utilisateur';
            $pagetitle = 'Modifications réussies';
            require File::build_path(array("view", "view.php"));
              }
          }
      } else {
        self::error('notConnected');
      }
    }

    public static function error($error) {
        //paramètres de la vue et de l'erreur désirées
      $view = 'error';
      $typeError = $error;
      $controller = 'utilisateur';
      $pagetitle = 'Error';
        //redirige vers la vue
      require_once File::build_path(array('view', 'view.php'));
    }

  }

  ?>