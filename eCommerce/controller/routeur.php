<?php

require_once File::build_path(array('controller', 'ControllerPeluche.php'));
require_once File::build_path(array('controller', 'ControllerUtilisateur.php'));
require_once File::build_path(array('controller', 'ControllerPanier.php'));

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    $controller_class = 'Controller'.ucfirst($controller);
    if(class_exists($controller_class)) {
        if (isset($_GET['action'])) {
        // Si on a des paramètres on les stocke dans $action
        $action = $_GET['action'];
        
            if (in_array($_GET['action'], get_class_methods($controller_class))) {

                $controller_class::$action();
            } else {
                $typeError = "badParameter";
                ControllerPeluche::error($typeError);  
            }
        } else {
            $action = "readAll";
            $controller_class::$action();
        }
    } else {
        echo $controller_class;
        $typeError = "badParameter";
        ControllerPeluche::error($typeError); 
    }
} else {
    $controller_class = "ControllerPeluche";
    if (isset($_GET['action'])) {
    // Si on a des paramètres on les stocke dans $action
    $action = $_GET['action'];
    
        if (in_array($_GET['action'], get_class_methods("ControllerPeluche"))) {

            $controller_class::$action();
        } else {
            $typeError = "badParameter";
            ControllerPeluche::error($typeError);  
        }
    } else {
        $action = "readAll";
        $controller_class::$action();
    }
}

// recupère l'action passée dans les if
// Appel de la méthode statique $action de ControllerPeluche
// Whalla comment y aller : http://127.0.0.1/Peluche/TD5/controller/routeur.php?action=readAll
?>
