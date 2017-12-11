<?php
require_once File::build_path(array('model', 'ModelPeluche.php')); // chargement du modèle

class ControllerPeluche {

    public static function readAll() {
        $tab_p = ModelPeluche::selectAll();
        //paramètres de la vue désirée
        $view = 'list';
        $pagetitle = 'Peluches factory';
        $controller = 'peluche';
        //"redirige" vers la vue
        require File::build_path(array('view', 'view.php'));
    }

    public static function read() {
        //si l'id de la peluche n'est pas dans l'url
        if (!isset($_GET['idp'])) {
            //appelle l'erreur
            self::error('noPeluche');
        } else {
            $id = rawurlencode($_GET['idp']);
            //récupère la peluche
            $peluche = ModelPeluche::select($id);
            //si aucune peluche n'a l'id de l'url
            if ($peluche == false) {
                //appelle l'erreur
                self::error(noPeluche);
            } else {

                //on stock ses données
                $p_idp = $peluche->getIdp();
                $p_nom = $peluche->getNom();
                $p_description = $peluche->getDescription();
                $p_prix = $peluche->getPrix();
                $p_couleur = $peluche->getCouleur();
                $p_taille = $peluche->getTaille();
                $p_image = $peluche->getImage();


                if (Session::isAdmin()) {
                $html_admin = '<br> <a href="index.php?action=delete&idp='
                . $id . '" > supprimer</a> <a href="index.php?action=update&idp='
                . $id . '" > modifier</a>';
                } else {
                    $html_admin = '';
                }                

                //paramètres de la vue désirée
                $view = 'detail';
                $pagetitle = 'Votre peluche';
                $controller = 'peluche';
                //redirige vers la vue
                require File::build_path(array('view', 'view.php'));
            }
        }
    }

    public static function create() {
        if (Session::isAdmin()) {
            //paramètres de la vue désirée
            $view = 'create';
            $pagetitle = 'Nouvelle peluche';
            $controller = 'peluche';
            //redirige vers la vue
            require File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateur::error('isNotAdmin');
        }  
    }

    public static function created() {
        if (Session::isAdmin()) {
            $prix = $_GET['prix'];
            if ($prix < 0) {
                self::error('price');
            } else {
                $nom = $_GET['nom'];
                $data = array(
                "nom" => $_GET['nom'],
                "couleur" => $_GET['couleur'],
                "prix" => $prix,
                "description" => $_GET['description'],
                "taille" => $_GET['taille'],
                "image" => $_GET['image']
                );
                //création de la peluche avec les valeurs
                //sauvegarde de la peluche dans la Base de Données
                if (ModelPeluche::redondance('nom', $nom)) {
                    self::error('nomExist');
                } else {
                    $peluche = ModelPeluche::save($data);
                    require File::build_path(array('view', 'peluche', 'created.php'));
                    self::readAll();
                }
            }
        } else {
            ControllerUtilisateur::error('isNotAdmin');
        }
    }

    public static function delete() {
        //stockage de l'id de la peluche
        $idp = $_GET['idp'];
        //suppression la peluche
        $delete = ModelPeluche::delete($idp);
        if ($delete == true) {
        require File::build_path(array("view", "peluche", "deleted.php"));
        //echo "La peluche a été supprimée !";
        } else {
            self::error();
        }
        self::readAll();
    }

    public static function update() {
        $idp = $_GET['idp'];
        $peluche = ModelPeluche::select($idp);
        if($peluche != false) {
            //paramètres de la vue désirée
            $view = 'update';
            $pagetitle = 'Modifiez votre peluche';
            $controller = 'peluche';
            //redirige vers la vue
            require File::build_path(array('view', 'view.php'));
        } else {
            self::error();
        }
        
    }

    public static function updated() {
        //stockage des valeurs de l'url
        $data = array(
            "idp" => $_GET['idp'],
            "nom" => $_GET['nom'],
            "prix" => $_GET['prix'],
            "description" => $_GET['description'],
            "image" => $_GET['image']
        );
        //Met à jour la peluche dans la base de données
        $peluche = ModelPeluche::update($data);
        if ($peluche == false) {
            echo"Echec de mise à jour...";
        } else {
        require File::build_path(array('view', 'peluche', 'updated.php'));
        }
        self::readAll();
    }

    public static function error($error) {
        //paramètres de la vue et de l'erreur désirées
        $view = 'error';
        $typeError = $error;
        $controller = 'peluche';
        //redirige vers la vue
        require_once File::build_path(array('view', 'view.php'));
    }
}

?>