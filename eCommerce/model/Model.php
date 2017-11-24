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



  }

  Model::init();

  ?>