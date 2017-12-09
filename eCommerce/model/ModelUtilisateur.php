
<?php
require_once File::build_path(array('config', 'conf.php'));

require_once File::build_path(array('model', 'Model.php'));

class ModelUtilisateur extends Model{


  protected static $object = "utilisateur";
  protected static $primary = "idu";
  private $login;
  private $nom;
  private $prenom;
  private $mdp;
  private $email;
  private $isAdmin;
  private $nonce;

  //un getter de idu
  public function getIdu() {
    return $this->idu;
  }

  //un getter de login
  public function getLogin() {
    return $this->login;
  }

  //un setter de login
  public function setLogin($login) {
    $this->login = $login;
  }

  //un getter de nom
  public function getNom() {
    return $this->nom;
  }

  //un setter de nom
  public function setNom($nom) {
    $this->nom = $nom;
  }

  //un getter de prenom
  public function getPrenom() {
    return $this->prenom;
  }

  //un setter de mdp
  public function setMdp($mdp) {
    $this->mdp = $mdp;
  }

  //un getter de mdp
  public function getMdp() {
    return $this->mdp;
  }

  //un setter de prenom
  public function setPrenom($prenom) {
    $this->prenom = $prenom;
  }

  //un getter de email
  public function getEmail() {
    return $this->email;
  }

  //un setter de email
  public function setEmail($email) {
    $this->email = $email;
  }

  //un getter de isAdmin
  public function getisAdmin() {
    return $this->isAdmin;
  }

  //un setter de isAdmin
  public function setisAdmin($isAdmin) {
    $this->isAdmin = $prenom;
  }

  //un getter de nonce
  public function getNonce() {
    return $this->nonce;
  }

  //un setter de nonce
  public function setNonce($nonce) {
    $this->nonce = $nonce;
  }

  //controller
  public function __construct($l = NULL, $n = NULL, $p = NULL, $d = NULL) {
    if (!is_null($l) && !is_null($n) && !is_null($p) && !is_null($d)) {
      $this->login = $l;
      $this->nom = $n;
      $this->prenom = $p;
      $this->mdp = $d;
    }
  }

  public static function checkData($data) {
    try {
      $sql = "SELECT * FROM Utilisateur WHERE login =:login;";
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
        "login" => $data
      );
      // On donne les valeurs et on exécute la requÃªte
      $req_prep->execute($values);
      // On récupère les résultats
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
      $tab_data = $req_prep->fetchAll();
      return $tab_data;
    } catch (Exception $e) {
      return false;
    }
  }
  
}

?>