<?php 

session_start();
if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}
else{
    $action= "";
}
switch($action){
    case "inscription":
        require_once "./view/inscription.php";
        break;
    case "create_account":
        require_once "./model/user_model.php";
        $user = new User_Model();
        try{
            $user->ajoutUser($_POST['login'],$_POST['mdp']);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        break;
    case "connect":
        require_once "./model/user_model.php";
        $user = new User_Model();
        $id=$user->connect($_POST['login'],$_POST['mdp']);
        $_SESSION['id']=$id;
        require_once "./view/main.php";
        break;
    case "main":
        require_once "./view/main.php";
        break;
    case "deconnection":
        require_once "."
    default:
        if($_SESSION['id']){
            require_once "./view/main.php";    
        }
        else{
            require_once "./view/connection.php";
        }
        break;
}
?>