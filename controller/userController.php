<?php 

require_once "./Model/user_model.php";
require_once "./Model/bdd.php";
$con = bdd_connection();
switch ($action) {
    case "inscription":
        require_once "./view/inscription.php";
        break;
    case "create_account":
        try{
            addUser($con,$_POST['login'],$_POST['mdp']);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        require_once "./view/connection.php";
        break;
    case "connect":
        $login = $_POST['login'];
        $password = $_POST['pass'];
        try{
            $account = findUserByLogin($con,$login)[0];
            $passCheck = $account->password;
            if(password_verify($password,$passCheck)){
                $_SESSION['id']=$account->idutilisateur;
                $_SESSION['login']=$login;
                require_once "./view/main.php"; 
            }else{
                $erreurConnect = "le login ou mot de pas n'est pas correcte";
                require_once "./view/connection.php";
            }
        }catch(Exception $e){
            $erreurConnect= $e->getMessage();
            require_once "./view/connection.php";
        }
        
        break;
    case "disconnect":
        session_destroy();
        header("Location:./?action=''");
        break;
    default :
        break;


    
}


?>