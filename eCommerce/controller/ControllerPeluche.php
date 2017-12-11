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
                self::error('noPeluche');
            } else {
                if(isset($_GET['lastqte'])) {
                    $lastqte = $_GET['lastqte'];
                    $html_value = $_GET['lastqte'];
                    $html_hidden = '<input type="hidden" name="lastqte" value="'.$lastqte.'">';
                    $html_submit = 'Modifier';
                    $html_legend = 'Modifier la quantité';
                } else {
                    $html_value = 1;
                    $html_hidden = '';
                    $html_legend = 'Ajouter au panier';
                    $html_submit = 'Ajouter';
                }

                //on stock ses données
                $p_idp = $peluche->getIdp();
                $p_nom = $peluche->getNom();
                $p_description = $peluche->getDescription();
                $p_prix = $peluche->getPrix();
                $p_taille = $peluche->getTaille();


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
            $p_nom = "Ex : Bébert";
            $p_couleur = "Ex : Marron";
            $p_prix = "Ex : 25.99";
            $p_description = "Ex : Bébert est un ours brun";

            $modification = 'required';
            $affichage = "placeholder";
            $html_vaction = "created";

            $html_legend = "Créer une peluche";
            $html_update = '';
            $html_taille = '
            <p>
            <label for="taille">Taille</label>
                <SELECT name="taille" size="1">
                    <OPTION>petit
                    <OPTION>moyen
                    <OPTION>grand
                    <OPTION>géant
                </SELECT>
            </p>';

            //paramètres de la vue désirée
            $view = 'createupdate';
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
                "taille" => $_GET['taille']
                );
                //création de la peluche avec les valeurs
                //sauvegarde de la peluche dans la Base de Données
                if (ModelPeluche::redondance('nom', $nom)) {
                    self::error('nomExist');
                } else {
                    $peluche = ModelPeluche::save($data);
                    if($peluche == false) {
                        self::error();
                    } else {
                        $tab_p = ModelPeluche::selectAll();
                        $view = 'created';
                        $controller = 'peluche';
                        $pagetitle = 'Created';
                        require File::build_path(array("view", "view.php"));
                    }
                }
            }
        } else {
            ControllerUtilisateur::error('isNotAdmin');
        }
    }

    public static function delete() {
        if(!isset($_GET['idp'])) {
            self::error('noPeluche');
        } else {
            if(!Session::isAdmin()){
                self::error('isNotAdmin');
            } else {
                //stockage de l'id de la peluche
                $idp = $_GET['idp'];
                //suppression la peluche
                $delete = ModelPeluche::delete($idp);
                if ($delete == true) {
                    $tab_p = ModelPeluche::selectAll();
                    $modification = 'La peluche a été supprimée !';
                    $view = 'updated';
                    $controller = 'peluche';
                    $pagetitle = 'Deleted';
                    require File::build_path(array("view", "view.php"));
                } else {
                    self::error('notDeleted');
                }
            }
        }
    }

    public static function update() {
        if(Session::isAdmin()) {
            $idp = $_GET['idp'];
            $peluche = ModelPeluche::select($idp);
            if($peluche != false) {
                $p_nom = htmlspecialchars($peluche->getNom());
                $p_couleur = htmlspecialchars($peluche->getCouleur());
                $p_prix = htmlspecialchars($peluche->getPrix());
                $p_description = htmlspecialchars($peluche->getDescription());
                $p_taille = htmlspecialchars($peluche->getTaille());

                $modification = 'readonly';
                $affichage = "value";
                $html_vaction = "updated";

                $html_legend = "Modifier la peluche";
                $html_update = '<input type="hidden" name="idp" value="'.$idp.'">';
                $html_taille = '<p>
                <label for="taille">Taille</label>
                <input type="taille" name="taille" value="'.$p_taille.'" readonly>
                </p>';

                //paramètres de la vue désirée
                $view = 'createupdate';
                $pagetitle = 'Modifiez votre peluche';
                $controller = 'peluche';
                //redirige vers la vue
                require File::build_path(array('view', 'view.php'));
            } else {
                self::error('noPeluche');
            }
        } else {
            self::error('isNotAdmin');
        }      
    }

    public static function updated() {
        if(Session::isAdmin()) {
            //stockage des valeurs de l'url
            $data = array(
                "idp" => $_GET['idp'],
                "nom" => $_GET['nom'],
                "prix" => $_GET['prix'],
                "description" => $_GET['description']
            );
            //Met à jour la peluche dans la base de données
            $peluche = ModelPeluche::update($data);
            if ($peluche == false) {
                self::error();
            } else {
                $tab_p = ModelPeluche::selectAll();
                $modification = 'La peluche a été update !';
                $view = 'updated';
                $controller = 'peluche';
                $pagetitle = 'Updated';
                require File::build_path(array("view", "view.php"));
            }
        } else {
            self::error('isNotAdmin');
        }   
    }

    public static function error($typeError) {
        if ($typeError == "badParameter") $error = "Ces paramètres n'existent pas !";

        if($typeError == "noPeluche") $error = "Il n'y a pas de peluche liée à cet identifiant !";

        if($typeError == "nomExist") $error = "Ce nom est déjà donné à une peluche ! <a href='index.php?action=create'>Créer à nouveau</a>";

        if($typeError == "price") $error = "Nous ne donnons pas de l'argent avec nos peluches, veuillez saisir un prix supérieur ou égal à 0! <a href='index.php?action=create'>Créer à nouveau</a>";

        if($typeError == "isNotAdmin") $error = "Vous devez être un administrateur pour faire une action sur une peluche";

        if($typeError == "notDeleted") $error = "Erreur lors de la suppression de la peluche !";

        //paramètres de la vue et de l'erreur désirées
        $view = 'error';
        $typeError = $error;
        $controller = 'peluche';
        //redirige vers la vue
        require_once File::build_path(array('view', 'view.php'));
    }
}

?>
