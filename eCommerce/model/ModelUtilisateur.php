
<?php
require_once File::build_path(array('config', 'Conf.php'));

class ModelUtilisateur extends Model{

  private $login;
  private $nom;
  private $prenom;
  private $password;
  
  protected static $object = 'utilisateur';


  public function setLogin($login2) {
    $this->login = $login2;
  }

  public function getLogin() {
    return $this->login;
  }


  public function getNom() {
    return $this->nom;
  }

  public function setNom($nom2) {
    $this->nom = $nom2;
  }

  public function getPrenom() {
    return $this->prenom;
  }


  public function setPrenom($prenom2) {
    $this->prenom = $prenom2;
  }

  public static function getAllUtilisateurs() {
    try {
      $requeteSql = "SELECT * FROM utilisateur";

      $rep = Model::$pdo->query($requeteSql);
      $tab_obj = $rep->fetchAll(PDO::FETCH_CLASS, 'ModelUtilisateur');
      //var_dump($tab_obj); //Debugage on peut voir le contenu du tableau
      return $tab_obj;
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
      } else {
        echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
      }
      die();
    }
  }

  public static function getUtilisateurByLogin($login) {
    $sql = "SELECT * from utilisateur WHERE login=:nom_tag";
        // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
      "nom_tag" => $login,
                //nomdutag => valeur, ...
    );
        // On donne les valeurs et on exécute la requête   
    $req_prep->execute($values);

        // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
    $tab_utilisateur = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_utilisateur))
      return false;
    return $tab_utilisateur[0];
  }

  public static function deleteByLogin($login) {
    $sql = "delete from utilisateur where login=:nom_tag";
        // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
      "nom_tag" => $login,
                //nomdutag => valeur, ...
    );
        // On donne les valeurs et on exécute la requête     
    $req_prep->execute($values);
  }

  public static function updateByLogin($login, $nom, $prenom, $password) {
    $sql = "UPDATE `utilisateur` SET `nom` =:tag_nom, `prenom` =:tag_prenom, `password` =:tag_password WHERE `utilisateur`.`login` =:tag_login";
        // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
      "tag_login" => $login,
      "tag_nom" => $nom,
      "tag_prenom" => $prenom,
      "tag_password" => $password,
                //nomdutag => valeur, ...
    );
        // On donne les valeurs et on exécute la requête     
    $req_prep->execute($values);
  }

  public function __construct($log = NULL, $n = NULL, $p = NULL, $ps = NULL) {

    if (!is_null($log) && !is_null($n) && !is_null($p) && !is_null($ps)) {

      $this->login = $log;
      $this->nom = $n;
      $this->prenom = $p;
      $this->password = $ps;

    }
  } 

  public function sauvegarderNouveauUser() {
    $sql = "INSERT INTO utilisateur (login, nom, prenom, password) VALUES (
    '$this->login', '$this->nom', '$this->prenom', '$this->password')";
    $rep = Model::$pdo->query($sql);

    return $rep;
  }

  public function save() {
    $sql = "INSERT INTO utilisateur (login, nom, prenom, password) VALUES (
    '$this->login', '$this->nom', '$this->prenom', '$this->password')";
    $rep = Model::$pdo->query($sql);

    return $rep;
  }

}

?>