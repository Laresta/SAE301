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
    case "create_account":
    case "connect":
    case "disconnect":
        require_once "./controller/userController.php";
        break;
    case "main":
        require_once "./view/main.php";
        break;
    default:
        if(isset($_SESSION['id'])){
            require_once "./view/main.php";    
        }
        else{
            require_once "./view/connection.php";
        }
}
?>