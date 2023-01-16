<?php 

require_once "./Model/user_model.php";

class userController{
    public $action;
    private $userModel;
    function __construct($action){
        $this->action = $action;
        $this->userModel = new User_Model();
    
        switch ($action) {
            case "inscription":
                require_once "./view/inscription.php";
                break;
            case "create_account":
                require_once "./model/user_model.php";
                try{
                    $this->userModel->ajoutUser($_POST['login'],$_POST['mdp']);
                }
                catch(Exception $e){
                    echo $e->getMessage();
                }
                break;
            case "connect":
                require_once "./model/user_model.php";
                [$id,$login]=$this->userModel->connect($_POST['login'],$_POST['mdp']);
                $_SESSION['id']=$id;
                $_SESSION['login']=$login;
                require_once "./view/main.php";
                break;
            case "disconnect":
                session_destroy();
                require "./view/connection.php";
                break;
            default :
    
        }
    
    }

    
}


?>