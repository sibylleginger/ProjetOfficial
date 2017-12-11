<?php


require_once File::build_path(array("config","conf.php"));
Class Model {
    
    public static $pdo;


    public static function init(){
        $hostname=Conf::getHostname();
        $dbname=Conf::getDatabase();
        $login=Conf::getLogin();
        $password=Conf::getPassword();
        
        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$dbname",$login,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            
            // Activate the error display option of PDO, 
            // and now PDO will raise an exception in case of problems
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            //self::$pdo=new PDO('mysql:host='.Conf::getHostname().';dbname='.Conf::getDatabase().';'.Conf::getLogin().';'.Conf::getPassword().'; array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));');
        } catch(PDOException $e) {
            echo $e->getMessage(); // affiche un message d'erreur
            die();
        }

    }

    /* ////////////////////////////////////////
      ////             Fonctions           ////
      //////////////////////////////////////// */

    //Sélectionne un objet en fonction de son id
    public static function select($primary_value) {
        // Préparation de la requête
        try{
            //sélection de la table en fonction du sous model
           $table_name = ucfirst(static::$object);
            //stock dans une variable le sous model
           $class_name = "Model" . ucfirst(static::$object);
            //stock dans une variable la clé primaire de la table
           $primary_key = static::$primary;
            //stock dans une variable la requête en fonction des variable ci-dessus
           $sql = "SELECT * FROM $table_name WHERE $primary_key=:id_tag";
            //prépare la requête
           $req_prep = Model::$pdo->prepare($sql);
            //remplace l'id_tag par sa valeur (clé primaire)
           $values = array("id_tag" => $primary_value);
            //exécute la requête
           $req_prep->execute($values);
            //transforme la réponse en objet de la classe
           $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            //stock la réponse objet dans un tableau
           $tab = $req_prep->fetchAll();
       }catch(Exception $e){
            return false;
        }
        if ($tab == null) {
            return false;
        } else {
            return $tab[0];
        }
    }

    //sélectionne tous les objets
    public static function selectAll() {
        try {
                //sélection de la table en fonction du sous model
           $table_name = ucfirst(static::$object);
                //stock dans une variable le sous model
           $class_name = "Model" . ucfirst(static::$object);
                //stock dans une variable la requête en fonction de la variable ci-dessus
           $sql = "SELECT * FROM $table_name ;";
                //prépare la requête
           $rep = Model::$pdo->query($sql);
                //transforme la réponse en objet de la classe
           $tab_obj = $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
                //stock la réponse objet dans un tableau
           $tab = $rep->fetchAll();
                //stock la réponse objet dans un tableau
           return $tab;

        } catch (Exception $ex) {
            return false;
        }
    }

    public static function save($data) {
        try {
                //sélection de la table en fonction du sous model
            $table_name = ucfirst(static::$object);
                //stock dans une variable le sous model
            $class_name = "Model" . ucfirst(static::$object);
                //stock dans une variable la requête en fonction de la variable ci-dessus
            $sql = "INSERT INTO $table_name (";
                //chaque nom des colonnes du tableau entrant est entré dans la requète
            foreach ($data as $cle => $valeur) {
            $sql = $sql . $cle . ",";
            }
            $sql = rtrim($sql, ',');
            $sql = $sql . ") VALUES(";
                    //chaque valeur associée aux noms des colonnes du tableau est entrée dans la requête
            foreach ($data as $cle => $valeur) {
                $sql = $sql . ":" . $cle . ",";
            }
            $sql = rtrim($sql, ',');
            $sql = $sql . ");";
                    //prépare la requête
            $req_prep = Model::$pdo->prepare($sql);
                    //execute la requête
            $req_prep->execute($data);
                    //data saved
            return true;
        } catch (Exception $ex) {
                //data not saved = error
            return false;
        }
    }
    public static function delete($primary_value) {
        try{
                //sélection de la table en fonction du sous model
            $table_name = ucfirst(static::$object);
                //sotck dans une variable la clé primaire de l'objet
            $primary_key = static::$primary;
                //stock dans une variable dans une requête sql
            $sql = "DELETE FROM $table_name WHERE $primary_key = :id";
                //prépare la requête
            $req_prep = Model::$pdo->prepare($sql);
                //stock la clé primaire dans un tableau
            $values = array("id" => $primary_value);
                //exécute la requète sql avec la valeur du tableau
            $req_prep->execute($values);
                //object deleted
            return true;
        } catch (Exception $ex) {
                //object not saved
            return false;
        }
    }

    public static function update($data) {
        try {
                //sotck dans une variable la clé primaire de l'objet
            $primary_key = static::$primary;
                //sélection de la table en fonction du sous model
            $table_name = ucfirst(static::$object);
                //stock dans une variable dans une requête sql
            $sql = "UPDATE $table_name SET ";
                //continue la requête avec les valeurs du tableau rentrant
            foreach ($data as $clef => $valeur) {
                $sql = $sql . $clef . "=:$clef,";
            }
            $sql = rtrim($sql, ',');
                //fini la requête
            $sql = $sql . " WHERE $primary_key=:$primary_key;";
                //prépare la requête
            $req_prep = Model::$pdo->prepare($sql);
                //execute la requête
            $req_prep->execute($data);
                //object updated
            return true;
        } catch (Exception $ex) {
                    //object not updated
            return false;
        }
    }

    public static function redondance($column, $data) {
        try {

            //sélection de la table en fonction du sous model
            $table_name = ucfirst(static::$object);
            $sql = "SELECT COUNT(*) FROM $table_name WHERE $column = '$data';";
                //prépare la requête
            $rep = Model::$pdo->query($sql);
            $tab = $rep->fetchAll();
                //stock la réponse objet dans un tableau
            if ($tab[0][0] > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

}
Model::Init();
?>
