<?php

require "./Gateway/user_gateway.php";
require_once './classes/user.php';

class User_Model {

    private $gw;

    function __construct(){
        $this->gw = new UserGateway();
    }

    function ajoutUser($login,$password){
		$mdp = password_hash($password, PASSWORD_DEFAULT);
		if ($this->gw->addUser($login,$mdp)==1) {
			return;
		}else {
			throw new Exception("Identifiant Existant", 2);
		}


	}

	function connect($login,$password){
		$res=$this->gw->findIdByLogin($login);
		$user = new User($res['idutilisateur'],$res['nom'],$res['motdepasse']);
		if(password_verify($password,$user->getPassword())){
			return [$user->getId(),$user->getLogin()];
		}
		else{
			throw new Exception("Identifiant ou Mot De Passe Incorrect", 1);
		}
	}

	function trouvUser($id){
		$user =$this->gw->findUserById($id);
		return $user;

	}
	function trouvId($login){
		$id = $this->gw->findIdByLogin($login);
		return $id;

	}
	function changerMdp($id,$password){

		$this->gw->changePassword($id,$password);
	}

}



?>