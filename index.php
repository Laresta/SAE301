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
    case "del_user":
    case "deleteMe":
        require_once "./controller/userController.php";
        break;
    case "main":
    case "create_lobby":
    case "create_party":
    case 'create_game':
        require_once "./controller/mainController.php";
        break;
    case 'join_party':
        require_once "./controller/gameController.php";
        break;
    case "sendChat":
    case "chat":
        require_once "./controller/chatController.php";
        break;
    default:
        if(isset($_SESSION['id'])){   
            require_once "./controller/mainController.php";    
        }
        else{
            require_once "./view/connection.php";
        }
}
?>