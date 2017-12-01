
<?php
require_once File::build_path(array('config', 'conf.php'));

class ModelUtilisateur extends Model{

  private $login;
  private $nom;
  private $prenom;
  private $mdp;
  
  protected static $object = 'Utilisateur';

  public function getId() {
    return $this->idu;
  }

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
      $requeteSql = "SELECT * FROM Utilisateur";

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

  public static function getUtilisateurByidu($idu) {
    $sql = "SELECT * from Utilisateur WHERE idu=:tag_idu";
        // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
      "tag_idu" => $idu,
                //nomdutag => valeur, ...
    );
        // On donne les valeurs et on exécute la requête   
    $req_prep->execute($values);

        // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
    $tab_Utilisateur = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_Utilisateur))
      return false;
    return $tab_Utilisateur[0];
  }

  public static function deleteByIdu($idu) {
    $sql = "delete from Utilisateur where idu=:tag_idu";
        // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
      "tag_idu" => $idu,
                //nomdutag => valeur, ...
    );
        // On donne les valeurs et on exécute la requête     
    $req_prep->execute($values);
  }

  public static function updateByIdu($idu, $login, $nom, $prenom, $mdp) {
    $sql = "UPDATE `Utilisateur` SET `login` =:tag_login, `nom` =:tag_nom, `prenom` =:tag_prenom, `mdp` =:tag_mdp WHERE `Utilisateur`.`idu` =:tag_idu";
        // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
      "tag_login" => $login,
      "tag_nom" => $nom,
      "tag_prenom" => $prenom,
      "tag_mdp" => $mdp,
      "tag_idu" => $idu,
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
      $this->mdp = $ps;

    }
  } 

  public function sauvegarderNouveauUser() {
    $sql = "INSERT INTO Utilisateur (login, nom, prenom, mdp) VALUES (
    '$this->login', '$this->nom', '$this->prenom', '$this->mdp')";
    $rep = Model::$pdo->query($sql);

    return $rep;
  }

  public function save() {
    $sql = "INSERT INTO Utilisateur (login, nom, prenom, mdp) VALUES (
    '$this->login', '$this->nom', '$this->prenom', '$this->mdp')";
    $rep = Model::$pdo->query($sql);

    return $rep;
  }

}

?>
