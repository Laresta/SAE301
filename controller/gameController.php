<?php 
    require_once "./Model/game.php";
    $con = bdd_connection();
    $index = 0;
    if (isset($_GET['idpartie'])){
        $idPartie = $_GET['idpartie'];
    }
    $listScenes = getScenes($con,$idPartie);
    $idScene = $listScenes[$index]->idscene;
    #ca ne trouve pas les 2 variables du dessus
    switch ($action) {
        case 'join_party':
            require_once "./view/partie.php";
            break;
        default:
            break;
    }




?>