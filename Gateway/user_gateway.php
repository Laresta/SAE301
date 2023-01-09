<?php

require_once "./Connection.php";

class UserGateway{

	private $con;

	function __construct(){
		$dsn="mysql:host=localhost;dbname=sae_301_duarte_pozknyakov";
		$user="root";
		$password="";
		$this->con=new Connection($dsn, $user, $password);
	}

	function addUser($login,$password){
		$query = 'Insert into Utilisateur(login,password) values(:login,:password)';
		try {
			$this->con->executeQuery($query,array(':login'=>array($login,PDO::PARAM_STR),':password'=>array($password,PDO::PARAM_STR)));
			return 1;
		} catch (\Exception $e) {
			return $e->getCode();
		}
	}

	function connect($login,$password){
		$query= 'select id,login from Utilisateur where :login= login';
		$this->con->executeQuery($query,array(':login'=>array($login,PDO::PARAM_STR),':password'=>array($password,PDO::PARAM_STR)));
	}

	function findUserById($id){
		$ListUser = [];
		$query = 'Select login, password from Utilisateur where id= :id';
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT)));
		$results = $this->con->getResults();
		foreach ($results as $key) {
			$ListUser = new User($key[0][1]);
		}
		return $ListUser;
	}

	function findIdByLogin($login){
		$query = 'Select * from Utilisateur where login= :login';
		$this->con->executeQuery($query,array(':login'=>array($login,PDO::PARAM_STR)));
		$results = $this->con->getResults();
		foreach ($results as $key) {
			return $key;
		}
	}

	function changePassword($id,$password){
		$query = 'Update Utilisateur Set password = :password where id= :id';
		$this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT),':password'=>array($password,PDO::PARAM_STR)));
	}

	}
?>
