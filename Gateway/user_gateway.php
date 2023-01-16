<?php

require_once "./Connection.php";
require './classes/user.php';

class UserGateway{

	private $con;
	function __construct(){
		$dsn="mysql:host=localhost;dbname=sae-301";
		$user="root";
		$password="";
		$this->con=new Connection($dsn, $user, $password);
	}

	function addUser($login,$password){
		$query = "Insert into Utilisateur(nom,motdepasse) values(:login,:password)";
		try {
			$this->con->executeQuery($query,array(":login"=>array($login,PDO::PARAM_STR),":password"=>array($password,PDO::PARAM_STR)));
			return 1;
		} catch (\Exception $e) {
			echo $e->getCode();
		}
	}

	function connect($login,$password){
		$query= 'select id,nom from Utilisateur where :login= nom';
		$this->con->executeQuery($query,array(':login'=>array($login,PDO::PARAM_STR),':password'=>array($password,PDO::PARAM_STR)));
	}

	function findUserById($id){
		$ListUser = [];
		$query = 'Select nom, password from Utilisateur where id= :id';
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT)));
		$results = $this->con->getResults();
		foreach ($results as $key) {
			$ListUser = new User($key[0][1]);
		}
		return $ListUser;
	}

	function findIdByLogin($login){
		$query = 'Select * from Utilisateur where nom= :login';
		$this->con->executeQuery($query,array(':login'=>array($login,PDO::PARAM_STR)));
		$results = $this->con->getResults();
		foreach ($results as $key) {
			return $key;
		}
	}

	function changePassword($id,$password){
		$query = 'Update Utilisateur Set motdepasse = :password where id= :id';
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT),':password'=>array($password,PDO::PARAM_STR)));
	}

	}
?>
