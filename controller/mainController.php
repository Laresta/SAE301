<?php

require_once "./Model/lobby.php";
$con= bdd_connection();
switch ($action) {
    case 'create_lobby':
        $games = getGames($con);
        require_once "./view/createlobby.php";
        break;
    case "create_party":
        $nomPartie= $_POST['titre'];
        $desc=$_POST['desc'];
        $nomGame = $_POST['game'];
        createParty($con,$nomPartie,$desc,$nomGame);
        header("Location: ./?action=''");
        break;
    case 'join_party':
        $idPartie = $_GET['idpartie'];
        require_once "./Model/game.php";
        $listScenes = getScenes($con,$idPartie);
        $index = 0;
        require_once "./view/partie.php";
    default:
        $parties = getParties($con);
        require_once "./view/main.php";
        break;
}

?>