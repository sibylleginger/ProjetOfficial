<?php
require_once File::build_path(array('config', 'conf.php'));
require_once File::build_path(array('model', 'Model.php'));

class ModelPeluche extends Model {

	protected static $object = "peluche";
    protected static $primary = "idp";
    private $nom;
	private $couleur;
	private $prix;
	private $description;
	private $taille;
	//private $image;

	//un getter de idp
	public function getIdp() {
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

	//un getter d'image
	/*public function getImage() {
		return $this->image;
	}

	//un setter d'image
	public function setTaille($image) {
		$this->image = $image;
	}*/

	//un constructeur
	public function __construct($n = NULL, $c = NULL, $p = NULL, $d = NULL, $t = NULL) {
        if (!is_null($n) && !is_null($c) && !is_null($p) && !is_null($d) && !is_null($t)) {
            $this->nom = $n;
            $this->couleur = $c;
            $this->prix = $p;
            $this->description = $d;
            $this->taille = $t;
            //$this->image = $i;
        }
    }

}
?>