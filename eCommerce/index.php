<?php
               
    // DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
    $DS = DIRECTORY_SEPARATOR;
    require_once '.'. $DS . 'lib'. $DS . 'file.php';
            require_once File::build_path(array('controller', 'routeur.php'));

?>
