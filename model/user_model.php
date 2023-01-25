<?php

require_once "bdd.php";
$pass= "";
function addUser($con,$login,$password){
	$query = "Insert into utilisateur(login,password) values(?,?)";
	try {
		$query= $con->prepare($query);
		$query->execute([$login,password_hash($password,null)]);
		return 1;
	} catch (\Exception $e) {
		echo $e->getCode();
	}
}


function findUserById($con,$id){
	$ListUser = [];
	$query = $con->prepare('select login, password from utilisateur where id=?');
	$ok = $query->execute([$id]);
	$result = $query->fetchAll(PDO::FETCH_CLASS);
	print_r($result);
}

function findUserByLogin($con,$login){
	$query = 'Select * from utilisateur where login= ?';
	$query = $con->prepare($query);
	$query->execute([$login]);
	$result = $query->fetchAll(PDO::FETCH_CLASS);
	if(empty($result)){
		throw new Exception("Utilisateur n'existe pas dans la base de donnee");
	}else{
		return $result;
	}
}


function changePassword($con,$id,$password){
	$query = 'Update utilisateur Set password = :password where id= :id';
	$con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_INT),':password'=>array($password,PDO::PARAM_STR)));
}

?>
