<?php


Class File {




public static function build_path($path_array) {
	// __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
	// Comme File.php est dans le dossier lib, nous devons redescendre d'un dossier avec '/..'
    $ROOT_FOLDER = __DIR__ . "/..";
    // DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
    $DS = DIRECTORY_SEPARATOR;
    return $ROOT_FOLDER . $DS . join($DS, $path_array);
}

}
?>