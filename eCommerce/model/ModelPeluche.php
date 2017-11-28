<?php
require_once File::build_path(array('config', 'conf.php'));

class ModelPeluche extends Model {

	private $nom;
	private $couleur;
	private $prix;
	private $description;
	private $taille;

	protected static $object = 'peluche';

	//un getter de idp
	public function getidp() {
		return $this->idp;
	}

	//un getter de nom
	public function getNom() {
		return $this->nom;
	}

	//un setter de nom
	public function setNom($nom) {
		$this->nom = $nom;
	}

	//un getter de couleur
	public function getCouleur() {
		return $this->couleur;
	}

	//un setter de couleur
	public function setCouleur($couleur) {
		$this->couleur = $couleur;
	}

	//un getter de prix
	public function getPrix() {
		return $this->prix;
	}

	//un setter de prix
	public function setPrix($prix) {
		$this->prix = $prix;
	}

	//un getter de description
	public function getDescription() {
		return $this->description;
	}

	//un setter de description
	public function setDescription($description) {
		$this->description = $description;
	}

	//un getter de taille
	public function getTaille() {
		return $this->taille;
	}

	//un setter de taille
	public function setTaille($taille) {
		$this->taille = $taille;
	}

	//un constructeur
	public function __construct($n = NULL, $c = NULL, $p = NULL, $d = NULL, $t = NULL) {
        if (!is_null($n) && !is_null($c) && !is_null($p) && !is_null($d) && !is_null($t)) {
            $this->nom = $n;
            $this->couleur = $c;
            $this->prix = $p;
            $this->description = $d;
            $this->taille = $t;
        }
    }


    public static function getAllPeluches() {

        try {
            $requeteSql = "SELECT * FROM Peluche";

            $rep = Model::$pdo->query($requeteSql);

            $tab_obj = $rep->fetchAll(PDO::FETCH_CLASS, 'ModelPeluche');

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

    public function save() {
        $sql = "INSERT INTO Peluche (nom, couleur, prix, description, taille) VALUES (
        :tag_nom, :tag_couleur, :tag_prix, :tag_description, :tag_taille)";

        $rep = Model::$pdo->prepare($sql);

        $values = array(
        	"tag_nom" => $this->nom,
        	"tag_couleur" => $this->couleur,
        	"tag_prix" => $this->prix,
        	"tag_description" => $this->description,
        	"tag_taille" => $this->taille
        );

        $rep->execute($values);
    }

    public static function getPelucheByidp($idp) {
        $sql = "SELECT * from Peluche WHERE idp=:tag_idp";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "tag_idp" => $idp,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelPeluche');
        $tab_peluche = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_peluche))
            return false;
        return $tab_peluche[0];
    }

    public static function deleteByidp($idp) {
    	$peluche = ModelPeluche::getPelucheByidp($idp);
		$nom = $peluche->getNom();
        $sql = "delete from Peluche where idp=:tag_idp";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "tag_idp" => $idp,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête     
        $req_prep->execute($values);
    }

    public static function updateByidp($idp, $nom, $prix, $description) {
        $sql = "UPDATE `Peluche` SET `nom` =:tag_nom, `prix` =:tag_prix, `description` =:tag_description WHERE `Peluche`.`idp` =:tag_idp";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
        	"tag_idp" => $idp,
            "tag_nom" => $nom,
            "tag_prix" => $prix,
            "tag_description" => $description,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête     
        $req_prep->execute($values);
    }

}

?>
