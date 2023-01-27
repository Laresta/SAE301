<?php 
    require_once "./Model/game.php";
    $con = bdd_connection();
    $index = 0;
    if (isset($_GET['idpartie'])){
        $idPartie = $_GET['idpartie'];
    }elseif(isset($_POST['idPartie'])) {
        $idPartie = $_POST['idPartie'];
    }
    $listScenes = getScenes($con,$idPartie);
    $idScene = $listScenes[$index]->idscene;
    #ca ne trouve pas les 2 variables du dessus
    switch ($action) {
        case 'join_party_choice':
            $listPersonnages=getPersonnagesUnselected($con,$idPartie);
            if(2 == $listPersonnages || chkAlreadyPlayer($con,$idPartie))header("Location: ./?action=join_party_play&idpartie=$idPartie");
            elseif ($listPersonnages==null) {
                $listPersonnages = getPersonnages($con,$idPartie);
            }
            $nbPlayers = countPlayers($con,$idPartie)->nbPlayers;
            $nbPers = countPersonnages($con)->nbPersonnages;
            require_once "./view/choicepers.php";
            break;
        case "join_party_play":
            if (isset($_GET['pers'])) {
                $idPersonnage=$_GET['pers'];
                addJoueur($con,$idPersonnage,$idPartie);
            }
            if(chkMeneur($con,$idPartie))$meneur=1;
            else $meneur=0;
            require_once "./view/partie.php";
            break;
        case 'getPreviousScene':
            if (isset($_POST['idPartie'])&&isset($_POST['idScene'])) { 
                $idPartie=$_POST['idPartie'];
                $idScene=$_POST['idScene'];
                $prevScene = getPreviousScene($con,$idPartie,$idScene);
                if($prevScene){
                    $array =json_encode($prevScene,true);
                    print_r($array);
                }
            }
            break;
        case 'getNextScene':
            if (isset($_POST['idPartie'])&&isset($_POST['idScene'])) { 
                $idPartie=$_POST['idPartie'];
                $idScene=$_POST['idScene'];
                $nextScene = getNextScene($con,$idPartie,$idScene);
                if($nextScene){
                    $array =json_encode($nextScene,true);
                    print_r($array);
                }
            }  
        default:
            break;
    }




?>