<?php

require_once "bdd.php";

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

function findLoginByid($con,$idUser){
	$query = 'Select * from utilisateur where idutilisateur= ?';
	$query = $con->prepare($query);
	$query->execute([$idUser]);
	$result = $query->fetchAll(PDO::FETCH_CLASS);
	return $result;
}

function deleteMe($con,$idUser){
	$query = 'delete from utilisateur where idutilisateur = ?';
	$query = $con->prepare($query);
	$query->execute([$idUser]);
	return $query->rowCount();
}
?>
